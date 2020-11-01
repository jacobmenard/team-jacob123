<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/pages/{any}', function () {
    return view('home');
})->where('any','.*');

Route::get('/register/{id}/{acc_type}', function () {
    return view('auth/register');
});

Route::get('/register_admin/new/admin', function () {
    return view('auth/register_admin');
});
// Route::get('/loadstation', function () {
//     return view('home');
// });



Auth::routes();

Route::get('/sa/post/updateAgentStatus/{id}/{stat}', 'AgentController@updateStatus');
Route::get('/sa/get/getAgentList', 'AgentController@getAgentList');

Route::get('/login/getMainUser' , 'AgentController@getMainUserLoad');
Route::get('/login/getTransactionType', 'AgentController@getTransactionType');
Route::get('/login/loadtransfer/{agentID}', 'UsersController@getIndividualUser');