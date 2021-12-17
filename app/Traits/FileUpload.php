<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

trait FileUpload
{
    public function upload($field, $scope)
    {
        $file = request()->file($field);

        $filePath = $file->getRealPath();
        $fileHash = md5_file($filePath);

        abort_unless($fileHash, Response::HTTP_INTERNAL_SERVER_ERROR);

        $fileExtension = $file->getClientOriginalExtension();
        $randomString = Str::random();
        $dateTime = date('Ymd-His');

        $fileName = "{$dateTime}{$randomString}{$fileHash}.{$fileExtension}";

        $filePath = public_path($scope);

        if(!File::exists($filePath)) File::makeDirectory($filePath);

        $fileAddress = "$filePath/$fileName";
        $success = File::copy($file->getRealPath(), $fileAddress);

        abort_unless($success, Response::HTTP_INTERNAL_SERVER_ERROR);

        return $fileAddress;
    }
}
