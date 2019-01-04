<?php
namespace App\Modules\Auth\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
    * @DateOfCreation         04 Dec 2018
    * @ShortDescription       Load the login view for admin
    * @return                 View
    */
    public function getLogin(Request $request)
    {
        return view('Auth::login');
    }
}
