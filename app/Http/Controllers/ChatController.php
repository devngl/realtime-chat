<?php

namespace App\Http\Controllers;

use Auth;

class ChatController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('login');
        }

        $contacts = $user->contacts()->get();

        return view('chat', [
            'contacts' => $contacts->pluck('name', 'id')->toArray()
        ]);
    }
}