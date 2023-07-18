<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_Status extends Model
{
    use HasFactory;

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id');
    }
}
