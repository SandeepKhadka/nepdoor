<?php

function uploadImage($file, $upload_dir, $thumb = null)
{
    $upload_path = public_path() . '/uploads/' . $upload_dir;
    if (!File::exists($upload_path)) {
        File::makeDirectory($upload_path, 0777, true, true);
    }

    $filename = ucfirst($upload_dir) . '-' . date('Ymdhis') . rand(0, 99) . '.' . $file->getClientOriginalExtension();
    $success = $file->move($upload_path, $filename);

    if ($success) {
        if (!$thumb == null) {
            list($width, $height) = explode('x', $thumb);
            Image::make($upload_path . '/' . $filename)->resize($width, $height, function ($constraints) {
                $constraints->aspectRatio();
            })->save($upload_path . '/Thumb-' . $filename);
            return $filename;
        } else {
            return false;
        }
    }
}

function getOrderId($array)
{
    $order_id = 0;

    $length = count($array);

    foreach ($array as $value) {

        if ($value['order_id'] > $order_id) {
            $order_id = $value['order_id'];
        }
    }

    $order_id += 1;

    return $order_id;
}
