
<?php
// En-tête HTTP pour signaler que la page est introuvable
header("HTTP/1.0 404 Not Found");

// Début de la structure HTML
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Page non trouvée</title>";
echo "</head>";
echo "<body>";

// Contenu de la page d'erreur 404
echo "<h1>Page non trouvée</h1>";
echo "<p>Désolé, la page que vous recherchez est introuvable.</p>";

// Fin de la structure HTML
echo "</body>";
echo "</html>";
?>

