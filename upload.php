<?php
if(isset($_FILES['image'])) {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Überprüfen, ob es sich um ein echtes Bild handelt
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Datei ist kein Bild.";
        $uploadOk = 0;
    }

    // Überprüfen, ob die Datei bereits existiert
    if (file_exists($target_file)) {
        echo "Die Datei existiert bereits.";
        $uploadOk = 0;
    }

    // Überprüfen, ob das Bild erfolgreich hochgeladen wurde
    if ($uploadOk == 0) {
        echo "Das Bild wurde nicht hochgeladen.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Das Bild ". basename( $_FILES["image"]["name"]). " wurde hochgeladen.";
        } else {
            echo "Beim Hochladen des Bildes ist ein Fehler aufgetreten.";
        }
    }
}
?>
