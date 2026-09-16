<?php

// Variables
$nombre = "Miguel";
$edad = 22;

// Condición
if ($edad >= 18) {
    echo "Es mayor de edad";
} else {
    echo "Es menor de edad";
}

// Función
function saludar($nombre) {
    return "Hola " . $nombre;
}

echo saludar($nombre);

?>