<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => ['required', 'regex:/^[^0-9]*$/'], // Tidak boleh angka
            'lname' => ['required', 'regex:/^[^0-9]*$/'], // Tidak boleh angka
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],          // Hanya angka
            'message' => ['required', 'string'],
        ], [
            'fname.regex' => 'First Name tidak boleh mengandung angka.',
            'lname.regex' => 'Last Name tidak boleh mengandung angka.',
            'phone.numeric' => 'Phone Number hanya boleh berisi angka.', // Pesan error
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Contoh pemrosesan data
        // Contact::create($request->all());

        return back()->with('success', 'Form berhasil dikirim!');
    }
}


