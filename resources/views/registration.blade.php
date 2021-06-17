@extends('layouts.front')
@section('title','welcome')

@section('css')
<link rel="stylesheet" href="./logincss/login.css">
@endsection

@section('content')
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        {{-- <div class="fadeIn first">
            <img src="https://www.nicepng.com/png/detail/128-1280406_view-user-icon-png-user-circle-icon-png.png" height="50%" width="50%" style="border-radius: 50%;" id="icon" alt="User Icon" />
        </div> --}}

        <!-- Login Form -->
        <form action="{{url('/registration')}}" method="POST">
            @csrf
            <input type="email" id="login" name="email" class="fadeIn second" placeholder="email">
            <input type="text" id="login" name="name" class="fadeIn second" placeholder="name">
            <input type="password" id="password" name="password" class="fadeIn third" placeholder="password">
            <input type="text" id="login" name="role"  placeholder="role">
            <input type="submit" class="fadeIn fourth" value="Register">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>
@endsection