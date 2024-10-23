<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = false;

    public function sales()
    {
        return $this->hasMany(Operation::class, 'seller');
    }

    // Отношение для покупок (как покупатель)
    public function purchases()
    {
        return $this->hasMany(Operation::class, 'buyer');
    }
}
