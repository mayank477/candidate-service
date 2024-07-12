<?php

namespace App\Http\Controllers\Action\Candidate;

use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class CandidateIndexAction
{
    /**
     * Handle the incoming request.
     *
     * @return JsonResponse
     */
    public function hande(): JsonResponse
    {
        $request = request();
        info('Get candidates request received');
        $pageSize = $request->query('page-size', 50);
        $yearsOfExperience = (int)$request->query('year-of-experience', 0);
        $startDate = $request->query('start-registered-at');
        $endDate = $request->query('end-registered-at');
        $externalIds = $request->query('externalIds');

        $candidates = Candidate::with('awards')
            ->when($externalIds, fn(Builder $builder) => $builder->whereIn('external_id', json_decode($externalIds)))
            ->when($name = $request->query('name'), fn(Builder $builder) => $builder->where('name', 'LIKE', "%$name%"))
            ->when($email = $request->query('email'), fn(Builder $builder) => $builder->where('email', 'LIKE', "%$email%"))
            ->when($phoneNumber = $request->query('phone-number'), fn(Builder $builder) => $builder->where('phone_number', 'LIKE', "%$phoneNumber%"))
            ->when($jobTitle = $request->query('job-title'), fn(Builder $builder) => $builder->where('job_title', 'LIKE', "%$jobTitle%"))
            ->when($nationality = $request->query('nationality'), fn(Builder $builder) => $builder->where('nationality', 'LIKE', "%$nationality%"))
            ->when($address = $request->query('address'), fn(Builder $builder) => $builder->where('address', 'LIKE', "%$address%"))
            ->when($yearsOfExperience, fn(Builder $builder) => $builder->where('years_of_experience', '>=', $yearsOfExperience))
            ->when($startDate, fn(Builder $builder) => $builder->where('created_at', ">=", Carbon::parse($startDate)->startOfDay()->toDateTimeString()))
            ->when($endDate, fn(Builder $builder) => $builder->where('created_at', "<=", Carbon::parse($endDate)->endOfDay()->toDateTimeString()))
            ->orderBy('name')->paginate($pageSize);

        return successfulResponse([
            'candidates' => [
                'data' => CandidateResource::collection($candidates),
                'meta' => getPaginatedData($candidates, $pageSize),
            ]
        ], 'Candidates retrieved.');
    }
}
