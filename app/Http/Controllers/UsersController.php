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

  public function getIndividualUser($agentID) {
    $query = User::with('accoutPoints')
                  ->where('id', $agentID)
                  ->first();

    return $query;
  }

}
