<?php 
                        include '../app/ProductController.php';
                        $product = new ProductController;
                        $products = $product->index();
                        //var_dump($products);
                    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layouts/head.php'; ?>
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
                    <?php for ($i=0; $i < 12; $i++): ?>
                    <div class="col-md-3 col-sm-10 py-4">
                        <div class="card mb-1">
                            <img src="<?php echo $products[$i]->cover ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $products[$i]->name ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $products[$i]->tags[0]->name ?></h6>
                                <p class="card-text"><?php echo $products[$i]->description ?></p>
                                <div class="row">
                                    <a class="btn btn-warning col-6" data-bs-toggle="modal"
                                        data-bs-target="#createProductModal">Editar</a>
                                    <a onclick="remove()" class="btn btn-danger col-6">Eliminar</a>
                                    <a href="detail.php" class="btn btn-info col-12">Detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endfor?>
                </div>
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