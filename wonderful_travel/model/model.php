<?php
// Función para insertar una persona en la base de datos
function insertarPersona($conn, $nom, $telefon, $correu, $dni) {
    $stmt = $conn->prepare("INSERT INTO persona (nom, telefon, correu, dni) VALUES (:nom, :telefon, :correu, :dni)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':telefon', $telefon);
    $stmt->bindParam(':correu', $correu);
    $stmt->bindParam(':dni', $dni);
    $stmt->execute();
    
    return $conn->lastInsertId(); // Retorna el ID de la persona insertada
}

// Función para verificar si una persona ya existe por DNI
function personaExiste($conn, $dni) {
    
        $stmt = $conn->prepare("SELECT idPersona FROM persona WHERE dni = :dni");
        $stmt->bindParam(':dni', $dni);
        $stmt->execute();
        
        return $stmt->fetchColumn(); // Devuelve el ID si existe, de lo contrario NULL
    
    
}

// Función para insertar un viaje en la base de datos
function insertarViatge($connexio, $preuTotal, $pais_nom, $data, $nPersones, $descompte, $personaId) {
    if (empty($pais_nom)) {
        throw new Exception('El país no puede estar vacío');
    }
    $sql = "INSERT INTO viatge (preu, Pais_nom, data, nPersones, descompte, Persona_idPersona)
            VALUES (:preu, :Pais_nom, :data, :nPersones, :descompte, :Persona_idPersona)";
    $stmt = $connexio->prepare($sql);
    if($stmt->execute([
        ':preu' => $preuTotal,
        ':Pais_nom' => $pais_nom,
        ':data' => $data,
        ':nPersones' => $nPersones,
        ':descompte' => $descompte,
        ':Persona_idPersona' => $personaId
    ])){
        return true;
    } else {
        return false;
    }

    
}


?>
