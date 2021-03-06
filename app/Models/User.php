<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at' ];
    protected $table = 'users';

    public function recebimentos()
    {
        return $this->hasMany(Recebimento::class);
    }


}

