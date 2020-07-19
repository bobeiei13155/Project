<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'Id_Emp';

    public function position()
    {
        return $this->belongsTO(Position::class);
    }
}
