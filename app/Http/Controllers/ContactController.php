<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // --- Validation des champs ---
        $validated = $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname'  => 'required|string|max:100',
            'email'     => 'required|email',
            'phone'     => 'nullable|string|max:20',
            'subject'   => 'required|string|max:150',
            'content'   => 'required|string|max:2000',
            'honeypot'  => 'nullable|string|max:0' // champ anti-spam
        ]);

        // --- Détection spam via honeypot ---
        if (!empty($validated['honeypot'])) {
            return back()->with('error', 'Le formulaire n’a pas pu être soumis.');
        }

        // --- Envoi de l'email ---
        Mail::send('emails.contact', $validated, function ($message) use ($validated) {
            $message->to('contact@technic-et-plans.com') // destinataire principal
                    ->replyTo($validated['email'], $validated['firstname'].' '.$validated['lastname'])
                    ->subject('Nouveau message de contact : '.$validated['subject']);
        });

        return back()->with('success', 'Votre message a bien été envoyé ! Nous vous répondrons rapidement.');
    }
}
