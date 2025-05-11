<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';
    protected $fillable = ['name', 'cpf', 'date_birth'];

    public function department(){ //brlongdTo define que um modelo pertence a outro
        return $this->belongsTo(Department::class);
    }
}
