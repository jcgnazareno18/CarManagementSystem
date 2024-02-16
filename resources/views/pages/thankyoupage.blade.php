<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
           <!-- Bootstrap icons-->
           <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
<body>

    <main style="height: 100vh;" class="d-flex justify-content-center align-items-center flex-column gap-3 h-full">
        <h1>Thank you Dear Customer</h1>
        <p>Your Reservation has been recorded, we will contact you for more information</p>


        <a class="btn btn-primary" href="{{route('home')}}">BacK Home</a>
    
    </main>
    
</body>
</html>