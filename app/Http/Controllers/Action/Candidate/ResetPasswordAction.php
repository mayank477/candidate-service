<?php
namespace App\Http\Controllers\Action\Candidate;

use App\Models\Candidate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Resources\CandidateResource;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ResetPasswordAction
{
    public function handle(ResetPasswordRequest $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        $email = $request->input('email');
        $token = $request->input('token');
        $newPassword = $request->input('password');

        // Clean up expired tokens (older than 30 minutes)
        DB::table('password_reset_tokens')->where('created_at', '<', Carbon::now()->subMinutes(30))->delete();

        $tokenData = DB::table('password_reset_tokens')->where('email', $email)->first();

        if (! $tokenData) {
            Log::error('Token not found or expired', [
                'email' => $email,
                'token' => $token,
            ]);
            return response()->json(['message' => 'Token expired or invalid.'], ResponseAlias::HTTP_BAD_REQUEST);
        }

        if ($tokenData && $token === $tokenData->token) {
            $candidate = Candidate::where('email', $email)->first();

            if ($candidate) {
                
                // Directly set the new password without hashing
                $candidate->password = $newPassword;
                $candidate->save();

                // Optionally, delete the token after successful reset
                DB::table('password_reset_tokens')->where('email', $email)->delete();

                // Authenticate the candidate with the new password
                Auth::login($candidate);

                return successfulResponse([
                    'data' => [
                        'candidate' => new CandidateResource($candidate)
                    ]
                ], 'Password reset successful.', ResponseAlias::HTTP_OK);
            } else {
                return response()->json(['message' => 'Candidate not found.'], ResponseAlias::HTTP_NOT_FOUND);
            }
        } else {
            return response()->json(['message' => 'Token expired or invalid.'], ResponseAlias::HTTP_BAD_REQUEST);
        }
    }
}
