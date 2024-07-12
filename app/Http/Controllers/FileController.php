<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Action\File\ListFilesAction;
use App\Http\Controllers\Action\File\StoreFileAction;
use App\Http\Requests\UploadFileRequest;
use App\Http\Resources\FileResource;
use App\Models\Candidate;
use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(Request $request, ListFilesAction $action, Model $model = null)
    {
        return $action->handle($request, $model);
    }

    public function store(UploadFileRequest $request, StoreFileAction $action, Candidate $candidate)
    {
        return $action->handle($request, $candidate);
    }

    public function show(Candidate $candidate, File $file)
    {
        return successfulResponse([
            'data' => [
                'file' => new FileResource($file->load('model'))
            ]
        ], 'Attachment retrieved.');
    }
}
