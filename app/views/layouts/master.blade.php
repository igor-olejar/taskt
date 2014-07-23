<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Taskt">
        <meta name="author" content="Igor Olejar">
        <title>{{{ $title }}}</title>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        
        <!-- Date Picker -->
        {{ HTML::style('css/datepicker.css') }}
        
        <!-- Custom styles -->
        {{ HTML::style('css/custom.css') }}
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
        <div class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">Taskt.</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li @if ($title == 'Home') class="active" @endif><a href="/">Home</a></li>
                        <li @if ($title == 'About') class="active" @endif><a href="about">About</a></li>
                        @if (Auth::check())
                            <li><a href="logout">Log out</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
        @yield('content')
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- Datepicker -->
        {{ HTML::script('js/bootstrap-datepicker.js') }}
        {{ HTML::script('js/custom.js') }}
        
        <script type="text/javascript">
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy'
            });
        </script>
    </body>
</html>