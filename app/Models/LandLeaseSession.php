<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandLeaseSession extends Model
{
    use HasFactory;

    public function dagList()
    {
        return $this->belongsTo(DagList::class, 'dag_list_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
