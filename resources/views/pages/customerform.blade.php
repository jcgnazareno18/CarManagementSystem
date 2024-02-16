<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quantum Driver Motors</title>
        <!-- Favicon-->
       <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">QD Motors</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
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
                    
                </div>
            </div>
        </nav>

        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
            <div class="mb-5">
                <h2>Hello Dear Customer</h2>
                <p>Fill up the form to continue purchase</p>
            </div>


                <form action="{{route('customerpurchase')}}" method="POST">
                    @csrf   

                    <input type="hidden" name="car_id" value="{{$carId}}">

               
                    <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Name</label>
                            <input required name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp">  
                    </div>

                    <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input required name="address" type="text" class="form-control" id="address">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Gender</label>
                        <select name="gender" class="form-select" aria-label="Default select example">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female" >Female</option>
                            
                        </select>
                    </div>

                    <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input required name="phone" type="text" class="form-control" id="phone">
                    </div>

                    <div class="mb-3">
                            <label for="annnual_income" class="form-label">Annual Income in US Dollar</label>
                            <input required name="annual_income" type="number" class="form-control" id="annnual_income">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-danger" href="{{route('home')}}">Cancel</a>
                    </div>
                </form>

                
            </div>
        </section>



       
       <!-- Bootstrap core JS-->
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>

    </body>
</html>
