<?php

namespace App\Traits;

use Storage;

trait StorageImageTrait {

  public function getStorageUpload($request, $fieldName, $foderName) {

    if($request->hasFile($fieldName)) {
    $file = $request->$fieldName;
    $filenameOrigin= $file->getClientOriginalName();
    $file_name = time().'-'.$filenameOrigin;
    $path= $request->file($fieldName)->storeAs(
        'public/'.$foderName.'/'. auth()->id(),$file_name );
    $data = [
            'file_name' => $filenameOrigin,
            'file_path' =>Storage::url($path) ,
            ];
            return $data;
    }

    return '';
  }
    
}