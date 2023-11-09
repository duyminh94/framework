<?php 

namespace Core\Validation\Rules;
use Core\Database\Database;
use Rakit\Validation\Rule;

class UniqueRule extends Rule {
    protected $message = ":attribute :value has been used";
    protected $fillable = ['table', 'column', 'except'];
    public function check($value): bool
    {
        $this->requireParameters(['table', 'column']);

        $column = $this->parameter('column');
        $table = $this->parameter('table');
        $except = $this->parameter('except');

        if($except AND $except == $value) {
            return true;
        }

        $data = Database::table($table)->where($column, '=', $value)->first();
        return $data ? true : false;
    }
}