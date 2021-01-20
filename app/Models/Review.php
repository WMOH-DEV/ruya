<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [

    ];

    /**
     *  Relation with User as teacher
     *  Review has many users
     */
    public function teachers(){
        return $this->belongsToMany(User::class);
    }

    /**
     *  Relation with User as student
     *  Review has many users
     */
    public function students(){
        return $this->belongsToMany(User::class);
    }



}
