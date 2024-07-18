<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Siapkan data email
        $details = [
            'name' => $request->name,
            'message' => $request->message,
        ];

        // Kirim email
        Mail::to($request->email)->send(new ContactMail($details));

        return response()->json(['message' => 'Email sent successfully!']);
    }
}
