<?php
require "env.php";
include 'rellotge/rellotge.html';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Viatge</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . 'estils/estils.css'; ?>">
    <script defer src="<?php echo BASE_URL . 'scripts/script.js'; ?>"></script>
    <script defer src="<?php echo BASE_URL . 'scripts/rellotgeAnalogic.js'; ?>"></script>
    <script defer src="<?php echo BASE_URL . 'scripts/rellotgeDigital.js'; ?>"></script>

    </head>
<body>
    <h1>Wonderful Travel</h1>
    <h2>· Crear Viatge</h2>
    <form action="<?php echo BASE_URL. 'controlador/crearViatge.php';?>" method="POST">
        <label for="data">Data: </label>
        <input type="date" id="data" name="data" required> <br>
        <label for="continent">Continent:</label>
        <select id="continent" name="continent" onchange="actualitzarPaisos()" required>
            <option value=""></option>
            <option value="Africa">Àfrica</option>
            <option value="Europa">Europa</option>
            <option value="Àsia">Àsia</option>
            <option value="Amèrica">Amèrica</option>
        </select>

        <label for="pais">País:</label>
        <select id="pais" name="pais" required>
            <option value=""></option>
        </select><br>

        <label for="nom">Nom: </label>
        <input type="text" id="nom" name="nom" placeholder="p. ej: David Romero" required><br>

        <label for="correu">Correu: </label>
        <input type="email" id="correu" name="correu" placeholder="example@example.com" required><br>

        <label for="dni">DNI: </label>
        <input type="text" id="dni" name="dni" placeholder="12345678X" required><br>

        <label for="telf">Telèfon: </label>
        <input type="tel" id="telf" name="telf" placeholder="123 456 789" required><br>

        <label for="nPersonas">Número de persones: </label>
        <input type="number" id="nPersonas" name="nPersonas" value="1" min="1" required><br>

        <label for="checkboxDescompte">
            Aplicar descompte:
            <input type="checkbox" id="checkboxDescompte" name="descompte" onchange="habilitarDescompte()">
        </label><br>

        <label for="inputDescompte">Percentatge de descompte (%):</label>
        <input type="number" id="inputDescompte" name="inputDescompte" min="0" max="100" disabled><br>

        <label for="preuTotal">Preu total: </label>
        <span id="preuTotal"></span><br>
        <input type="hidden" id="precioTotalFormulario" name="preuTotal">


        <input type="submit" name="Enviar">
    </form>
</body>
</html>

<?php
include_once "controlador/llistarViatges.php";
?>