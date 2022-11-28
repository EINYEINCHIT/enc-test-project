<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NrcCode;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    public function nrc_code()
    {
        return $this->belongsTo(NrcCode::class);
    }
}
