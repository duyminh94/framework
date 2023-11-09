<?php 

namespace Core\Bootstrap;


use Core\Exceptions\Whoops;
use Core\Http\Request;
use Core\File\File;
use Core\Http\Response;
use Core\Router\Route;
use Core\Session\Session;

class App {
    /* * 
    * App contructor
    *
    * @return void
    */

    private function __construct() {}

    /* *
    * Run the application
    *
    * @return void
    */
    public static function run() {
        // Register Whoops
        Whoops::handler();
        // Start session
        Session::start();
        // Handle the request
        Request::handle(); 
            
        // Require all routes directory
        File::require_directory('routes');
        
        
        $data = Route::handle();

        Response::output($data);
        
    }


}