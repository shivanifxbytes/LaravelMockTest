<?php
namespace App\Modules\Auth\Controllers;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\EmailTokens;
use App\Mail\VerifyMail;
use App,Config;
use App\User;

class RegisterController extends Controller
{
	use RegistersUsers;

	/**
    * Create a new controller instance.
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest');      
    }

    /**
    * @DateOfCreation         04 Jan 2019
    * @ShortDescription       Load the register view
    * @return                 View
    */
    public function getRegister()
    {
        return view('Auth::register');
    }

    /**
    * @DateOfCreation         08 Jan 2019
    * @ShortDescription       Load the register view
    * @return                 View
    */
    public function postRegister(Request $request)
    {
        $rules = [
    		'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%@]).*$/',
            'confirm_password'  => 'required|same:password'
        ];

        // Set validator
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            // Redirect our user back to the form with the errors from the validator
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } 
        else {

                //Final array of the data from the request
                $userData = [
                			'first_name' => $request->input("name"),
                            'email'    => $request->input("email"),
                            'password' => $request->input("password"),
                            'singup_type' => Config::get('constants.USER_ROLE'),
                            ];
                $user = User::create($userData); //Insert user data in users table
                $userToken = Config::get('constants.TOKEN_LENGTH');
                $verifyUser = EmailTokens::create([
                    'user_id' => $user->id,
                    'user_token'  => $userToken,
                    ]);
                $user_id= $verifyUser->user_id;
                
                //$user_id = $this->securityLibObj->encryptwithbase64($user_id);
                $verifyUrl = url('user/verify/'.$user_id.'/'.$verifyUser->user_token);
                $mailVarify = array( "verifyUrl" => $verifyUrl);
                Mail::send('emails.verifyUser', $mailVarify, function($message) use ($userData)
                {
                    $message->to($userData['email'])->subject(trans('Auth::messages.REG_EMAIL_SUBJECT'));
                });
                if ($response = $this->registered($request, $userData)) {
                    return $response;
                }
            
        }
    }

    /**
    * @DateOfCreation         08 Jan 2019
    * @ShortDescription       This function checks whether the user is verified or not
    * @param  [type] $token [description]
    * @return [type]        [description]
    */
    public function verifyUser($user_id, $user_token)
    {
        $userId = $user_id;
        $verifyUser = EmailTokens::where('user_token', $user_token)->where('status','=',Config::get('constants.DEACTIVE_STATUS'))->first();
        if (!empty($verifyUser)) {
            $userData = [
                    'status'  => Config::get('constants.ACTIVE_STATUS'),
                ]; 
             $statusUpdate = [
                    'verify_email'  => Config::get('constants.ACTIVE_STATUS'),
                    'updated_at'    => date(Config::get('constants.DB_DATETIME_FORMAT')),
                ]; 
            $userToken = $verifyUser->user_token;

            // Update  email_tokens table
            $updateStatus = EmailTokens::where(array('user_token' => $userToken))->update($userData);

            // Update users table
            $updateUser = User::where(array('id' => $userId))->update($statusUpdate);
            $status = trans('Auth::messages.EMAIL_VERIFY_SUCCESS');         
        } 
        else {
                $status = trans('Auth::messages.ALREADY_VERIFY_USER');
        }
        return redirect('/')->with('status', $status);
    }

    /**
    * @DateOfCreation         08 Jan 2019
    * @ShortDescription       This function is used to tell user that they are registered but not
    *                         verified yet
    * @param  Request $request 
    * @param  [type]  $user    
    */
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/')->with('status', trans('Auth::messages.USER_VERIFY_SUCCESS'));
    }
}
