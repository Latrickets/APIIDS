<?php 
    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nombre']) && !empty($_POST['escuela']) && !empty($_POST['confirm_password']))
    {
        if(strlen($_POST['password']) >= 8)
        {
            if ($_POST['password'] == $_POST['confirm_password']) {
                $sql = "INSERT INTO users (nombre, escuela, mail, pass) VALUES (:nombre, :escuela, :email, :pass)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nombre', $_POST['nombre']);
                $stmt->bindParam(':escuela', $_POST['escuela']);
                $stmt->bindParam(':email', $_POST['email']);
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $stmt->bindParam(':pass', $password);

                if ($stmt->execute()) {
                    $message = 'Usuario creado.';
                } else {
                    $message = 'Hubo un error al crear el usuario.';
                }
            } else {
                $message = 'La confirmacion de la contraseña debe de ser igual';
            }
        } else if(strlen($_POST['password']) < 8){
            $message = 'La contraseña debe de ser mayor a 8 caracteres';
        } else if($_POST['password'] != $_POST['confirm_password']){
            $message = 'La confirmacion de la contraseña debe de ser igual';
        } else{
            $message = 'Hubo un error al crear el usuario.';
        } 
    } else if(empty($_POST['email']) && empty($_POST['password']) && empty($_POST['nombre']) && empty($_POST['escuela']) && empty($_POST['confirm_password'])) {
        $message = '';
    } else {
        $message = 'Rellene todos los campos solicitados.';
    }



?>