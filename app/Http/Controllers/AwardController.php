<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Action\Award\DeleteAwardAction;
use App\Http\Controllers\Action\Award\ListAwardsAction;
use App\Http\Controllers\Action\Award\StoreAwardAction;
use App\Http\Controllers\Action\Award\UpdateAwardAction;
use App\Http\Requests\StoreAwardRequest;
use App\Http\Requests\UpdateAwardRequest;
use App\Models\Award;
use App\Models\Candidate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * AwardController class
 *
 * This class is responsible for handling award-related HTTP requests and
 * delegating the handling to respective action classes.
 *
 * @package YourPackage
 * @subpackage Controllers
 */
class AwardController extends Controller
{
    /**
     * Perform the index operation.
     *
     * @param Request $request The HTTP request object.
     * @param ListAwardsAction $action An instance of ListAwardsAction.
     *
     * @return JsonResponse The result of the handle method invocation on the ListAwardsAction object.
     */
    public function index(Request $request, Candidate $candidate, ListAwardsAction $action)
    {
        return $action->handle($request, $candidate);
    }

    /**
     * Store an award for a candidate.
     *
     * @param StoreAwardRequest $request The request object containing the award data.
     * @param StoreAwardAction $action The action instance responsible for handling the award storing logic.
     * @param Candidate $candidate The candidate for whom the award is to be stored.
     * @return JsonResponse Returns the result of the handle method of the StoreAwardAction instance.
     */
    public function store(StoreAwardRequest $request, StoreAwardAction $action, Candidate $candidate)
    {
        return $action->handle($request, $candidate);
    }

    /**
     * Update an award for a candidate.
     *
     * @param UpdateAwardRequest $request The request object containing the updated award data.
     * @param UpdateAwardAction $action The action instance responsible for handling the award update logic.
     * @param Award $award The award to be updated.
     * @param Candidate $candidate The candidate for whom the award is being updated.
     * @return JsonResponse Returns the result of the handle method of the UpdateAwardAction instance.
     */
    public function update(UpdateAwardRequest $request, UpdateAwardAction $action, Candidate $candidate, Award $award)
    {
        return $action->handle($request, $award, $candidate);
    }

    /**
     * Destroy an award for a candidate.
     *
     * @param DeleteAwardAction $action The action instance responsible for handling the award deletion logic.
     * @param Award $award The award to be deleted.
     * @param Candidate $candidate The candidate for whom the award is to be deleted.
     * @return JsonResponse Returns the result of the handle method of the DeleteAwardAction instance.
     */
    public function destroy(DeleteAwardAction $action, Candidate $candidate, Award $award)
    {
        return $action->handle($candidate, $award);
    }
}
