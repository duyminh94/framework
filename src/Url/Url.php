<?php 

namespace Core\Url;
use Core\Http\Request;
use Core\Http\Server;

class Url {
    /* *
    * Url constructor
    */
    private function __construct() {}

    /* *
    * Get Path
    *
    * @param string $path
    * @return string $path
    */
    public static function path($path) {
        return Request::baseUrl(). '/' .trim($path, '/');
    }

    /* *
    * Previous url
    *
    * @return string
    */

    public static function previous() {
        return Server::get('HTTP_REFERER');
    }

    /* *
    * Redirect to page
    *
    * @return void
    */

    public static function redirect($path) {
        header('location: ' .$path);
        exit();
    }
}