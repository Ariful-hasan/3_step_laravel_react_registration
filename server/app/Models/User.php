<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use App\Models\Paymentinfo;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'telephone',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function paymentinfo()
    {
        return $this->hasOne(Paymentinfo::class);
    }
}
