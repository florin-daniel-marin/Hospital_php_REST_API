<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Hospital API</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="//unpkg.com/alpinejs" defer></script>

        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/bootstrap-icons.css" rel="stylesheet">
        <link href="/css/owl.carousel.min.css" rel="stylesheet">
        <link href="/css/owl.theme.default.min.css" rel="stylesheet">
        <link href="/css/templatemo-medic-care.css" rel="stylesheet">
    </head>  
    <body id="top">
            <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
                <div class="container-fluid">
                    <a class="navbar-brand  d-lg-none"  href="/">
                        Hospital
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse"  id="navbarNav">
                        <ul class="navbar-nav ">          
                          @if (auth()->check())
                            @if (auth()->user()->isGM())
                            {{-- GMs Dashboard --}}
                                <a class="navbar-brand d-none d-lg-block" href="/">
                                    Hospital
                                    <strong class="d-block">General Manager Dashboard</strong>
                                </a>
                                <li class="nav-item">
                                    <a class="nav-link" href="/doctors">Doctors</a>
                                    {{-- Button --}}
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/assistants">Assistants</a>
                                </li>
      
                                <li class="nav-item">
                                    <a class="nav-link" href="/patients">Patients</a>
                                </li>
      
                                <li class="nav-item">
                                  <a class="nav-link" href="/treatments">Treatments</a>
                                </li> </ul>
                                    <div class="navbar-nav ms-auto ">
                                        <a href="/logout" class="nav-item nav-link">Logout</a>
                                    </div>
                            </div>
                            </div>
                            </nav>
                                <main>
                                    <x-flash-message />
                                    @yield('content')
                                </main>

                            @elseif (auth()->user()->isDoctor())
                            {{-- Doctors Dashboard --}}
                                <a class="navbar-brand d-none d-lg-block" href="/">
                                    Hospital
                                    <strong class="d-block">Doctor Dashboard</strong>
                                </a>
                                <li class="nav-item">
                                    <a class="nav-link" href="/assistants">Assistants</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/patients">Patients</a>
                                </li>
      
                                <li class="nav-item">
                                  <a class="nav-link" href="/treatments">Treatments</a>
                                </li> </ul>

                                <div class="navbar-nav ms-auto ">
                                    <a href="/logout" class="nav-item nav-link">Logout</a>
                                </div>
                            </div>
                            </div>
                            </nav>
                                <main>
                                    <x-flash-message />
                                    @yield('content')
                                </main>


                            @else (auth()->user()->isAssistant())
                            {{-- Assitants Dashboard --}}
                                <a class="navbar-brand d-none d-lg-block" href="/">
                                    Hospital
                                    <strong class="d-block">Assistant Dashboard</strong>
                                </a>
                                <li class="nav-item">
                                  <a class="nav-link" href="{{url('treatments')}}">Treatments</a>
                                </li> </ul>
                                <div class="navbar-nav ms-auto ">
                                    <a href="/logout" class="nav-item nav-link">Logout</a>
                                </div>
                            </div>
                            </div>
                            </nav>
                            <main>
                                <x-flash-message />
                                @yield('content')
                            </main>
                            @endif

                         @else
                            {{-- Login Dashboard --}}  
                                <a class="navbar-brand d-none d-lg-block" href="/">
                                    Hospital
                                    <strong class="d-block">Log-in</strong>
                                </a>
                                </ul>
                                <div class="navbar-nav ms-auto ">
                                    <a href="/login" class="nav-item nav-link">Login</a>
                                </div>
                            </div>
                            </div>
                            </nav>
                            <main>
                                <x-flash-message />
                                @yield('content')
                            </main>
                        @endif 

            <footer class="site-footer section-padding" id="contact">
                <div class="container">
                        <div class="col-lg-3 col-12 ms-auto mt-4 mt-lg-0">
                            <p class="copyright-text">Copyright Medic Care 2021 
                            <br><br>Design: <a href="https://templatemo.com" target="_parent">TemplateMo</a></p>
                        </div>
                </section>

            </footer>

            <!-- JAVASCRIPT FILES -->
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/scrollspy.min.js"></script>
            <script src="js/custom.js"></script>
    <!--

    TemplateMo 566 Medic Care

    https://templatemo.com/tm-566-medic-care

    -->
        </body>
</html>
