<?php
if(isset($_POST['image'])) {
    $image = $_POST['image'];
    if(file_exists($image)) {
        unlink($image);
        echo "Das Bild wurde gelöscht.";
    } else {
        echo "Das Bild konnte nicht gefunden werden.";
    }
}
?>
