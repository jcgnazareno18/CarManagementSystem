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
                        <li class="nav-item"><a class="nav-link" href="{{route('cars')}}">Cars</a></li>

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


        

        <section class="py-5">
          
          <div class="container px-4">
          <h3 class="mb-5">Register Dealers</h3>

          <form action="{{route('register.save')}}" method="POST">

            @csrf
                <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <input required name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                        
                </div>

                <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Email</label>
                        <input required name="email" type="email" class="form-control" id="exampleInputEmail">
                </div>

                <div class="mb-3">
                        <label for="exampleInputPassword" class="form-label">Password</label>
                        <input required name="password" type="password" class="form-control" id="exampleInputPassword">
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
