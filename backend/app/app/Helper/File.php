<?php

namespace App\Helper;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class File
{
    public static function UploadFile($path, $file,$title='')
    {
        $fileName = '';
        if($title == ''){
            $currentDate =  Carbon::now()->timestamp;
            $fileName = $currentDate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        }else{
            $fileName = $title . '.png';
        }

        Storage::disk('public')->putFileAs($path, $file, $fileName);
        return $fileName;
    }

    public static function DeleteFile($path, $fileName)
    {
        if (Storage::disk('public')->exists($path . '/' . $fileName))
            Storage::disk('public')->delete($path . '/' . $fileName);
    }

    public static function UpdateFile($oldPath, $oldName, $newPath, $file, $title='')
    {
        self::DeleteFile($oldPath, $oldName);
        return self::UploadFile($newPath, $file, $title);
    }
}
