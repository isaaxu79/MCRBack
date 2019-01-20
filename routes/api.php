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

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function() {


    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('closed', 'DataController@closed');

    Route::apiResources([
        'comensal'=>'ComensalApi'
    ]);
    
    Route::apiResources([
        'restaurante' => 'RestauranteApi'
    ]);
    
    Route::apiResources([
        'reto' => 'RetosApi'
    ]);
    
    Route::apiResources([
        'publicaciones' => 'PublicacionesApi'
    ]);
    
    Route::apiResources([
        'restaurante1' => 'RestauranteApiDatos'
    ]);
    
    Route::apiResources([
        'participantes' => 'ParticipantesApi'
    ]);
    
    Route::apiResources([
        'retosRestaurante' => 'RestauranteRetosApi'
    ]);
    
    Route::apiResources([
        'seguidores' => 'SeguidoresApi'
    ]);
    Route::apiResources([
        'restaurante1' => 'RestauranteApiDatos'
    ]);
    
    Route::get('comens/{id}','ComenController@get');
    Route::get('rests/{id}','ComenController@gets');
    Route::get('data/{id}/{id2}','ComenController@data');
    Route::delete('delet/{id}/{id2}','ComenController@delet');
    Route::get('best','ComenController@best');
    Route::get('bestres','ComenController@bestres');
    Route::get('retosComensal/{id}', 'ComenController@show');
    Route::get('mis-publicaciones/{id}', 'ComenController@publicaciones');


    Route::apiResources([
        'restaurantecard' =>'RestauranteRetosCardApi'
    ]);
    
    Route::apiResources([
    'user' => 'UserApi'
]);
});

