<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Tools</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
    <header style="margin-top: 10px;">
        <div class="container" id="header">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <nav class="navbar navbar-default" role="navigation">
                        <a class="navbar-brand" href="{{ url('/') }}">Toolbox</a>
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ url('coupons/generate') }}">Coupons</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
	<div class="container">
		@yield('content')
	</div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>

