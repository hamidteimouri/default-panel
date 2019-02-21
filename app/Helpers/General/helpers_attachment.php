<?php
define('BASE_PATH_TO_UPLOAD', 'uploads/');
define('STORAGE_PATH_TO_UPLOAD', 'public/');
define('STORAGE_PATH_TO_UPLOAD_PDF', 'public/pdf/');
define('STORAGE_PATH_TO_UPLOAD_USER', 'public/user/');

define('WEBSITE_NAME', "sitename");


function imgAttachmentCreate($object, $file, $slug, $title, $cropper = null, $thumbnails = null, $groupName = null, $quality = 90, $watermark = false, $storage = false)
{
    if (is_null($file)) {
        return false;
    }
    $allowed = ['image/jpeg', 'image/png', 'image/gif'];

    if (1) {  // check for image types
        $modelName = $object->getTable();
        $id = $object->id;
        $modelName = md5($modelName);
        $id = md5($id);
        $randText = str_random(4);


        //Make Model Folder
        if (!\Illuminate\Support\Facades\File::exists(BASE_PATH_TO_UPLOAD . $modelName . '/')) {
            \Illuminate\Support\Facades\File::makeDirectory(BASE_PATH_TO_UPLOAD . $modelName . '/');
        }
        //Make Object Folder
        if (!\Illuminate\Support\Facades\File::exists(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/')) {
            \Illuminate\Support\Facades\File::makeDirectory(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/');
        }


        if (!is_array($file)) {
            //Create a name for a file
            //$fileName = WEBSITE_NAME . '-' . $randText . '-' . utf8_encode($file->getClientOriginalName());

            //Remove Special Character
            $fileName = WEBSITE_NAME . '-' . $randText . '-' . preg_replace("/[^a-zA-Z0-9.]/", '', $file->getClientOriginalName());;


            //this is for assurance. change file name if the same exist...
            if (File::exists(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/' . $fileName)) {
                $fileName = rand(10000, 99999) . '-' . $fileName;
            }
            $filePath = BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/' . $fileName;


            //calculate file size
            $size = intval($file->getClientSize());
            $size = ($size / 1024) / 1024;

            $size_format = 'MB';     //Megabyte
            if ($size < 1) {
                $size = $size * 1024;
                $size_format = 'KB'; //kilobyte
            }


            $object->attachments()->create([
                'title' => $title,
                'slug' => $slug,
                'mime' => $file->getMimeType(),
                'file_name' => $fileName,
                'group_name' => $groupName,
                'size_format' => $size_format,
                'size' => intval($size)
            ]);

            $img = \Intervention\Image\Facades\Image::make($file);


            // crop the image
            if (!is_null($cropper)) {
                $width = intval($cropper['w']);
                $height = intval($cropper['h']);
                $x = intval($cropper['x']);
                $y = intval($cropper['y']);
                $img = $img->crop($width, $height, $x, $y);
            }

            // set watermark on the image
            if ($watermark) {

            }
            $img->save($filePath, $quality);


            // code below is for create thumbnails
//            if (exif_imagetype($filePath)) {
            if (isset($thumbnails)) {
                foreach ($thumbnails as $thumb_size) {
                    list($width, $height) = explode('/', $thumb_size);
                    $img_thumb = Image::make($filePath);


                    // when the width does not matter
                    if ($width == 0) {
                        $img_thumb->resize(null, intval($height), function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });


                        // when the height does not matter
                    } elseif ($height == 0) {
                        $img_thumb->resize(intval($width), null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                    } else {
                        $img_thumb->fit(intval($width), intval($height));
                    }
                    $img_thumb->save(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/' . 'th_' . $width . '-' . $height . '_' . $fileName);
                }
            }
//            }
        }


    }


}


function imgAttachmentUpdate($object, $file, $slug, $title, $cropper = null, $thumbnails = null, $groupName = null, $quality = 90, $watermark = false, $storage = false)
{
    if (is_null($file)) {
        return false;
    }
    $allowed = ['image/jpeg', 'image/png', 'image/gif'];

    if (1) {  // check for image types


        // Delete Old Images
        if (!is_null($title)) {
            $object->attachments('slug', $slug)->where('title', $title)->get()->each(function ($attachment) {
                $attachment->delete();
            });
        }


        $modelName = $object->getTable();
        $id = $object->id;
        $modelName = md5($modelName);
        $id = md5($id);
        $randText = str_random(4);


        //Make Model Folder
        if (!\Illuminate\Support\Facades\File::exists(BASE_PATH_TO_UPLOAD . $modelName . '/')) {
            \Illuminate\Support\Facades\File::makeDirectory(BASE_PATH_TO_UPLOAD . $modelName . '/');
        }
        //Make Object Folder
        if (!\Illuminate\Support\Facades\File::exists(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/')) {
            \Illuminate\Support\Facades\File::makeDirectory(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/');
        }


        if (!is_array($file)) {
            //Create a name for a file
            //$fileName = WEBSITE_NAME . '-' . $randText . '-' . utf8_encode($file->getClientOriginalName());

            //Remove Special Character
            $fileName = WEBSITE_NAME . '-' . $randText . '-' . preg_replace("/[^a-zA-Z0-9.]/", '', $file->getClientOriginalName());;


            //this is for assurance. change file name if the same exist...
            if (File::exists(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/' . $fileName)) {
                $fileName = rand(10000, 99999) . '-' . $fileName;
            }
            $filePath = BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/' . $fileName;


            //calculate file size
            $size = intval($file->getClientSize());
            $size = ($size / 1024) / 1024;

            $size_format = 'MB';     //Megabyte
            if ($size < 1) {
                $size = $size * 1024;
                $size_format = 'KB'; //kilobyte
            }


            $object->attachments()->create([
                'title' => $title,
                'slug' => $slug,
                'mime' => $file->getMimeType(),
                'file_name' => $fileName,
                'group_name' => $groupName,
                'size_format' => $size_format,
                'size' => intval($size)
            ]);

            $img = \Intervention\Image\Facades\Image::make($file);


            // crop the image
            if (!is_null($cropper)) {
                $width = intval($cropper['w']);
                $height = intval($cropper['h']);
                $x = intval($cropper['x']);
                $y = intval($cropper['y']);
                $img = $img->crop($width, $height, $x, $y);
            }

            // set watermark on the image
            if ($watermark) {

            }
            $img->save($filePath, $quality);


            // code below is for create thumbnails
//            if (exif_imagetype($filePath)) {
            if (isset($thumbnails)) {
                foreach ($thumbnails as $thumb_size) {
                    list($width, $height) = explode('/', $thumb_size);
                    $img_thumb = Image::make($filePath);


                    // when the width does not matter
                    if ($width == 0) {
                        $img_thumb->resize(null, intval($height), function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });


                        // when the height does not matter
                    } elseif ($height == 0) {
                        $img_thumb->resize(intval($width), null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                    } else {
                        $img_thumb->fit(intval($width), intval($height));
                    }
                    $img_thumb->save(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/' . 'th_' . $width . '-' . $height . '_' . $fileName);
                }
            }
//            }
        }


    }


}


function src($object, $slug, $thumb_size = null, $title = 'main_img')
{

    $table = md5($object->getTable());
    $id = md5($object->id);
    $width = ($thumb_size) ? explode('/', $thumb_size)[0] : false;
    $height = ($thumb_size) ? explode('/', $thumb_size)[1] : false;

    if ($attachment = $object->attachments()->where('slug', $slug)->where('title', $title)->first()) {
        if ($width && $height) {
            $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . $table . "/" . $id . "/th_{$width}-{$height}_" . $attachment->file_name;
        } else {
            $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . $table . "/" . $id . "/" . $attachment->file_name;
        }
    } else {
        if ($slug != 'user') {
            if ($width && $height) {
                if (file_exists(BASE_PATH_TO_UPLOAD . "defaults/th_{$width}-{$height}_default.jpg")) {
                    $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . "defaults/th_{$width}-{$height}_default.jpg";
                } else {
                    Image::make(BASE_PATH_TO_UPLOAD . "default.jpg")->fit($width, $height)->save(BASE_PATH_TO_UPLOAD . "defaults/th_{$width}-{$height}_default.jpg");
                    $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . "defaults/th_{$width}-{$height}_default.jpg";
                }
            } else {
                $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . "default.jpg";
            }
        } else {
            if ($width && $height) {
                if (file_exists(BASE_PATH_TO_UPLOAD . "defaults/user/th_{$width}-{$height}_user.jpg")) {
                    $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . "defaults/user/th_{$width}-{$height}_user.jpg";
                } else {
                    Image::make(BASE_PATH_TO_UPLOAD . "user.jpg")->fit($width, $height)->save(BASE_PATH_TO_UPLOAD . "defaults/user/th_{$width}-{$height}_user.jpg");
                    $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . "defaults/user/th_{$width}-{$height}_user.jpg";
                }
            } else {
                $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . "user.jpg";
            }
        }
    }

    return $src;
}


function src_raw($object_id, $object_type, $slug, $title = 'main_img', $thumb_size = null, $tableName = null)
{
    $table = md5($tableName);
    $id = md5($object_id);
    $width = ($thumb_size) ? explode('/', $thumb_size)[0] : false;
    $height = ($thumb_size) ? explode('/', $thumb_size)[1] : false;

    if ($attachment = \App\Attachment::where('attachmentable_type', $object_type)->where('attachmentable_id', $object_id)->where('slug', $slug)->where('title', $title)->first()) {
        if ($width && $height) {
            $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . $table . "/" . $id . "/th_{$width}-{$height}_" . $attachment->file_name;
        } else {
            $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . $table . "/" . $id . "/" . $attachment->file_name;
        }
    } else {
        if ($slug != 'user') {
            if ($width && $height) {
                if (file_exists(BASE_PATH_TO_UPLOAD . "defaults/th_{$width}-{$height}_default.jpg")) {
                    $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . "defaults/th_{$width}-{$height}_default.jpg";
                } else {
                    Image::make(BASE_PATH_TO_UPLOAD . "default.jpg")->fit($width, $height)->save(BASE_PATH_TO_UPLOAD . "defaults/th_{$width}-{$height}_default.jpg");
                    $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . "defaults/th_{$width}-{$height}_default.jpg";
                }
            } else {
                $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . "default.jpg";
            }
        } else {
            if ($width && $height) {
                if (file_exists(BASE_PATH_TO_UPLOAD . "defaults/user/th_{$width}-{$height}_user.jpg")) {
                    $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . "defaults/user/th_{$width}-{$height}_user.jpg";
                } else {
                    Image::make(BASE_PATH_TO_UPLOAD . "user.jpg")->fit($width, $height)->save(BASE_PATH_TO_UPLOAD . "defaults/user/th_{$width}-{$height}_user.jpg");
                    $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . "defaults/user/th_{$width}-{$height}_user.jpg";
                }
            } else {
                $src = url('/') . "/" . BASE_PATH_TO_UPLOAD . "user.jpg";
            }
        }
    }

    return $src;
}


function attachmentsDelete_img($object, $slug)
{
    $object->attachments($slug)->get()->each(function ($attachment) {
        $attachment->delete();
    });
}

function attachmentsDeleteById($object, $attachment_id)
{
    $object->attachments()->where('id', $attachment_id)->get()->each(function ($attachment) {
        $attachment->delete();
    });
}


function videoAttachmentCreate($object, $file, $slug, $title, $groupName = null, $quality = 90, $watermark = false, $storage = false)
{
    if (!is_null($file)) {
        if (1) { // check for image types must be written
            $modelName = $object->getTable();
            $id = $object->id;
            $modelName = md5($modelName);
            $id = md5($id);
            $randText = str_random(4);

            //Make Model Folder
            if (!\Illuminate\Support\Facades\File::exists(BASE_PATH_TO_UPLOAD . $modelName . '/')) {
                \Illuminate\Support\Facades\File::makeDirectory(BASE_PATH_TO_UPLOAD . $modelName . '/');
            }
            //Make Object Folder
            if (!\Illuminate\Support\Facades\File::exists(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/')) {
                \Illuminate\Support\Facades\File::makeDirectory(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/');
            }
            /*
            //calculate file size
            $size = intval($file->getClientSize());
            $size = ($size / 1024) / 1024;


            $size_format = 'MB';     //Megabyte
            if ($size < 1) {
                $size = $size * 1024;
                $size_format = 'KB'; //kilobyte
            }
            */


            //Create a name for a file
            //$fileName = WEBSITE_NAME . '-' . $randText . '-' . utf8_encode($file->getClientOriginalName());

            //Remove Special Character
            $fileName = WEBSITE_NAME . '-' . $randText . '-' . preg_replace("/[^a-zA-Z0-9.]/", '0', $file->getClientOriginalName());;

            if (File::exists(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/' . $fileName)) {
                $fileName = rand(10000, 99999) . '-' . $fileName;
            }
            $filePath = BASE_PATH_TO_UPLOAD . $modelName . '/' . $id;
            $file->move($filePath, $fileName);

            $object->attachments()->create([
                'title' => $title,
                'slug' => $slug,
                #'mime' => $file->getMimeType(),
                'file_name' => $fileName,
                'group_name' => $groupName,
                #'size_format' => $size_format,
                #'size' => intval($size)
            ]);
        }
    }
}

function videoAttachmentUpdate($object, $file, $slug, $title, $groupName = null, $quality = 90, $watermark = false, $storage = false)
{

    // Delete Old Images
    if (!is_null($title)) {
        $object->attachments('slug', $slug)->where('title', $title)->get()->each(function ($attachment) {
            $attachment->delete();
        });
    }

    if (!is_null($file)) {
        if (1) { // check for image types must be written
            $modelName = $object->getTable();
            $id = $object->id;
            $modelName = md5($modelName);
            $id = md5($id);
            $randText = str_random(4);

            //Make Model Folder
            if (!\Illuminate\Support\Facades\File::exists(BASE_PATH_TO_UPLOAD . $modelName . '/')) {
                \Illuminate\Support\Facades\File::makeDirectory(BASE_PATH_TO_UPLOAD . $modelName . '/');
            }
            //Make Object Folder
            if (!\Illuminate\Support\Facades\File::exists(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/')) {
                \Illuminate\Support\Facades\File::makeDirectory(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/');
            }
            /*
            //calculate file size
            $size = intval($file->getClientSize());
            $size = ($size / 1024) / 1024;


            $size_format = 'MB';     //Megabyte
            if ($size < 1) {
                $size = $size * 1024;
                $size_format = 'KB'; //kilobyte
            }
            */


            //Create a name for a file
            //$fileName = WEBSITE_NAME . '-' . $randText . '-' . utf8_encode($file->getClientOriginalName());

            //Remove Special Character
            $fileName = WEBSITE_NAME . '-' . $randText . '-' . preg_replace("/[^a-zA-Z0-9.]/", '0', $file->getClientOriginalName());;

            if (File::exists(BASE_PATH_TO_UPLOAD . $modelName . '/' . $id . '/' . $fileName)) {
                $fileName = rand(10000, 99999) . '-' . $fileName;
            }
            $filePath = BASE_PATH_TO_UPLOAD . $modelName . '/' . $id;
            $file->move($filePath, $fileName);

            $object->attachments()->create([
                'title' => $title,
                'slug' => $slug,
                #'mime' => $file->getMimeType(),
                'file_name' => $fileName,
                'group_name' => $groupName,
                #'size_format' => $size_format,
                #'size' => intval($size)
            ]);
        }
    }
}

function musicAttachmentCreate($object, $file, $slug, $title, $groupName = null)
{

}