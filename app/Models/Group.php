<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'level','asistente','comment','tg_group','course_id','teacher_id','status'];




    public function course(){
        return $this->belongsTo(Course::class);

    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);

    }
    public function user(){
        return $this->belongsToMany(User::class);
    }
    public function connections()
    {
        return $this->hasMany(Connection::class);
    }
    public function connectedUsers()
    {
        return User::select('users.*')
            ->join('connections', 'users.id', '=', 'connections.user_id')
            ->where('connections.group_id', $this->id)
            ->get();
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'connections', 'group_id', 'user_id');
    }


}
