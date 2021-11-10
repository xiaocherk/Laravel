<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $primaryKey = 'course_id';
    protected $fillable = ['programme_id','course_id','course_name','credit_hours'];

    public function programme(){
        return $this->belongsTo(Programme::class);
    }

    public $incrementing = false;
}
