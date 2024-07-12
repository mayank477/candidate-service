<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\Response;

function errorResponse(string $message = "Something went wrong, please try again later.", int $status = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
{
    return jsonResponse(
        [
            'success' => false,
            'message' => $message
        ], $status
    );
}

function successfulResponse(array $data = [], string $message = "Operation successful", int $status = Response::HTTP_OK): JsonResponse
{
    return jsonResponse(
        [
            'success' => true,
            'message' => $message,
            ...$data,
        ], $status
    );
}

function jsonResponse(array $data = [], int $status = Response::HTTP_OK): JsonResponse
{
    return response()->json($data, $status);
}

function getPaginatedData(LengthAwarePaginator $paginator, int $pageSize): array
{
    $toArray = $paginator->toArray();
    return [
        'firstPageUrl' => $toArray['first_page_url'],
        'previousPage' => $paginator->previousPageUrl(),
        'nextPage' => $paginator->nextPageUrl(),
        'lastPageUrl' => $toArray['last_page_url'],
        'currentPage' => $paginator->currentPage(),
        'onLastPage' => $paginator->onLastPage(),
        'onFirstPage' => $paginator->onFirstPage(),
        'total' => $paginator->total(),
        'pageSize' => $pageSize,
        'path' => $paginator->path(),
        'from' => $paginator->toArray()['from'],
        'to' => $paginator->toArray()['to'],
        'numberOfRecords' => $paginator->count(),
        'hasPages' => $paginator->hasPages()
    ];
}

function run (callable $action, string $successMessage = null)
{
    try {
        return call_user_func($action);
    } catch (Exception $exception) {
        report($exception);
        return errorResponse();
    }
}

function arrayKeysToSnakeCase(array $array): array
{
    info($array);
    foreach ($array as $ii => $item) {
        $array[\Illuminate\Support\Str::snake($ii)] = $item;
    }

    return $array;
}
