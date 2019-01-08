<?php
namespace App\Modules\Auth\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth,Config;

class LoginController extends Controller
{
	
    /**
    * @DateOfCreation         04 Dec 2018
    * @ShortDescription       Load the login view for admin
    * @return                 View
    */
    public function getLogin(Request $request)
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }
        $data = ['singup_type' => Config::get('constants.USER_ROLE'), 'action' => url('login')];
        return view('Auth::login', $data);
    }

     /**
    * @DateOfCreation         08 Jan 2019
    * @ShortDescription       Handle a login request of Users
    * @return                 Response
    */
    public function postLogin(Request $request)
    {
        $remember_me = false;
        $rules = [
                    'email'    => 'required|max:150',
                    'password' => 'required'
                 ]; 

        // Set validator
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile_number';

            // Get our login input
            $inputData = [
                            $field => $request->input('email'),
                            'password'    => $request->input('password'),
                            'singup_type' => $request->input('user'),
                            'is_deleted'  => Config::get('constants.IS_DELETED_NO')
                        ];
            if(!empty($request->input('remember_me'))){
                $remember_me = true;
            }
            if (Auth::attempt($inputData, $remember_me)) {
                $user = Auth::user();
                if ($dashboardRoute = $this->authenticated($request, $user)) {
                    return $dashboardRoute;
                }
                if ($request->input('user') == Config::get('constants.USER_ROLE')) {
                    return redirect("/dashboard")->with(array("message"=>trans('Auth::messages.LOGIN_SUCCESS')));
                }
            } else {
                
                //Check Email exist in the database or not
                $result = User::where(['email' => $inputData[$field]])
                                ->orwhere(['mobile_number' => $inputData[$field]])
                                ->first();
                if (!empty($result)) {
                    if ($request->input('user') == Config::get('constants.ADMIN_ROLE')) {
                        $validator->getMessageBag()->add('password',trans('Auth::messages.WRONG_PASSWORD_ADMIN'));
                    } else {
                        $validator->getMessageBag()->add('password', trans('Auth::messages.WRONG_PASSWORD_USER'));
                    }
                } else {
                    $validator->getMessageBag()->add('email', trans('Auth::messages.USER_NOT_EXIST'));
                }
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    }

    /**
    * @DateOfCreation      08 Jan 2019
    * @ShortDescription    This function check whether account is activated or not
    * @param  Request $request 
    * @param  [type]  $user    
    */
    public function authenticated(Request $request, $user)
    {
        if (!$user->verify_email) {
            auth()->logout();
            return back()->with('warning', trans('Auth::messages.EMAIL_VERIFY_WARNING'));
        }
        return redirect("/dashboard")->with(array("message"=>trans('Auth::messages.LOGIN_SUCCESS')));
    }
}
