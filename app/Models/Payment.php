<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'donation_due_id',
        'donation_due_title',
        'membership_id',
        'name',
        'amount',
        'transaction_id',
        'ref_id',
        'paid_at',
        'status'
    ];
}
