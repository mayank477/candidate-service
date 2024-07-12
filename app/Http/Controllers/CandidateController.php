<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Action\Candidate\CreateCandidateAction;
use App\Http\Controllers\Action\Candidate\UpdateCandidateAction;
use App\Http\Requests\CreateCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use Illuminate\Http\JsonResponse;

class CandidateController extends Controller
{
    /**
     * Store a candidate record.
     *
     * @param CreateCandidateRequest $request The request object containing the candidate data.
     * @param CreateCandidateAction $action The action to handle the creation of a candidate.
     *
     * @return JsonResponse The result of handling the creation action.
     */
    public function store(CreateCandidateRequest $request, CreateCandidateAction $action)
    {
        return $action->handle($request);
    }

    /**
     * Show a candidate record.
     *
     * @param Candidate $candidate The candidate object to be shown.
     *
     * @return JsonResponse The successful response containing the candidate data.
     */
    public function show(Candidate $candidate)
    {
        return successfulResponse([
            'data' => [
                'candidate' => new CandidateResource($candidate->load('awards'))
            ]
        ], 'Candidate retrieved');
    }

    /**
     * Update a candidate record.
     *
     * @param Candidate $candidate The candidate object to be updated.
     * @param UpdateCandidateRequest $request The request object containing the updated candidate data.
     * @param UpdateCandidateAction $action The action to handle the update of a candidate.
     *
     * @return JsonResponse The result of handling the update action.
     */
    public function update(Candidate $candidate, UpdateCandidateRequest $request, UpdateCandidateAction $action)
    {
        return $action->handle($candidate, $request);
    }
}
