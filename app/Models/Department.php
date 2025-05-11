<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $fillable = ['name'];

    public function employees(){ //hasMany define que um modelo tem muitos outros
        return $this->hasMany(Employees::class);
    }
}
