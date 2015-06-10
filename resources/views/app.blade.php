<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recipe</title>
    <!-- Style sheets -->
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href='{{ asset('css/bootstrap.css') }}' rel='stylesheet' type='text/css'>
    <link href='{{ asset('css/bootstrap-theme.css') }}' rel='stylesheet' type='text/css'>

	<!-- Fonts -->
	<link href='{{ asset('css/font-awesome.css') }}' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!-- Scripts -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <!-- title icon -->
    <title>Laravel CMS</title>

</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Laravel CMS</a>
            </div>
            <div class="collapse navbar-collapse" id="main">
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6">
                @yield('content')
                @yield('script')
            </div>
            <div class="col-sm-3">

            </div>
        </div>

    </div>
    <footer>
        <div class="container">
            <div class="row">
                <p class="text-center">All &copy; copyrights reserved</p>
            </div>
        </div>
    </footer>
</body>
</html>
