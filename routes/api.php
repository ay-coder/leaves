<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'rest','as' => 'rest'], function(){
    Route::post('ws_leave','Api@submitLeave');    
    Route::post('ws_login','Api@login');    
    Route::post('ws_dashboard','Api@dashboard');    
    Route::post('ws_profile','Api@get_user');    
    Route::post('ws_history','Api@leave_history');    
});
