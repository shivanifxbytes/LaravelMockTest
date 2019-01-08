<?php
namespace App\Modules\Dashboard\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cards;
use Session, Auth;
use App\Config;
use App\Models\Appointments;

/**
* Dashboard Controller
* @package                InviteU
* @subpackage             DashboardController
* @category               Controller
* @DateOfCreation         26 nov 2018
* @ShortDescription       This class is resposible to handle all the operation that need to *                         perform on dashboard
**/
class DashboardController extends Controller
{

	/**
    * @DateOfCreation      10-Oct-2018
    * @ShortDescription    Create a new controller instance.
    * @return void
    */
    public function __construct()
    {
        // Init security library object
    }
	
	/**
    * @DateOfCreation         26 Nov 2018
    * @ShortDescription       Load the dashboard view
    * @return                 View
    */
 	public function viewDashboard()
    {
        $user_id = Auth::user()->user_id;
        return view("Dashboard::dashboard");
    }

    /**
    * @DateOfCreation         20 Dec 2018
    * @ShortDescription       change the language according to the input 
    * @return                 Response
    */
    public function postChangeLanguage($local) 
    {
        Session::put('locale', $local);
        return redirect()->back();
    }
}
