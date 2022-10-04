<?php 
    include '../app/ProductController.php';
    $product = new ProductController;
    $products = $product->index();
    include '../app/BrandController.php';
    $brand = new BrandController;
    $brands = $brand->brands();
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
                            <button onclick="addProduct()" type="button" class="btn btn-info float-end" data-bs-toggle="modal"
                                data-bs-target="#createProductModal">
                                Anadir producto
                            </button>
                        </div>
                    </div>
                </div>
                <!--CONTENT-->
                <div class="row">
                    <?php foreach ($products as $product) {?>
                    <div class="col-md-3 col-sm-10 py-4">
                        <div class="card mb-1">
                            <img src="<?php echo $product->cover ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $product->name ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo ($product->brand == null ? "Sin categoria" : $product->brand->name) ?></h6>
                                
                                <p class="card-text"><?php echo $product->description ?></p>
                                <div class="row">
                                    <a onclick="editProduct(this)" data-product='<?= json_encode($product); ?>' class="btn btn-warning col-6" data-bs-toggle="modal"
                                        data-bs-target="#createProductModal">Editar</a>
                                    <a onclick="remove(<?= $product->id ?>)" class="btn btn-danger col-6">Eliminar</a>
                                    <a href="detail.php?slug=<?= $product->slug ?>" class="btn btn-info col-12">Detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
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
                <form action="../app/ProductController.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        
                        <label for="">Nombre</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input id="name" type="text" name="name" class="form-control" placeholder="nombre"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        
                        
                        <label for="">Slug</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input id="slug" type="text" name="slug" class="form-control" placeholder="slug"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <label for="">Description</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input id="description" type="text" name="description" class="form-control" placeholder="descripcion del producto"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <label for="">Features</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input id="features" type="text" name="features" class="form-control" placeholder="features del producto"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        
                        <label for="">Brand id</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>

                            <select id="brand_id" name="brand_id" class="form-control">
                                <?php foreach ($brands as $brand) { ?>
                                    <option value="<?php echo $brand->id ?>"><?php echo $brand->name ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="file" name="imagen" class="form-control" placeholder="imagen del producto" accept="image/*"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <input id="oculto_input" type="hidden" name="action" value="create">
                        <input id="id" type="hidden" name="id" value"create">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php include '../layouts/scripts.php' ?>
    <script type="text/javascript">
    function remove(id) {
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
                var bodyFormData = new FormData();
                bodyFormData.append('id', id);
                bodyFormData.append('action', 'delete');

                axios.post('../app/ProductController.php', bodyFormData)
                .then(function (response){
                    console.log(response);
                })
                .catch(function (error){
                    console.log('error')
                })
            }
        })
    }
    function addProduct(){
        document.getElementById('oculto_input').value="create";
        
    }
    function editProduct(target){
        document.getElementById('oculto_input').value="edit";
        let product = JSON.parse(target.getAttribute('data-product'));
        console.log(product);
        document.getElementById("name").value = product.name;
        document.getElementById("slug").value = product.slug
        document.getElementById("description").value = product.description
        document.getElementById("features").value = product.features
        document.getElementById("brand_id").value = product.brand.id
        document.getElementById("id").value = product.id
    }
    </script>
</body>

</html>