<?php

class imgCtrl {
    function addImg($image_target_dir, $image_name, $doc_target_dir, $doc_name, $userid) {

        $uploadOk = 1;
        $target_img = $image_target_dir . basename($_FILES["imageUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_img, PATHINFO_EXTENSION));
        $target_doc = $doc_target_dir . basename($_FILES["doc"]["name"]);
        $docFileType = strtolower(pathinfo($target_doc, PATHINFO_EXTENSION));

// Check if file already exists

// Check file size
        if ($_FILES["imageUpload"]["size"] > 1000000 && $_FILES["doc"]["size"] > 1000000) {
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
            $magazineCtrl->delete($doc_name);
            echo json_encode('Your file is not uploaded!!');
// if everything is ok, try to upload file
        } else {
            
            if (move_uploaded_file($_FILES["doc"]["tmp_name"], $doc_target_dir . $doc_name. '.' . $docFileType)&& move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $image_target_dir . $image_name. '.' . $imageFileType)) {
                $info = $magazineCtrl->getMailInfo($userid);
                $to      = $info->email;
                $subject = 'New magazine submitted to ' .$info->faculty. ' Department';
                $message = 'A student uploaded a new magazine just now, check it out in your cms.\n This is automatic message, please dont reply.';
                $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);
                echo json_encode('upload successfully!');
            } else {
                $magazineCtrl->delete($doc_name);
                echo json_encode('Error uploading file!!!');
            }
        }
    }


}

?>
