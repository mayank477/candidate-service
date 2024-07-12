<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Action\Candidate\ForgotPasswordAction;
use App\Http\Controllers\Action\Candidate\LoginAction;
use App\Http\Controllers\Action\Candidate\RegistrationAction;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\ResetPasswordRequest; 
use App\Http\Controllers\Action\Candidate\ResetPasswordAction; 
use App\Http\Resources\CandidateResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use App\Models\Candidate;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(RegistrationRequest $request, RegistrationAction $action)
    {
        return $action->handle($request);
    }

    public function login(LoginRequest $request, LoginAction $action)
    {
        return $action->handle($request);
    }

    public function candidate(Request $request)
    {
        return successfulResponse([
            'data' => [
                'candidate' => new CandidateResource($request->user('sanctum'))
            ]
        ], 'Candidate retrieved.');
    }

    public function sendResetLinkEmail(ForgotPasswordRequest $request, ForgotPasswordAction $action)
    {
        return $action->handle($request);
    }

    public function resetPassword(ResetPasswordRequest $request, ResetPasswordAction $action)
    {
        return $action->handle($request);
    }
}
