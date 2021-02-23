<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

//    protected $cascadeDeletes = ['teacher'];
   protected $dates = ['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'hours',
        'start_date',
        'contact_way',
        'notes',
        'admin_status',
        'stage_id',
        'user_id',
        'teacher_id',
        'subject_name',
        'status'
    ];

    /*
    * Relation with teacher
    * One To one Relation
    */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
* Relation with stages
* One To one Relation
*/
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }



}
