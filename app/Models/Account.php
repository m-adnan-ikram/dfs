<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name', // 0 => Active || 1 => In Active
        'code',
        'parent_id',
        'added_by'
    ];
}
