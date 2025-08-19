<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if ($data) {
        // Texto plano de la consulta
        $registro = "DNI: " . ($data['dni'] ?? '') . 
                    " | Nombre: " . ($data['nombre'] ?? '') . 
                    " | Fecha de Nacimiento: " . ($data['fecha_nacimiento'] ?? '') . 
                    " | Edad: " . ($data['edad'] ?? '') . "\n";

        // Guardamos en consultas.txt (modo append)
        file_put_contents("consultas.txt", $registro, FILE_APPEND);

        echo "Consulta guardada en texto plano ✅";
    } else {
        echo "❌ Datos inválidos";
    }
}
?>
