<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommEvents extends Model
{
    use HasFactory;
    public function comms()
    {
        return $this->belongsTo(Comms::class, 'comm_id');
    }
}
