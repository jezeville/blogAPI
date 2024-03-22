
<?php

$servername = 'localhost';
$dbname = 'api';
$username = 'jeremy';
$password = '30062006simon';


try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "erreur : " . $e->getMessage();
}
?>







