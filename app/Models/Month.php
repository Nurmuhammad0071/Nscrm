<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;
    protected $fillable = ['month' , 'year' , 'comment' , 'status'];
    public function user(){
        return $this->belongsToMany(User::class);
    }
    public function connectedUsers()
    {
        return User::select('users.*')
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->where('payments.month_id', $this->id)
            ->get();
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
