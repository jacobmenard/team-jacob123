<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;


class UsersController extends Controller
{
  public function getAccountType(){
    return User::with('accountType')->get();
  }
}
