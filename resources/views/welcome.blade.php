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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('home')}}">Home</a></li>
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
        <!-- Header-->


        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Unleashing Power and Performance</h1>
                    <p class="lead fw-normal text-white-50 mb-0">A Comprehensive Guide to High-Performance Cars</p>
                </div>
            </div>
        </header>

    <!-- top 3 cars -->

    <section class="py-5">
          
          <div class="container px-4">
          <h3 class="mb-5">Top 3 Most Sold Cars</h3>
              <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                  

             
              
              @foreach($topCars as $topCar)

              <div style="width:350px;" class="col mb-5">
                      <div class="card h-100">
                          <!-- Product image-->
                          <img height="180" src="{{ asset('storage/carscontainer/' . $topCar->image) }}" alt="Image">
                          <!-- Product details-->
                          <div class="card-body p-4">
                              <div class="text-center">
                                  <!-- Product name-->
                                  <h5 class="fw-bolder">{{$topCar->model_name}}</h5>
                                  <!-- Prod   uct price-->
                                  <span>${{$topCar->price}}</span>
                                      
                              </div>
                          </div>
                          <!-- Product actions-->
                          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                              <div class="text-center">
                                  <a  class="btn btn-outline-dark mt-auto" href="{{ route('cardetial',['id' => $topCar->inventory_id]) }}">View options</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  
              @endforeach


              </div>
          </div>
      </section>













        <!-- Section-->
        <section class="py-5">
          
       
               
            <div class="container px-4">
            <h3 class="mb-5">Available Cars</h3>


           
            <form class="d-flex align-items-center gap-3 mb-5" method="GET" action="{{ route('home') }}"  id="filterForm">

                    <select class="form-select w-25" name="brand">
                        <option value="">Select Brand</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Ford">Ford</option>
                        <option value="Tesla">Tesla</option>
                        <option value="BMW">BMW</option>
                       
                    </select>

                    <select class="form-select w-25" name="color">
                        <option value="">Select Color</option>
                        <option value="white">White</option>
                        <option value="black">Black</option>
                        <option value="red">Red</option>
                      
                    </select>
                    <button class="btn btn-success " type="submit">Filter</button>
                </form>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    


                
                @foreach($cars as $car)

                <div  class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img height="180" src="{{ asset('storage/carscontainer/' . $car->image) }}" alt="Image">
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
            <div class="w-full d-flex justify-content-center align-items-center mt-5 flex-column gap-2">
                <span class="text-white">For Dealers and Admin only</span>
                <a class="btn btn-primary" href="{{route('loginpage')}}">login</a>
            </div>
            
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
