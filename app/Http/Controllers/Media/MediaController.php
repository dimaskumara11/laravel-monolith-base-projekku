<?php

namespace App\Http\Controllers\Media;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Media\MediaUploadFileRequest;
use App\Models\MediaModel;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    private $mediaModel;
    private $responseHelper;
    public function __construct()
    {
        $this->mediaModel = new MediaModel();
        $this->responseHelper = new ResponseHelper();
    }

    public function uploadFile(MediaUploadFileRequest $request)
    {
        $pathFile = Storage::putFile(
            $request->folder_name??"",
            $request->file,
        );

        $data           = $this->mediaModel;
        $data->path     = $pathFile;
        $data->type     = $request->file->getClientMimeType();
        $data->filename = $request->file_name ? : $request->file->getClientOriginalName();
        $data->is_used  = false;
        return response()->custom($data->save() ? $this->responseHelper->responseInsertSuccess(["id"=>$data->id,"token_csrf"=>csrf_token(),"path"=>$pathFile]) : $this->responseHelper->responseInsertFail(["token_csrf"=>csrf_token()]));
    }
}