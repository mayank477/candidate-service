<?php

namespace App\Http\Controllers\Action\Award;

use App\Http\Resources\AwardResource;
use App\Models\Award;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ListAwardsAction
{
    public function handle(Request $request, Candidate $candidate = null)
    {
        $pageSize = $request->query('page-size', 50);
        $awards = Award::query()->when($candidate, fn(Builder $builder) => $builder->where('candidate_id', '=', $candidate->id))->oldest()->paginate($pageSize);
        return successfulResponse([
            'data' => [
                'awards' => AwardResource::collection($awards),
                'meta' => getPaginatedData($awards, $pageSize)
            ]
        ]);
    }
}
