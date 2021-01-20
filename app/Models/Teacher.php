<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;


class Teacher extends Model
{
    use HasFactory, SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['orders'];
    protected $dates = ['deleted_at'];


    /**
     * The Fillable attributes .
     *
     * @var array
     */
    protected $fillable = [
        'experience',
        'qualification',
        'attachment',
        'attachment2',
        'pphour',
        'brief',
        'user_id',
        'subject_id',
        'first_name',
        'profile_img',
        'other_subjects'
    ];


    /*
     * Relation with Stage
     */
    public function stages()
    {
        return $this->belongsToMany(Stage::class);
    }

    /*
     * Relation with User
     * One To one Relation
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
     * Relation with subjects
     * One To one Relation
     */

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /*
    * Relation with Orders
    * One To one Relation
    */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
