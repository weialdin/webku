<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validasi input form
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $to = "aldinprogrammer@gmail.com"; // Ganti dengan email tujuan Anda
        $subject = $request->subject;
        $txt = "Email: " . $request->email . "\n\n" . $request->message;
        $headers = "From: " . $request->email;

        // Mengirim email menggunakan fungsi mail() PHP
        $mailSent = mail($to, $subject, $txt, $headers);

        if ($mailSent) {
            // Jika email berhasil dikirim
            return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim!');
        } else {
            // Jika email gagal dikirim
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
        }
    }
}