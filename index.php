<?php
$conn = mysqli_connect("localhost", "root", "", "test");

$username = $_GET['user'];
$password = $_GET['pass'];

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    echo "Willkommen, " . $row['username'] . "!<br>";
    echo "Dein Passwort ist: " . $row['password'];
} else {
    echo "Login fehlgeschlagen.";
}

try {
    json_decode(json: 'no', flags: JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo "Ein Fehler ist aufgetreten: " . $e->getMessage();
}

if (isset($_FILES['upload'])) {
    move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/" . $_FILES['upload']['name']);
    echo "Datei hochgeladen!";
}

if (isset($_GET['msg'])) {
    echo "Nachricht: " . $_GET['msg'];
}

$res = mysqli_fetch_assoc(mysqli_query("SELECT html FROM mailing WHERE mailing_id=1"));
echo $res['html'];

echo file_get_contents($_GET['file']);

?>

<script
    src="/jquery-1.11.1.js"></script>
