<!-- Llistar Viatges -->

<?php
// Codi per mostrar la llista de viatges amb fetchAll
require_once "env.php";

try {
    // Connectar a la base de dades
    $connexio = new PDO('mysql:host=localhost;dbname=wonderful_travel', 'root', ''); // Canvia a wonderful_travel
    $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Consulta per obtenir tots els viatges
    $consulta = $connexio->prepare("SELECT viatge.*, persona.nom FROM viatge INNER JOIN persona ON viatge.Persona_idPersona = persona.idPersona");
    $consulta->execute();
    
    // Obtenir els viatgesW
    $viatges = $consulta->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>· Llista de viatges</h2>"; // Títol de la llista
    echo "<div class='viaje-container'>"; // Contenedor para todos los viajes

    if (count($viatges) > 0) {
        foreach ($viatges as $viatge) {
            // Caja de información del viaje
            echo "<div class='viaje-info'>"; 
            
            // Mostrar la imatge del país dentro de la caja
            $pais = htmlspecialchars($viatge['Pais_nom']);
            
            echo "<strong>Data:</strong> " . htmlspecialchars($viatge['data']) . "<br>";
            echo "<strong>País:</strong> " . htmlspecialchars($viatge['Pais_nom']) . "<br>";
            echo "<strong>Nom de la persona:</strong> " . htmlspecialchars($viatge['nom']) . "<br>";
            echo "<strong>Número de persones:</strong> " . htmlspecialchars($viatge['nPersones']) . " persones<br>";
            echo "<strong>Preu:</strong> " . htmlspecialchars($viatge['preu']) . " €<br><br>";

            echo "<img src='images/" . strtolower($pais) . ".jpg' alt='$pais' class='viaje-img'>";
            echo "</div>"; // Cierre de viaje-info
        }
    } else {
        echo "No hi ha viatges disponibles.<br>";
    }

    echo "</div>"; // Cierre de viaje-container
} catch (PDOException $e) {
    echo "Error de connexió: " . htmlspecialchars($e->getMessage()) . " ❌";
}
?>
