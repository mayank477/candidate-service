<?php

namespace App\Http\Controllers\Action\File;

use App\Http\Requests\UploadFileRequest;
use App\Http\Resources\FileResource;
use App\Interfaces\UploadsFile;
use App\Models\File;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * Class StoreFileAction
 *
 * This class handles the upload file request.
 *
 * @package YourPackage
 */
class StoreFileAction
{
    /**
     * Handle the upload file request.
     *
     * @param UploadFileRequest $request The upload file request object.
     * @param UploadsFile $canUploadFile The object that can upload the file.
     * @return JsonResponse The response containing the uploaded file details.
     */
    public
    function handle(UploadFileRequest $request, UploadsFile $canUploadFile)
    {
        $file = File::query()->create($this->getFileData($request, $canUploadFile));

        return successfulResponse([
            'data' => [
                'file' => new FileResource($file->refresh())
            ]
        ], 'File uploaded.', ResponseAlias::HTTP_CREATED);
    }

    /**
     * @param UploadFileRequest $request
     * @param UploadsFile $canUploadFile
     * @return array
     */
    public function getFileData(UploadFileRequest $request, UploadsFile $canUploadFile): array
    {
        $attachment = $request->file('file');
        $extension = $attachment->getClientOriginalExtension();
        $path = $attachment->storeAs('attachments', uuid_create() . '.' . $extension, ['disk' => 'public']);

        return [
            'external_id' => uuid_create(),
            'size' => $attachment->getSize(),
            'name' => $request->validated('name'),
            'type' => $extension,
            'path' => $path,
            'model_id' => $canUploadFile->id,
            'model_type' => get_class($canUploadFile),
        ];
    }
}
