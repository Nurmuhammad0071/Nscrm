<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['logo' , 'full_name' , 'address','phone' , 'phones' , 'email'  ,'hours','location' ];
}
