<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use carbon;

class Rgform extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = "rgforms";

    protected $fillable = ['name', 'email', 'password'];
}
