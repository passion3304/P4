<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'TaskMaster' --}}
        @yield('title','TaskMaster')
    </title>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/spacelab/bootstrap.min.css" rel="stylesheet" integrity="sha256-j7Dtnd7ZjexEiPNbscbopFn9+Cs0b3TLipKsWAPHZIM= sha512-RFhfi6P8zWMAJrEGU+CPjuxPh3r/UUBGqQ+/o6WKPIVZmQqeOipGotH2ihRULuQ8wsMBoK15TSZqc/7VYWyuIw==" crossorigin="anonymous">

    <link href='/css/styles.css' rel='stylesheet'>
    <link rel="shortcut icon" type="image/png" href="/images/tasks.png">

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    @if(\Session::has('flash_message'))
        <div class="alert {{ Session::get('flash_type') }}">
            {{ Session::get('flash_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <div class="container">

        <nav>
            <ul class="nav nav-pills">
                @if(Auth::check())
                    <li class="{{ Request::is('/') ? 'active' :'' }}" role="presentation"><a href='/'>Home</a></li>
                    <li class="{{ Request::is('tasks/create') ? 'active' :'' }}" role="presentation"><a href='/tasks/create'>Add a new task</a></li>
                    <li class="{{ Request::is('logout') ? 'active' :'' }}" role="presentation"><a href='/logout'>Log out </a></li>
                @else
                    <li class="{{ Request::is('/') ? 'active' :'' }}" role="presentation"><a href='/'>Home</a></li>
                    <li class="{{ Request::is('login') ? 'active' :'' }}" role="presentation"><a href='/login'>Log in</a></li>
                    <li class="{{ Request::is('register') ? 'active' :'' }}" role="presentation"><a href='/register'>Register</a></li>
                @endif
            </ul>
        </nav>
        <header>
            <a href='/'>
            <img src='/images/MainLogo.PNG' alt='TaskMaster Logo' class="MainLogo">
            </a>
        </header>
    </div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    {{-- Main page content will be yielded here --}}
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <footer>
        &copy; {{ date('Y') }} &nbsp;&nbsp;
        <a href='https://github.com/BrendanJohn/p4' class='fa fa-github' target='_blank'> View on Github</a> &nbsp;&nbsp;
        <a href='http://p4.brendanmurph.com/' class='fa fa-link' target='_blank'> View Live</a>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>