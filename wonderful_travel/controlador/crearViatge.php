<?php
require_once '../model/model.php'; // Incluir el modelo
require_once "../database/connexio.php";

$errors = []; // Array para los errores

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try{
        // Recogemos los datos del formulario
        $data = $_POST["data"] ?? '';
        $dataActual = date('Y-m-d'); // Formato correcto para la fecha actual
        if ($data < $dataActual) {
            throw new Error("La data no pot ser menor a l'actual");
        }
        $pais_nom = $_POST["pais"] ?? '';
        $nom = $_POST["nom"] ?? '';
        $telefon = trim($_POST["telf"] ?? '');
        $correu = $_POST["correu"] ?? '';
        $dni = $_POST["dni"] ?? '';
        $nPersones = $_POST["nPersonas"] ?? 1;
        $descompte = $_POST["inputDescompte"] ?? '';
        $preuTotal = isset($_POST['preuTotal']) ? $_POST['preuTotal'] : null;


        // Validar DNI
        if (!preg_match('/^\d{8}[A-Z]$/', $dni)) {
            echo "El DNI no és vàlid. Ha de tenir 8 dígits i una lletra ❌<br>";
        } else {
            // Validar teléfono
            $telefon = preg_replace('/\s+/', '', $telefon); // Eliminar espacios
            if (!preg_match('/^\d{9}$/', $telefon)) {
                echo "El telèfon ha de tenir 9 dígits ❌<br>";
            } else {
            // Comprobar si la persona ya existe por DNI
            $personaId = personaExiste($connexio, $dni);

            if ($personaId) {
                // Si la persona ya existe, usamos su ID
                echo "La persona ja existeix amb ID: $personaId. Es crearà el viatge. 🛫 <br>";
            } else {
                // Si no existe, creamos una nueva persona
                $personaId = insertarPersona($connexio, $nom, $telefon, $correu, $dni);
                echo "Nova persona creada amb ID: $personaId. 🎉<br>";
            
            }

            // Insertar el viaje
            if(insertarViatge($connexio, $preuTotal, $pais_nom, $data, $nPersones, $descompte, $personaId)){
                echo "Viatge inserit correctament amb ID " . $connexio->lastInsertId() . " ✅<br>"; 
            }

            }
        }
    } catch (Error $e){
        echo "Error: " . $e->getMessage() . "<br>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script defer src="../scripts/script.js"></script>
        <link rel="stylesheet" href="../estils/estils.css">
    </head>
    <body>   
    <a href="../index.php">Tornar a inici</a></br>
    </body>
</html>