@extends('layouts.master-admin')

@section('content')
<body class="bg-dark">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form class="form-signin" id="login-form" action="/auth/login" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input class="form-control" id="exampleInputEmail1" type="email" name="email"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password"
                            name="password">
                    </div>
                    <button class="btn btn-primary btn-block" href="index.html" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection
