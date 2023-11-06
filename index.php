//TEst
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Bildergalerie</title>
</head>
<body>
    <h1>Bildergalerie</h1>
    
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <input type="submit" value="Bild hochladen">
    </form>

    <h2>Aktuelle Bilder</h2>
    <div class="gallery">
        <?php
            $images = glob("images/*");
            foreach($images as $image) {
                echo "<div class='image-container'>
                        <img src='$image' alt='Bild'>
                        <form action='delete.php' method='post'>
                            <input type='hidden' name='image' value='$image'>
                            <input type='submit' value='Löschen'>
                        </form>
                      </div>";
            }
        ?>
    </div>
</body>
</html>
