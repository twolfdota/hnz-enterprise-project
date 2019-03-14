<?php

class imgCtrl {

    function addImg($image_target_dir, $image_name, $doc_target_dir, $doc_name) {
        $uploadOk = 1;
        $target_img = $image_target_dir . basename($_FILES["input-file-preview"]["name"]);
        $imageFileType = strtolower(pathinfo($target_img, PATHINFO_EXTENSION));
        $target_doc = $doc_target_dir . basename($_FILES["doc"]["name"]);
        $docFileType = strtolower(pathinfo($target_doc, PATHINFO_EXTENSION));

// Check if file already exists

// Check file size
        if ($_FILES["input-file-preview"]["size"] > 1000000 && $_FILES["doc"]["size"] > 1000000) {
            echo json_encode('Your file is too large!!');
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($docFileType != "doc" && $docFileType != "docx") {
            echo json_encode("Wrong file format.");
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo json_encode('Your file is not uploaded!!');
// if everything is ok, try to upload file
        } else {
            move_uploaded_file($_FILES["input-file-preview"]["tmp_name"], $image_target_dir . $image_name. '.' . $imageFileType);
            if (move_uploaded_file($_FILES["doc"]["tmp_name"], $doc_target_dir . $doc_name. '.' . $docFileType)) {
                echo json_encode('success');
            } else {
                echo json_encode('Error uploading file!!!');
            }
        }
    }

}

?>
