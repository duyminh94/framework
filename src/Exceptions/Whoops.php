<?php

namespace Core\Exceptions;


class Whoops
{
    /* *
    * Whoops contructor
    *
    */

    private function __construct()
    {
    }

    /* 
    * Handle the whoops error
    *
    * @return void
    */

    public static function handler()
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();

    }
}
