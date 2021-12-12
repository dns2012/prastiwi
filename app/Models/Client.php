<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    /**
     * account
     *
     * @return hasOne
     */
    public function account()
    {
        return $this->hasOne(User::class, 'client_id', 'id');
    }
}
