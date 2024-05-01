<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DagList extends Model
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
    public function mouza()
    {
        return $this->belongsTo(Mouza::class, 'mouza_id', 'id');
    }
    public function khatianNo()
    {
        return $this->belongsTo(KhatianList::class, 'khatian_list_id', 'id');
    }
    public function ejaraRate()
    {
        return $this->belongsTo(EjaraRate::class, 'ejara_rate_id', 'id');
    }
}
