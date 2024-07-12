<?php

namespace App\Http\Controllers\Action\Award;

use App\Models\Award;
use App\Models\Candidate;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * Class DeleteAwardAction
 *
 * This class handles the deletion of an award for a candidate.
 */
class DeleteAwardAction
{
    /**
     * Handle the deletion of an award for a candidate.
     *
     * @param Candidate $candidate The candidate for whom the award is being deleted.
     * @param Award $award The award being deleted.
     * @return JsonResponse
     */
    public function handle(Candidate $candidate, Award $award)
    {
        if ($candidate->awards()->find($award)->first()->delete()) {
            return successfulResponse(status: ResponseAlias::HTTP_NO_CONTENT);
        }

        return successfulResponse(message: 'Award not found', status: ResponseAlias::HTTP_NOT_FOUND);
    }
}
