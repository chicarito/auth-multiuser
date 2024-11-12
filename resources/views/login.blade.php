<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-4 col-12 mt-5">
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="text-center mb-4">Login</h4>
                    <form action="/login" method="post">
                        @csrf
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required
                            autocomplete="off">
                        <label for="Password">Password</label>
                        <input type="password" name="password" id="Password" class="form-control" required>
                        <button type="submit" class="btn btn-dark mt-3">login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
