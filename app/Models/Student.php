<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = [
        'id',
        'name',
        'age',
        'class',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'last_updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public $timestamps = false;
}
