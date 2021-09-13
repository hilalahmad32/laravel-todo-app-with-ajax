<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Todo APP</title>
</head>
<body style="background-color: rgb(206, 206, 228)" >

    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-6 col-md-8 col-sm-12 offset-xl-3 offset-md-2 offset-sm-0">
                <div class="card p-4">
                    <h1 class="text-center">Todo App</h1>
                    <h5 id="success" class="text-success text-center"></h5>
                    <h5 id="error" class="text-danger text-center"></h5>
                    <div class="card-body">
                        <form action="" class="d-flex " id="form-data">
                          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input type="text" name="todo" id="todo" class="form-control form-control-lg mx-4">
                            <button type="submit" id="add-todos" class="btn btn-primary">Add</button>
                        </form>
                        
                        <div id="list"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/action.js') }}"></script>
</body>
</html>