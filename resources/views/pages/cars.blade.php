<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quantum Driver Motors</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">QD Motors</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('dealers')}}">Dealers</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <a class="btn btn-outline-dark" href="{{ route('logout') }}">
                            Logout
                           
                     </a>
                
                </div>
            </div>
        </nav>
        <!-- Header-->



        <!-- Section-->
        <section class="py-5">
          
            <div class="container px-4 px-lg-5">
            <h3 class="mb-5">Manage Cars</h3>
    <form action="{{ route('storeCar') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail" class="form-label">Model</label>
        <select name="model_id" class="form-select" aria-label="Default select example">
            <option value="">Select Car Model</option>
            @foreach($models as $model)
            <option value="{{ $model->model_id }}">{{ $model->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input required name="price" type="number" class="form-control" id="price">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Car Image</label>
        <input name="image" class="form-control" type="file" id="formFile">
    </div>

    <div class="mb-5">
        <label for="exampleInputEmail" class="form-label">Dealer</label>
        <select name="dealer_id" class="form-select" aria-label="Default select example">
            <option selected>Select Dealer</option>
            @foreach($dealers as $dealer)
            <option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
</form>



            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; QD Motors 2024</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
