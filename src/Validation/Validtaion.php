<?php

namespace Core\Validation;

use Core\Http\Request;
use Core\Session\Session;
use Core\Url\Url;
use Rakit\Validation\Validator;

class Validate
{
    /* *
    * Validation contructor
    *
    */
    private function __construct()
    {
    }

    /* *
    * Validate request
    * @param array $rules
    * @param bool $json
    * @return mixed
    */
    public static function validate($rules, $json)
    {
        $validator = new Validator;

        // make it
        $validation = $validator->validate($_POST + $_FILES, $rules);

        $errors = $validation->errors();

        if ($validation->fails()) {
            if($json) {
                return ['errors' => $errors->firstOfAll()];
            } else {
                Session::set('errors', $errors);
                Session::set('old', Request::all());
                return Url::redirect(Url::previous());
            }
        } 
    }
}
