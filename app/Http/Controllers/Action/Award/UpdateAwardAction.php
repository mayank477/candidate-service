<?php

namespace App\Http\Controllers\Action\Award;

use App\Http\Requests\StoreAwardRequest;
use App\Http\Requests\UpdateAwardRequest;
use App\Http\Resources\AwardResource;
use App\Models\Award;
use App\Models\Candidate;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * Class UpdateAwardAction
 *
 * Handles the update of an award for a candidate.
 */
class UpdateAwardAction
{
    /**
     * Handle updating an award for a candidate.
     *
     * @param UpdateAwardRequest $request The request object containing the validated data for updating the award.
     * @param Award $award The award object to be updated.
     * @param Candidate $candidate The candidate object associated with the award.
     * @return JsonResponse The response indicating the success of the update operation.
     */
    public function handle(UpdateAwardRequest $request, Award $award, Candidate $candidate)
    {
        $award->update($request->validated());
        return successfulResponse( message: 'Award updated.', status: ResponseAlias::HTTP_NO_CONTENT);
    }
}
