<?php

namespace App\Http\Controllers\Action\Award;

use App\Http\Requests\StoreAwardRequest;
use App\Http\Resources\AwardResource;
use App\Models\Candidate;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * Handles the creation of a new award for a candidate.
 *
 * This class is responsible for handling the creation of a new award for a candidate. It takes a validation request
 * object and a candidate model object as inputs and returns a successful response object.
 *
 * @param StoreAwardRequest $request The validation request object that contains the information required to create the award.
 * @param Candidate $candidate The candidate model object to which the award will be added.
 * @return JsonResponse The successful response object containing information about the created award.
 */
class StoreAwardAction
{
    /**
     * Handles the creation of a new award for a candidate.
     *
     * @param StoreAwardRequest $request The validation request object.
     * @param Candidate $candidate The candidate model object.
     * @return JsonResponse The successful response object.
     */
    public function handle(StoreAwardRequest $request, Candidate $candidate)
    {
        $award = $candidate->awards()->create($request->validated());
        return successfulResponse([
            'data' => [
                'award' => new AwardResource($award)
            ]
        ], 'Award created.', ResponseAlias::HTTP_CREATED);
    }
}
