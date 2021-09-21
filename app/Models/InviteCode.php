<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InviteCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code'
    ];

    protected $attributes = [
        'quantity' => 5,
        'quantity_used' => 0
    ];

    protected $casts = [
      'expires_at' => 'datetime',
      'approved_at' => 'datetime',
    ];


    public function hasAvailableQuantity()
    {
        return $this->quantity_used < $this->quantity;
    }

    public function hasExpired()
    {
        return $this->expires_at?->lt(now());
    }

    public function approved()
    {
        return !is_null($this->approved_at);
    }

}
