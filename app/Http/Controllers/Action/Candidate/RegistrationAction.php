<?php

namespace App\Http\Controllers\Action\Candidate;

use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RegistrationAction
{
    public function handle(RegistrationRequest $request)
    {
        $candidate = Candidate::query()->create($request->validated());
        $candidate->login();
        return successfulResponse([
            'data' => [
                'candidate' => new CandidateResource($candidate)
            ]
        ], 'Candidate registered', ResponseAlias::HTTP_CREATED);
    }
}
