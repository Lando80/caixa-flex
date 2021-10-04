<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recebimento extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at' ];
    protected $table = 'recebimento';

    public function user()
    {
        return $this->belongsTo(Recebimento::class);
    }

}
