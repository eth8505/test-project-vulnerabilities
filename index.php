<?php
// Verbindung zur Datenbank (ohne Fehlerbehandlung)
$conn = mysqli_connect("localhost", "root", "", "test");

// User-Eingabe direkt aus GET-Parametern
$username = $_GET['user'];
$password = $_GET['pass'];

// SQL-Injection möglich
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

// Ausgabe des Ergebnisses (kann sensitive Daten enthalten)
if ($row = mysqli_fetch_assoc($result)) {
    echo "Willkommen, " . $row['username'] . "!<br>";
    echo "Dein Passwort ist: " . $row['password'];
} else {
    echo "Login fehlgeschlagen.";
}

// Datei-Upload ohne Prüfung
if (isset($_FILES['upload'])) {
    move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/" . $_FILES['upload']['name']);
    echo "Datei hochgeladen!";
}

// XSS durch Rückgabe ungefilterter Eingaben
if (isset($_GET['msg'])) {
    echo "Nachricht: " . $_GET['msg'];
}
?>
