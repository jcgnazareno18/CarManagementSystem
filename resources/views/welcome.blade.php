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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('dealersView')}}">Dealers</a></li>

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
                    <a class="btn btn-outline-dark" href="{{ route('purchasedCars') }}">
                            <i class="bi-cart-fill me-1"></i>
                            Purchased Cars
                            <span class="badge bg-dark text-white ms-1 rounded-pill">{{$purchaseLength}}</span>
                     </a>
                </div>
            </div>
        </nav>
        <!-- Header-->


        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Unleashing Power and Performance</h1>
                    <p class="lead fw-normal text-white-50 mb-0">A Comprehensive Guide to High-Performance Cars</p>
                </div>
            </div>
        </header>

        <div class="row align-items-center my-5 px-5 container-fluid">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="/assets/ford-png.png" alt="..." /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light">Ford Mustang GT500</h1>
                    <p>The Mustang, an iconic American muscle car, has been synonymous with performance and style since its debut in 1964. Renowned for its sleek design and powerful engines, the Mustang continues to be a symbol of automotive passion and driving exhilaration.</p>
                    <a class="btn btn-primary" href="#!">Pre-Order</a>
                </div>
            </div>


            <div class="card text-white bg-secondary mt-3 rounded-0  py-4 text-center">
                <div class="card-body"><p class="text-white m-0">Quantum Drive Motors is currently hosting a compelling sale, presenting a prime opportunity for customers to explore their range of vehicles at discounted prices. With a reputation for cutting-edge technology and innovative designs, this sale at Quantum Drive Motors allows enthusiasts to experience the brand's exceptional vehicles while taking advantage of special promotions and savings</p></div>
            </div>

        <!-- Section-->
        <section class="py-5">
          
            <div class="container px-4">
            <h3 class="mb-5">Available Cars</h3>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    

               
                
                @foreach($cars as $car)

                <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top border" src="/assets/mustang.png" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$car->model_name}}</h5>
                                    <!-- Prod   uct price-->
                                    <span>${{$car->price}}</span>
                                        
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a  class="btn btn-outline-dark mt-auto" href="{{ route('cardetial',['id' => $car->inventory_id]) }}">View options</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endforeach


                </div>
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
