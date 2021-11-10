<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $table = 'programmes';
    protected $primaryKey = 'programme_id';
    protected $fillable = ['programme_id','programme_name'];

    public function students(){
        return $this->hasMany(Student::class,'programme_id');
    }

    public function courses(){
        return $this->hasMany(Course::class,'programme_id');
    }

    public $incrementing = false;
}
