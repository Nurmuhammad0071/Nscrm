<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['month_id' , 'user_id' , 'bonus' ,'comment' , 'type', 'money' , 'extra_amount', 'status'];
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function month()
    {
        return $this->belongsTo(Month::class, 'month_id');
    }
}
