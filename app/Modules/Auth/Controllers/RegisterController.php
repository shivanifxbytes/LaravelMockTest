<?php
namespace App\Modules\Auth\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
    * @DateOfCreation         04 Jan 2019
    * @ShortDescription       Load the register view
    * @return                 View
    */
    public function getRegister()
    {
        return view('Auth::register');
    }
}
