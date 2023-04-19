@extends('components.layout')
@section('title', 'doctors')
@section('content')
    <header class="text-center p-2">

        <h2 class="text-2xl font-bold uppercase mb-1">
            Create account for hospital employees
        </h2>
        <p class="mb-4">After completion inform the employee the username and password</p>
    </header>

        <div class="container">
            <div class="registration-form">
                <form method="POST" action="/users" >
                    @csrf

                    <p class="form-title">Account type:</p>
                    <div class="form-check mw-100">
                        <input type="radio" name="employee_type" value="Assistant" id="Assistant" />
                        <label for="newbie">Assistant</label>

                        <input type="radio" name="employee_type" value="Doctor" id="Doctor" />
                        <label for="average">Doctor</label>

                        <input type="radio" name="employee_type" value="General Manager" id="General Manager" />
                        <label for="master">General Manager</label>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input class="form-control item" type="text" name="name" id="name" />

                        @error('name')
                            <p  class="text-danger font-weight-light" ><small> {{$message}}</small></p>
                        @enderror
                    </div>

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

                    <div class="form-group">
                        <label for="pass">Confirm Password</label>
                        <input class="form-control item" type="password" name="password_confirmation" id="pass" />

                        @error('password_confirmation')
                            <p  class="text-danger font-weight-light" ><small> {{$message}}</small></p>
                        @enderror
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="btn btn-block create-account" value="Create account" />
                    </div>
                    <a href="/" class="text-black ml-4 "> Back </a>


                </form>
            </div>
        </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>

@endsection