<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add A New Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-3 w-50 p-3"> 
        <div class="row bg-info text-center text-dark m-1 p-3">
            <h1>Add New Product</h1>
        </div>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf @method('POST') 
            <div class="row bg-dark text-white m-1 p-3">
                <div class="col-sm-4"><strong>Product ID</strong></div><div class="col-sm-8 mb-2"><input type="text" name="product_id" class="form-control form-control-lg" ></div>
                <div class="col-sm-4"><strong>Product Name</strong></div><div class="col-sm-8 mb-2"><input type="text" name="name" class="form-control form-control-lg" ></div>
                <div class="col-sm-4"><strong>Product Description</strong></div><div class="col-sm-8 mb-2"><textarea name="description" id="" cols="30" rows="3" class="form-control form-control-lg"></textarea></div>
                <div class="col-sm-4"><strong>Product Price</strong></div><div class="col-sm-8 mb-2"><input type="text" inputmode="decimal" name="price" class="form-control form-control-lg" ></div>
                <div class="col-sm-4"><strong>Stock</strong></div><div class="col-sm-8 mb-2"><input type="number" name="stock" class="form-control form-control-lg" ></div>
                <div class="col-sm-4"><strong>Product Image</strong></div><div class="col-sm-8 mb-2"><input type="file" name="image" class="form-control form-control-lg" ></div>
                <div class="col-sm-4"></div><div class="col-sm-8 mb-2"><button type="submit" class="form-control form-control-lg btn btn-info">ADD</button></div>
                <div class="col-sm-12">
                    <h3><a href="{{ route('products.index') }}" class="text-info text-decoration-none">< Go Back</a></h3>
                </div>
            </div>
        </form> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>