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
    
    /**
     * Get the address associated with the user
     *
     * @return void
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }
    
    /**
     * Get the paymentifo associated with the user.
     *
     * @return void
     */
    public function paymentinfo()
    {
        return $this->hasOne(Paymentinfo::class);
    }
}
