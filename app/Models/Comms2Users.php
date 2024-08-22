<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comms2Users extends Model
{
    use HasFactory;
    
    /**
     * ユーザーとのリレーションを定義
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
