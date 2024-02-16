<!DOCTYPE html>
<html lang="en">
<link>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

    <main class="homeContainer">

        <form action="{{route('login.action')}}" method="POST">
            @csrf
            
            @if($errors->any())
                    <div class="alert alert-danger">

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                    </div>
                @endif
            <div>
               <h2> Login Form</h2>
            </div>

            <div>
                <label for="email">Email</label>
                <input required id="email" name="email" type="text" placeholder="Enter Email">
            </div>

            <div>
                <label for="password">Password</label>
                <input required id="password" name="password" type="password" placeholder="Enter Password">
            </div>
            <button type="submit">LOGIN</button>
        </form>
        
    </main>
    
</body>
</html>