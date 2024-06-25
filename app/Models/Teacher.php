<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'patronymic',
        'phone_1',
        'phone_2',
        'email',
        'password',
        'science',
        'birthday',
        'comment',
        'photo',
        'comming',
        'intership',
        'percetage',
        'link',
        'address',
        'telegram',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
//
    public function message(){
        return $this->hasMany(Message::class);
    }
    public function group(){
        return $this->hasMany(Group::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function groups()
    {
        return $this->hasMany(Group::class, 'teacher_id');
    }
}
