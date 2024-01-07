<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Voucher extends Model
{
    protected $fillable = ['code', 'used', 'expires_at'];

    public function isExpired()
    {
        return Carbon::now()->greaterThan($this->expires_at);
    }
}
