<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->post(
    'auth/login', 
    [
       'uses' => 'AuthController@authenticate'
    ]
);


$router->group(
    ['middleware' => 'jwt.auth'], 
    function() use ($router) {
        $router->get('me','AuthController@me');
        $router->group(['prefix' => 'api'],function() use ($router){
            $router->group(['prefix' => 'master'],function() use ($router){

                $router->post('karyawan',['as'=>'karyawan','uses'=>'Master\KaryawanController@index']);
                $router->get('karyawan/{id}',['as'=>'karyawan.view','uses'=>'Master\KaryawanController@show']);
                $router->delete('karyawan/{id}',['as'=>'karyawan.delete','uses'=>'Master\KaryawanController@destroy']);

                $router->get('agama',['as'=>'agama','uses'=>'Master\AgamaController@index']);
                $router->get('agama/{id}',['as'=>'agama.view','uses'=>'Master\AgamaController@show']);
                $router->delete('agama/{id}',['as'=>'agama.delete','uses'=>'Master\AgamaController@destroy']);

                $router->get('kota',['as'=>'kota','uses'=>'Master\KotaController@index']);
                $router->get('kota/{id}',['as'=>'kota.view','uses'=>'Master\KotaController@show']);
                $router->delete('kota/{id}',['as'=>'kota.delete','uses'=>'Master\KotaController@destroy']);

                $router->get('level',['as'=>'level','uses'=>'Master\LevelController@index']);
                $router->get('level/{id}',['as'=>'level.view','uses'=>'Master\LevelController@show']);
                $router->delete('level/{id}',['as'=>'level.delete','uses'=>'Master\LevelController@destroy']);

                $router->get('jabatan',['as'=>'jabatan','uses'=>'Master\JabatanController@index']);
                $router->get('jabatan/{id}',['as'=>'jabatan.view','uses'=>'Master\JabatanController@show']);
                $router->delete('jabatan/{id}',['as'=>'jabatan.delete','uses'=>'Master\JabatanController@destroy']);

                $router->get('parameter',['as'=>'parameter','uses'=>'Master\ParameterController@index']);
                $router->get('parameter/{id}',['as'=>'parameter.view','uses'=>'Master\ParameterController@show']);
                $router->delete('parameter/{id}',['as'=>'parameter.delete','uses'=>'Master\ParameterController@destroy']);

                $router->get('pengujian',['as'=>'pengujian','uses'=>'Master\PengujianController@index']);
                $router->get('pengujian/{id}',['as'=>'pengujian.view','uses'=>'Master\PengujianController@show']);
                $router->delete('pengujian/{id}',['as'=>'pengujian.delete','uses'=>'Master\PengujianController@destroy']);

            });

            $router->group(['prefix' => 'hrm'],function() use ($router){

                

            });
        });
    }
);