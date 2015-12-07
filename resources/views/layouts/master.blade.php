<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Footasks' --}}
        @yield('title','Footasks')
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
        <div class='flash_message'>
            {{ \Session::get('flash_message') }}
        </div>
    @endif

    <header>
        <a href='/'>
        <img src='/images/MainLogo.PNG' alt='TaskMaster Logo' class="MainLogo">
        </a>
    </header>

    <nav>
        <ul>
            @if(Auth::check())
                <li><a href='/'>Home</a></li>
                <li><a href='/tasks/create'>Add a task</a></li>
                <li><a href='/logout'>Log out </a></li>
            @else
                <li><a href='/'>Home</a></li>
                <li><a href='/tasks/all'>See All Tasks</a></li>
                <li><a href='/tasks/create'>Add Task</a></li>
            @endif
        </ul>
    </nav>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
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