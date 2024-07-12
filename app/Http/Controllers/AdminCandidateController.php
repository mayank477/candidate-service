<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Action\Candidate\CandidateIndexAction;
use App\Http\Controllers\Action\Candidate\CreateCandidateAction;
use App\Http\Controllers\Action\Candidate\UpdateCandidateAction;
use App\Http\Requests\CreateCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use Illuminate\Http\JsonResponse;

class AdminCandidateController extends Controller
{
    /**
     * Index method.
     *
     * This method is responsible for handling the index request.
     *
     * @param CandidateIndexAction $action The instance of CandidateIndexAction.
     * @return JsonResponse The result of the handle method in CandidateIndexAction.
     */
    public function index(CandidateIndexAction $action): JsonResponse
    {
        return $action->hande();
    }

    /**
     * Store a candidate using the given request and action.
     *
     * @param CreateCandidateRequest $request The request object containing the candidate data.
     * @param CreateCandidateAction $action The action used to handle the creation of the candidate.
     * @return JsonResponse The result of handling the candidate creation action.
     */
    public function store(CreateCandidateRequest $request, CreateCandidateAction $action): JsonResponse
    {
        return $action->handle($request);
    }

    /**
     * Show the specified candidate.
     *
     * @param CandidateController $candidateController The controller used to handle candidate requests.
     * @param Candidate $candidate The candidate object to be shown.
     * @return JsonResponse The response object containing the candidate details.
     */
    public function show(CandidateController $candidateController, Candidate $candidate): JsonResponse
    {
        return $candidateController->show($candidate->load('awards'));
    }

    /**
     * Update a candidate using the given candidate, request, and action.
     *
     * @param Candidate $candidate The candidate object to be updated.
     * @param UpdateCandidateRequest $request The request object containing the updated candidate data.
     * @param UpdateCandidateAction $action The action used to handle the update of the candidate.
     * @return JsonResponse The result of handling the candidate update action.
     */
    public function update(Candidate $candidate, UpdateCandidateRequest $request, UpdateCandidateAction $action): JsonResponse
    {
        return $action->handle($candidate, $request);
    }
}
