<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="row bg-info text-center text-dark m-1 p-3">
        <h1>Product CRUD Panel</h1>
    </div>
    <div class="container-fluid bg-3 text-center"> 
        <div class="row bg-info text-dark m-1 p-3">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
                <form action="{{ route('products.index') }}" method="POST">
                    @csrf @method('GET') 
                    <strong>Search by product_id or description, name, price : </strong> 
                    <input type="text" name="search" class="form-control-lg" >
                    <button class="btn btn-info" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg> SEARCH
                    </button>
                </form>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2">
                <div class="d-inline p-2 bg-primary rounded-3">
                    <strong><a href="{{ route('products.create') }}" class="text-white text-decoration-none m-2 p-2">Add A New Product</a></strong>
                </div>
            </div>
        </div>
        <div class="row bg-info text-dark m-1 p-2">
            <div class="col-sm-2 text-uppercase"><strong>Product ID</strong></div>
            <div class="col-sm-2 text-uppercase">
                <strong>Name</strong>
                <a href="{{ route('products.index',['sort'=>'namea']) }}" class="btn btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                </a>
                <a href="{{ route('products.index',['sort'=>'named']) }}" class="btn btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg>
                </a>
            </div>
            <div class="col-sm-2 text-uppercase"><strong>Description</strong></div>
            <div class="col-sm-1 text-uppercase">
                <strong>Price</strong>
                <a href="{{ route('products.index',['sort'=>'pricea']) }}" class="btn btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                </a>
                <a href="{{ route('products.index',['sort'=>'priced']) }}" class="btn btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg>
                </a>
            </div>
            <div class="col-sm-1 text-uppercase"><strong>Stock</strong></div>
            <div class="col-sm-2 text-uppercase"><strong>Image</strong></div>
            <div class="col-sm-1 text-uppercase"><strong>Edit Product</strong></div>
            <div class="col-sm-1 text-uppercase"><strong>Delete Product</strong></div>
        </div>
    @foreach ($products as $product)
        <div class="row bg-dark text-white m-1 p-2">
            <div class="col-sm-2">{{ $product->product_id }}</div>
            <div class="col-sm-2">{{ $product->name }}</div>
            <div class="col-sm-2">{{ $product->description }}</div>
            <div class="col-sm-1">{{ $product->price }}</div>
            <div class="col-sm-1">{{ $product->stock }}</div>
            <div class="col-sm-2">{{ $product->image }}</div>
            <div class="col-sm-1">
                <form action="{{ route('products.edit',$product) }}" method="POST">
                    @csrf @method('GET') 
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit">EDIT</button>
                </form>
            </div>
            <div class="col-sm-1">
                <form action="{{ route('products.destroy',$product) }}" method="POST">
                    
                    @csrf @method('DELETE') 
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit">DELETE</button>
                </form> 
            </div>
        </div>
    @endforeach
    <div class="row bg-info text-dark m-1 p-3">
       
        
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>