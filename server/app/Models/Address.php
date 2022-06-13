<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'street', 
        'house_no',
        'zip',
        'city'
    ];

    /**
     *  Get the user that owns the address.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
