<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouza extends Model
{
    use HasFactory;


    public function khatianType()
    {
        return $this->belongsTo(KhatianType::class, 'khatian_type_id', 'id');
    }
    public function upazila()
    {
        return $this->belongsTo(Upazila::class, 'upazila_id', 'id');
    }
    public function unionPourashava()
    {
        return $this->belongsTo(UnionPourashava::class, 'union_pourashava_id', 'id');
    }
}
