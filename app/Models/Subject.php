<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;


class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The Fillable attributes .
     *
     * @var array
     */
    protected $guarded = [

    ];
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    /*
     * Relation with teacher
     */
    public function teacher()
    {
        return $this->hasOne(Stage::class);
    }
}
