<?php include $_SERVER['DOCUMENT_ROOT'].'/db_config.php'; ?>

<?php 

session_start();

if( isset($_POST['email']) && isset($_POST['pwd'])) {
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    $consulta = "SELECT * FROM usuario WHERE correo = '$email' AND contraseña = '$password'";

    $resultado = pg_query($dbconn, $consulta);

    echo $resultado;

    $filas = pg_num_rows($resultado);

    if($filas>0){
        header("location:../index.html");
    }
    else{
        echo 'error (también)';
    }

    $_SESSION['user'] = $email;

    if($email=='cecilia.reyes@gmail.com'){
        $_SESSION['admin'] = 1;
    }
    else{
        $_SESSION['admin'] = 0;
    }

    pg_free_result($resultado);

    pg_close($dbconn);
}

?>