<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandLeaseApplication extends Model
{
    use HasFactory;

    public static function LandLeaseApplicationUser($landLeaseOrder)
    {
        $data = LandLeaseApplication::where(['land_lease_order_id' => $landLeaseOrder, 'user_id' => auth()->id()])->first();
        return $data ? true : false;
    }
    public function dagList()
    {
        return $this->belongsTo(DagList::class, 'dag_list_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function landLeaseOrder()
    {
        return $this->belongsTo(LandLeaseOrder::class, 'land_lease_order_id', 'id');
    }
    public function transactionLog()
    {
        return $this->belongsTo(TransactionLog::class, 'id', 'land_lease_application_id');
    }
}
