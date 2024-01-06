<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLedger extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name', // 0 => Active || 1 => In Active
        'tier1_id',
        'tier2_id',
        'added_by'
    ];

    public function account(){
        return $this->hasOne(Account::class, 'id', 'tier1_id');
    }

    public function account_child(){
        return $this->hasOne(Account::class, 'id', 'tier2_id');
    }
}
