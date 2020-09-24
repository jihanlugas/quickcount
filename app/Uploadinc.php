<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Uploadinc extends Model
{
    const RUNNING_LIMIT = 8000; //8000 Files
    const FILE_DIRECTORY = 'uploads';
    const FILE_DIRECTORY_RESIZE = '400';

    public static function getUploadinctoupload($id){
        $mUploadinc = Uploadinc::where('ref_tableid', $id)
            ->orderBy('folder_inc', 'DESC')->first();

        if (!empty($mUploadinc)){
            if ($mUploadinc->running >= self::RUNNING_LIMIT){
                $mUploadincnew = New Uploadinc();
                $mUploadincnew->ref_tableid = $id;
                $mUploadincnew->folder_inc = $mUploadinc->folder_inc + 1;
                $mUploadincnew->folder_name = self::FILE_DIRECTORY . '/' . $mUploadinc->ref_tableid . '/' . date('Y-m-d') . '_' . $mUploadincnew->folder_inc;
                $mUploadincnew->running = 0;
                $mUploadincnew->save();

                $mUploadinc = $mUploadincnew;

                Storage::makeDirectory($mUploadinc->folder_name);
//                Storage::makeDirectory($mUploadinc->folder_name . '/' . self::FILE_DIRECTORY_RESIZE);
            }
        }else{
            $mUploadinc = New Uploadinc();
            $mUploadinc->ref_tableid = $id;
            $mUploadinc->folder_inc = 1;
            $mUploadinc->folder_name = self::FILE_DIRECTORY . '/' . $mUploadinc->ref_tableid . '/' . date('Y-m-d') . '_' . $mUploadinc->folder_inc;
            $mUploadinc->running = 0;
            $mUploadinc->save();

            Storage::makeDirectory($mUploadinc->folder_name);
//            Storage::makeDirectory($mUploadinc->folder_name . '/' . self::FILE_DIRECTORY_RESIZE);
        }

        return $mUploadinc;
    }

    public static function runningInc($ref_tableid){
        $mUploadinc = Uploadinc::where('ref_tableid', $ref_tableid)
            ->orderBy('folder_inc', 'DESC')->first();

        if(!empty($mUploadinc)){
            $mUploadinc->running = $mUploadinc->running + 1;
            $mUploadinc->save();
        }
    }
}
