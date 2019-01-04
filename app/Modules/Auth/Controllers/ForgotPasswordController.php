<?php
namespace App\Modules\Auth\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /**
    * @DateOfCreation         04 Jan 2019
    * @ShortDescription       Load the forget password view
    * @return                 View
    */
    public function getForgotPassword()
    {
        return view('Auth::email');
    }
}
