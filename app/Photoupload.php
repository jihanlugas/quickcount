<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Photoupload extends Model
{
    const RESIZE = '350';

    const FILE_DIRECTORY = 'uploads';
    const FILE_DIRECTORY_RESIZE = self::RESIZE;

    const REF_TYPE_TABLE_CANDIDATES = 1;
    const FILE_SIZE_MAX = 2 * 1024;


    public static function uploadPhoto($request, $ref_id, $ref_type, $file_name)
    {
        $mUploadinc = Uploadinc::getUploadinctoupload($ref_type);
        Uploadinc::runningInc($ref_type);

        $data = new Photoupload();
        $data->ref_type = $ref_type;
        $data->ref_id = $ref_id;
        $data->folder_name = $mUploadinc->folder_name;
        $data->alt_file = $file_name;
        $data->file_name = str_replace(' ', '-', $data->alt_file);
        $data->ext_file = $request->getClientOriginalExtension();
        $data->file_path = $data->folder_name . '/' . $data->file_name;
        $data->file_path_resize = $data->folder_name . '/' . self::RESIZE . '/' . $data->file_name;
        $data->size = $request->getSize();
        Storage::putFileAs($data->folder_name, $request, $data->file_name);
//        $path = asset($data->file_path);
//
//
//        $dataPath = getimagesize($path);
//        $data->width = $dataPath[0];
//        $data->height = $dataPath[1];
//
//        $img = Image::make($path);
//        $img->resize(self::FILE_DIRECTORY_RESIZE, null, function ($constraint) {
//            $constraint->aspectRatio();
//        });
//
//        Storage::putFileAs($data->file_path_resize, $img, $data->file_name);
//
//        $img->save($data->file_path_resize);
        $data->save();

        return $data->id;
    }

    public static function getFilepath($id)
    {
        $mPhotoupload = Photoupload::where('id', $id)->first();
        if (!empty($mPhotoupload)) {
            if ($mPhotoupload->file_path_resize)
                return asset($mPhotoupload->file_path_resize);
            else
                self::getFilepathOrigin($id);
        } else {
            return false;
        }
    }

    public static function getFilepathOrigin($id)
    {
        $mPhotoupload = Photoupload::where('id', $id)->first();
        if (!empty($mPhotoupload)) {
            return asset($mPhotoupload->file_path);
        } else {
            return false;
        }
    }

    public static function deletePhoto($id)
    {
        $mPhotoupload = Photoupload::where('id', $id)->first();
        if (!empty($mPhotoupload)) {
            $file_path = asset(asset($mPhotoupload->file_path));
            $file_path_resize = asset(asset($mPhotoupload->file_path_resize));
            if (file_exists($file_path)) {
                @unlink($file_path);
            }
            if (file_exists($file_path_resize)) {
                @unlink($file_path_resize);
            }
        }
    }
}
