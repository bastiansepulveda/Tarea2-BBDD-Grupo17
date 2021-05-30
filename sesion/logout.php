<?php
/* Este archivo debe manejar la lógica de cerrar una sesión */
session_start();

unset($_SESSION['user']);
unset($_SESSION['admin']);

header('location:../index.html')
?>