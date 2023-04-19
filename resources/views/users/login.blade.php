@extends('components.layout')
@section('title', 'doctors')
@section('content')
           
           <div class="registration-form">
                <h4 class=" text-center text-2xl uppercase mb-1 p-2">
                    Log into Florin-Daniel Marin 's RESTful Hospital API
                </h4>
                <form method="POST" action="/users/authenticate" >
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control item" type="email" name="email" id="email" />

                        @error('email')
                            <p  class="text-danger font-weight-light" ><small> {{$message}}</small></p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input class="form-control item" type="password" name="password" id="pass" />

                        @error('password')
                            <p  class="text-danger font-weight-light" ><small> {{$message}}</small></p>
                        @enderror
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="btn btn-block create-account" value="Log in" />
                    </div>
                </form>
            </div>


    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    @endsection