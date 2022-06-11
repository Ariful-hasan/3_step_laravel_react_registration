<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Address;
use App\Models\Paymentinfo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'first_name' => 'sdfsdfasd',
            'last_name' => 'dsfsadsdf',
            'telephone' => '121212',

            'street' => 'aaaaaa',
            'house_no' => 'ssssssssssss',
            'zip' => 'ssssssssssss',
            'city' => 'dddddddddddd',

            'account' => 'fffffffffff',
            'iban' => 'cccccccccccc'
        ];


        $user = User::create($data);
        dump($user);
        //$data['user_id'] = $user->id;

        $address = new Address($data);
        $address = $user->address()->save($address);
        dump($address);

        $data['payment_data_id'] = 'qwqwqwqwqw';
        $paymentinfo = new Paymentinfo($data);
        $payment = $user->paymentinfo()->save($paymentinfo);
        dd($payment);


        //return view('home');
    }
}
