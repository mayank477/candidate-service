<?php

namespace App\Http\Controllers\Action\Candidate;

use App\Http\Requests\CreateCandidateRequest;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;

class CreateCandidateAction
{
    public function handle(CreateCandidateRequest $request)
    {
        $candidate = Candidate::query()->create($request->validated());
        return successfulResponse([
            'data' => [
                'candidate' => new CandidateResource($candidate)
            ]
        ], 'Candidate created');
    }
}
