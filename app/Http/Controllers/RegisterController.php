<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class RegisterController extends Controller
{
    public function stepOne()
    {
        return view('register.step-1');
    }

    public function stepOnePost(Request $request)
    {
        $this->validate($request, [
            'titlejhj' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        return redirect()->route('register.step-two');
    }

    public function stepTwo()
    {
        return view('register.step-2');
    }

    public function stepTwoPost(Request $request)
    {
        $this->validate($request, [
            'address1' => 'required',
            'address2' => 'required',
            'address3' => 'required',
            'city' => 'required',
            'region' => 'required',
            'postcode' => 'required',
        ]);

        return redirect()->route('register.step-three');
    }

    public function stepThree()
    {
        return view('register.step-3');
    }

    public function stepThreePost(Request $request)
    {
        $validationRules = [
            'password' => 'required',
        ];

        if (localization()->getCurrentLocale() == 'en') {
            $validationRules['vat_number'] = 'required';
        }

        $this->validate($request, $validationRules);

        return redirect()->route('register.completed');
    }

    public function completed()
    {
        return view('register.completed');
    }
}
