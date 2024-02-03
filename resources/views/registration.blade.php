@extends('layouts.loginregister.app')
@section('content')
<br/>
<br/>
<main class="signup-form">
    <div class="container">
        <h1 class="text-center"><img src="{{ URL::asset('images/logo.png'); }}" width="70" height="70" alt="" /><b> &nbsp; Surat dan Laporan Keuangan</b></h1>
        <br/>
        <h3 align="center"><b>Register</b></h3>
        <div class="col-md-4 col-md-offset-4">
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
                    <div class="card-body">

                        <form action="{{ route('register.custom') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Nama</label>
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                    required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="d-grid mx-auto">
                                <button style="background-color: #ff6347; color: white;" type="submit" class="btn btn-block">Sign up</button>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
    </div>
</main>
@endsection