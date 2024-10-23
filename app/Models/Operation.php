<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = false;

    public function seller()
    {
        return $this->belongsTo(Organization::class, 'seller');
    }

    public function buyer()
    {
        return $this->belongsTo(Organization::class, 'buyer');
    }
}
