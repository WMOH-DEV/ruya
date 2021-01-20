<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stage extends Model
{
    use HasFactory;

    use SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['subjects'];
    protected $dates = ['deleted_at'];

    protected $guarded = [

    ];
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

}
