<?php
include_once "app/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al panel</title>
    <!-- <link rel="stylesheet" href="public/css/main.css"> -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<style>
    .login{
        
    }
    .row{
        height: 600px;
    }
</style>
</head>
<body>
    <div class="container">
        <section>
            <div class="row justify-content-md-center align-items-center">
                <div class="col-md-6 border col-sm-12 col-lg-6 login">
                    <h1 class="text-center">Acceso al panel</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos error qui fuga cumque numquam ad ducimus fugit tenetur aliquid consectetur! Minima, ipsa! Eveniet dolorem quam aut natus provident nihil corrupti.</p>
                    <form class="form" method="POST" action="app/AuthController.php">
                        <div>
                            <label for="">Correo electronico</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input name="email" type="text" class="form-control" placeholder="user@fakemail.com">
                            </div>
                        </div>
                        <div>
                            <label for="">Contrasenia</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="password" name="password" class="form-control" placeholder="* * * * *" >
                            </div>
                        </div>
                        <input type="hidden" name="action" value="access">
                        <input type="hidden" name="global_token" value="<?= $_SESSION['global_token'] ?>">
                        <button type="submit" class="btn btn-primary col-12 mb-3">Accede</button>
                    </form>
                </div>
                
            </div>
        </section>
    </div>
    <!--<div class="container bg-light">
        <div class="row align-items-center">
            <div class="col-md-4">

            </div>
            <div class="col">            
                <form action="">
                    <fieldset>
                        <legend>Datos de acceso</legend>
                        
                        <label>
                            Email
                        </label>
                        <input type="text" placeholder="Escribe">
                        <br>
                        <label>
                            Password
                        </label>
                        <input type="password" placeholder="* * * * * *">
                        <br><br>
                        <button class="btn btn-secondary" type="submit">
                            Enviar
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    -->
</body>
</html>