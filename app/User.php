<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    public function role(){
      return $this->belongsTo(Role::class);
    }

    public function authorizeRoles($roles){
      if($this->hasAnyRole($roles)){
        return true;
      }
      abort(401, 'This action is unathorized');
    }
    public function hasAnyRole($roles){
      if(is_array($roles)){
        foreach ($roles as $role) {
          if($this->hasRole($role)){
            return true;
          }
        }
      } else {
        if($this->hasRole($roles)){
          return true;
        }
      }
      return false;
    }

    public function hasRole($role){
      if($this->role()->where('name', $role)->first()){
        return true;
      }
      return false;
    }

    public function userRole($role){
      Role::where('id', $role)->first();
    }

    // public function roles(){
    //   return $this->belongsToMany('App\Role');
    // }
    //
    // public function authorizeRoles($roles){
    //   if($this->hasAnyRole($roles)){
    //     return true;
    //   }
    //   abort(401, 'This action is unathorized');
    // }
    // public function hasAnyRole($roles){
    //   if(is_array($roles)){
    //     foreach ($roles as $role) {
    //       if($this->hasRole($role)){
    //         return true;
    //       }
    //     }
    //   } else {
    //     if($this->hasRole($roles)){
    //       return true;
    //     }
    //   }
    //   return false;
    // }
    //
    // public function hasRole($role){
    //   if($this->roles()->where('name', $role)->first()){
    //     return true;
    //   }
    //   return false;
    // }
    //
    // public function userRole($role){
    //   Role::where('id', $role)->first();
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'first_name', 'last_name', 'role_id', 'description', 'is_active', 'avatar', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
      return $this->hasMany(Post::class);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
