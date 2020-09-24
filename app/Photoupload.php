<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Photoupload extends Model
{
    const RESIZE = '350';

    const FILE_DIRECTORY = 'uploads';
    const FILE_DIRECTORY_RESIZE = self::RESIZE;

    const REF_TYPE_TABLE_CANDIDATES = 1;


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
        $path = $request->move($data->folder_name, $data->file_name);
        $dataPath = getimagesize($path);
        $data->width = $dataPath[0];
        $data->height = $dataPath[1];

        $img = Image::make($path);
        $img->resize(self::FILE_DIRECTORY_RESIZE, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save($data->file_path_resize);
        $data->save();

        return $data->id;
    }
}
