<?php

namespace App\Http\Controllers\Action\Candidate;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LoginAction
{
    public function handle(LoginRequest $request)
    {
        $candidate = Candidate::query()->where('email', '=', $request->validated('email'))->first();
        if (Hash::check($request->validated('password'), $candidate->password)) {
            $candidate->login();
            return successfulResponse([
                'data' => [
                    'candidate' => new CandidateResource($candidate)
                ]
            ], 'Login successful');
        }

        return errorResponse('Credentials mismatched, please check and try again.', ResponseAlias::HTTP_BAD_REQUEST);

    }
}
