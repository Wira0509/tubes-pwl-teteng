<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
   public function submit(Request $request)
{
    $data = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    $messages = [];
    

    if (Storage::exists('contact_messages.json')) {
        $messages = json_decode(Storage::get('contact_messages.json'), true);
    }

    // Tambahkan timestamp saat disimpan
    $data['time'] = now()->format('d M Y H:i:s');

    $messages[] = $data;

    Storage::put('contact_messages.json', json_encode($messages, JSON_PRETTY_PRINT));

    return redirect()->route('home')->with('success', 'Pesan berhasil dikirim!');
}



    public function adminView()
    {
        $messages = [];

        if (Storage::exists('contact_messages.json')) {
            $messages = json_decode(Storage::get('contact_messages.json'), true);
        }

        return view('admin.messages', compact('messages'));
    }
}
