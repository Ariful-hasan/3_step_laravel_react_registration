<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Paymentinfo extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account',
        'iban',
        'payment_data_id',
    ];
    
    /**
     *  Get the user that owns the paymentinfo.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
