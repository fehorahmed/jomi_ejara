<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    use HasFactory;

    public function landLeaseApplication()
    {
        return $this->belongsTo(LandLeaseApplication::class, 'land_lease_application_id', 'id');
    }
    public function landLeaseSession()
    {
        return $this->belongsTo(LandLeaseSession::class, 'land_lease_session_id', 'id');
    }
}
