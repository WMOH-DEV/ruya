<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Dyrynda\Database\Support\CascadeSoftDeletes;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['orders'];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'whatsapp',
        'gender',
        'country_id',
        'role_id',
        'isUpdated',
        'email_verified_at',
        'residence_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     *  Relation with country
     *  User has one country
     */
    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function residence(){
        return $this->belongsTo(Residence::class);
    }


    /**
     *  Relation with Roles
     *  User has one country
     */
    public function role(){
        return $this->belongsTo(Role::class);
    }


    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }


    /*
    * Relation with orders
    * One To one Relation
    */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function lastLogin(){

        $start = Carbon::parse($this->last_login);
        $end = Carbon::now();
        $days = $end->diffInDays($start);

        if ($days > 1){
            return $days.' '. 'أيام' ;
        }elseif($days = 1){
            return 'منذ يوم واحد';
        }

        return $days . ' ' . 'يوم';
    }

}
