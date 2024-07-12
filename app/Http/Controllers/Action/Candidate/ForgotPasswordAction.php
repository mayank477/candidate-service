<?php

namespace App\Http\Controllers\Action\Candidate;

use App\Http\Requests\ForgotPasswordRequest;
use App\Models\Candidate;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ForgotPasswordAction
{
    public function handle(ForgotPasswordRequest $request)
    {
        // Fetch the candidate using the validated email
        $candidate = Candidate::query()->where('email', '=', $request->validated('email'))->first();

        if (!$candidate) {
            return errorResponse('We can\'t find a user with that email address.', ResponseAlias::HTTP_BAD_REQUEST);
        }

        // Generate a unique token
        $token = uuid_create();

        // Save the token in the password_reset_tokens table
        DB::table('password_reset_tokens')->insert([
            'email' => $candidate->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        // Generate the password reset URL
        $resetUrl = 'http://localhost:3000/auth/new-password?token=' . $token . '&email=' . $candidate->email;

        // Send the password reset email
        // $data = ['resetUrl' => $resetUrl];
        // Mail::send('mail', $data, function ($message) use ($candidate) {
        //     $message->to($candidate->email)
        //         ->subject('Password Reset');
        // });

        // Send the password reset email
        // $data = ['resetUrl' => $resetUrl];  // Include resetUrl in the data array
        $data = [
            'resetUrl' => $resetUrl,
            'candidateName' => $candidate->name  
        ]; 
        Mail::send('mail', $data, function ($message) use ($candidate) {
            $message->to($candidate->email)
            ->subject('Password Reset');
        });

        return successfulResponse([], 'Password reset email sent successfully.');
    }
}
