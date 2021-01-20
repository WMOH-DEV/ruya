<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [

    ];

    protected $fillable = ['country_name'];

    /**
     *  Relation with User
     *  Country has many users
     */
    public function users(){
        return $this->hasMany(User::class);
    }
}
