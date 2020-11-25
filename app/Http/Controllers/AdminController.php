<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class AdminController extends Controller
{
    

    public function __construct()
    {

        $this->middleware('IsAdmin');

    }

    public function index (){

        return 'you are an admin';

    }





}
