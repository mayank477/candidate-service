<?php

namespace App\Http\Controllers\Action\Candidate;

use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * Class UpdateCandidateAction
 *
 * This class handles the update of a candidate.
 */
class UpdateCandidateAction
{
    /**
     * Handle the CreateCandidateRequest.
     *
     * @param Candidate $candidate The candidate object to be updated.
     * @param UpdateCandidateRequest $request The request object containing the validated data.
     * @return JsonResponse The response indicating whether the candidate was successfully updated or not.
     */
    public function handle(Candidate $candidate, UpdateCandidateRequest $request)
    {
       
        $candidate->update($request->validated());
        return successfulResponse(message: 'Candidate updated', status: ResponseAlias::HTTP_NO_CONTENT);
    }
}
