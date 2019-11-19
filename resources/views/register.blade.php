<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>ATG TASK 1</title>
    <style>
        body{
            background: #efefef
        }
        .login-cont{
            background: #ffffff !important;
            margin-top: 40px;
            padding: 40px
        }
        .form-group input {
            border-radius:0
        }
        .btn{
            border-radius:0 
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="login-cont">
                    @if(count($errors))
                    <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            @if($flash = session('message'))
                            <div class="alert alert-success">
                                    {{$flash}}
                                </div>
                            @endif
                    <form method="POST" action="/register" accept-charset="utf-8">
                        @csrf
                        {{-- @method('POST') --}}

                            <div class="form-group">
                                    <label class="float-left" for="Admin Name">Full Name</label>
                                    <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label class="float-left" for="Admin Name">Email</label>
                                    <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label class="float-left" for="Admin Name">Pincode</label>
                                    <input type="password" name="pincode" class="form-control">
                            </div>
                            <div>
                                <button class="btn btn-success">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>