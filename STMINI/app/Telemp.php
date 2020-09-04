<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telemp extends Model
{   
    
    protected $primaryKey = 'Id_Emp';

    public function employeetel()
    {
        return $this->belongsTo(Employee::class);
    }
}
