<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [ 'name' , 'info' , 'prise' , 'days' , 'status'];
    public function group(){
        return $this->hasMany(Group::class);
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }


}
