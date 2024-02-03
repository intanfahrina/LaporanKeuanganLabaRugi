@extends('layouts.loginregister.app')
@section('content')
    <div class="container"><br>
        <br />
        <center><img src="{{ URL::asset('images/logot.png'); }}" width="150" height="150" alt="" /></center>
        <h1 class="text-center"><b>&nbsp; Laporan Keuangan Laba Rugi</b></h1>
                <br/>
             <br/>
             <h3 align="center"><b>Selamat Datang</b></h3>
        <div class="col-md-4 col-md-offset-4">
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group mb-3">
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember"> Remember Me</label>
                    </div>
                </div>
                <button style="background-color: #ff6347; color: white;" type="submit" class="btn btn-block">Log In</button>
                <hr>
            </form>
        </div>
    </div>
@endsection