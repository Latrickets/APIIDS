<?php 
    include '../app/ProductController.php';
    $productController = new ProductController;
    if (isset($_GET['slug'])) {
        $slug = $_GET['slug'];
        $product = $productController->getProduct($slug);
        //var_dump($product);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
    aside {
        height: 90vh;
    }
    </style>
</head>

<body>
    <!--NAVBAR-->
    <?php include '../layouts/navbar.php'; ?>
    <!--NAVBAR-->

    <div class="container-fluid">
        <div class="row">
            <!--SIDEBAR-->
            <?php include '../layouts/sidebar.php' ?>
            
            <!--CONTENT-->
            <div class="col-lg-10 col-sm-12">
                <!--BREAD-->
                <div class="border-bottom">
                    <div class="row m-2">
                        <div class="col">
                            <p>Productos</p>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-info float-end" data-bs-toggle="modal"
                                data-bs-target="#createProductModal">
                                Anadir producto
                            </button>
                        </div>
                    </div>
                </div>
                <!--CONTENT-->
                <div class="row">
                    <div class="col-md-5 col-sm-8 py-4">
                        <img src="<?= $product->cover ?>" class="card-img-top"  alt="...">
                    </div>
                    <div class="col-md-6 col-sm-10 py-4">
                        <h5 class="card-title text-center mt-2"><?= $product->name ?></h5>
                        <h6 class="mt-2">Descripcion</h6>
                        <p><?= $product->description ?></p>
                        <p>Marca: <?= ($product->brand == null ? "Sin categoria" : $product->brand->name) ?></p>
                        <p>Etiquetas:</p>
                        <ul>                            
                            <?php foreach ($product->tags as $tag) {?>
                                <li> <?= $tag->name ?> </li>
                            <?php } ?>
                        </ul>
                        <p>Categorias:</p>
                        <ul>                            
                            <?php foreach ($product->categories as $category) {?>
                                <li> <?= $category->name ?> </li>
                            <?php } ?>
                        </ul>
                        <p>Features:</p>
                            <?= $product->features ?>
                        
                    </div>
                </div>
                <!--<div class="row">
                    <div class="col-md-4 col-sm-10 py-4">
                        <div class="card mb-1">
                            <img src="<?= $product->cover ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= $product->name ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"></h6>
                                <p class="card-text"><?= $product->description ?></p>
                                <!-<div class="row">
                                    <a class="btn btn-warning col-6" data-bs-toggle="modal"
                                        data-bs-target="#createProductModal">Editar</a>
                                    <a onclick="remove()" class="btn btn-danger col-6">Eliminar</a>
                                </div>
                                ->
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php for ($i=0; $i < 6; $i++): ?>
                    <div>
                        <label for="">Correo electronico</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control" placeholder="user@fakemail.com"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <?php endfor?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <?php include '../layouts/scripts.php' ?>
    
    <script type="text/javascript">
    function remove(target) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    }
    </script>
</body>

</html>