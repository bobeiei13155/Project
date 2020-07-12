<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $primaryKey = 'Id_Position';

    public function Employee()
    {
        return $this->hasMany(Employee::class);
    }
}
