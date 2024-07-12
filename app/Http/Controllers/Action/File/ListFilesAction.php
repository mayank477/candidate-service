<?php

namespace App\Http\Controllers\Action\File;

use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ListFilesAction
{
    public function handle(Request $request, Model $model = null)
    {
        $pageSize = $request->query('page-size', 50);
        $files = File::query()
            ->when(
                $model,
                fn(Builder $builder) => $builder
                    ->where('model_id', '=', $model->id)
                    ->where('model_type', '=', get_class($model))
            )->latest()->paginate($pageSize);
        return successfulResponse([
            'data' => [
                'files' => FileResource::collection($files),
                'meta' => getPaginatedData($files, $pageSize)
            ]
        ], 'Files retrieved.');
    }
}
