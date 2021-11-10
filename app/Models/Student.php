<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'student_id';
    protected $fillable = ['programme_id','student_id','name',
                           'age','gender','class','CGPA','address','email'];

    public function programme(){
        return $this->belongsTo(Programme::class);
    }

    public $incrementing = false;
}
