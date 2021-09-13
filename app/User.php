<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    protected $limitInHours = 24;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_feedback'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getFeedbacks(){
        return $this->hasMany(Feedback::class, 'user_id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user');
    }
    public function CheckRole(){
        $userid= Auth::user()->id;
        $user=Auth::user()->roles()->where('user_id', $userid)->value('role_id');
        if($user===1)
        return true;
    }
    public function updateLastFeedback($format = 'Y-m-d H:i:s')
    {
        $this->update([
            'last_feedback' => Carbon::now()->format($format)
        ]);
    }
    public function getLastFeedbackTime()
    {
        return $this->last_feedback ?? false;
    }
    public function canSend()
    {
        if(! $this->getLastFeedbackTime())
            return true;

        $hours = Carbon::now()->diffInHours($this->getLastFeedbackTime());

        return $hours >= $this->limitInHours ? true : false;
    }
}
