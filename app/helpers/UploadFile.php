<?php 

class UploadFile {
    public static function upload($file, $name, $location = 'uploaded/') {
        $fileName = $file['file']['name'];
        $fileSize = $file['file']['size'];
        $fileTmp = $file['file']['tmp_name'];
        $fileError = $file['file']['error'];

        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        $fileName = $name . '.' . $extension;

        move_uploaded_file($fileTmp, '../public/' . $location . $fileName);

        return $fileName;

    }
}