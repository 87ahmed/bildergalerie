<?php
$servername = "localhost"; // Hier den Hostnamen eingeben
$dbname = "test"; // Hier den Datenbanknamen eingeben
$username = "root"; // Hier den Benutzernamen eingeben
$password = ""; // Hier das Passwort eingeben

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_FILES['image'])) {
        $bildname = $_FILES['image']['name'];
        $bilddatei = file_get_contents($_FILES['image']['tmp_name']);

        $stmt = $conn->prepare("INSERT INTO bilder (bildname, bilddatei) VALUES (:bildname, :bilddatei)");
        $stmt->bindParam(':bildname', $bildname);
        $stmt->bindParam(':bilddatei', $bilddatei, PDO::PARAM_LOB);
        $stmt->execute();

        echo "Bild erfolgreich hochgeladen.";
    }
}
catch(PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}
?>
