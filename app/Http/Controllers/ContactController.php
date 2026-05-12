<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // In a real app, we might send an email or store in DB here.
        // For this task, we just redirect back with a success message.

        return back()->with('success', 'Thank you for contacting Whisker Cart! We have received your message and will get back to you soon.');
    }
}
