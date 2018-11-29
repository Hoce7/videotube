<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="FormaStream">
    <meta name="author" content="Lorcann">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <title>Accueil - FormaStream</title>
    <link href="{{ asset('css/style.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/flatly/bootstrap.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">

      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand point" id="menu-toggle"><i id="menu-toggle" class="fa fa-bars" aria-hidden="true"></i></a>
            <a class="navbar-brand" href="/"> Forma<strong>$</strong>tream                            </a>
        </div>
        <div class="container-fluid">
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li ><a href="/"class="btn btn-link">Accueil</a></li>
                    @if (Auth::guest())
                    @else
                    <li ><a class="btn btn-link" href="/channel"><i class="fa fa-fire" aria-hidden="true"></i>  Ma chaine</a>
                    </li>
                    @endif
                </ul>
                <ul class="navbar-form navbar-right" style="display: inline-flex;">
                    <a href="/upload" class="btn btn-link">Ajouter une vidéo</a>
                    @if (Auth::guest())
                    <li><a class="btn btn-link" href="{{ url('/login') }}">Connexion</a></li>
                    <li><a class="btn btn-link" href="{{ url('/register') }}">Inscription</a></li>
                    @else

                    <div class="dropdown">
                      <button class="btn-link" style="padding: 10px;">{{ Auth::user()->name }} <span class="caret"></span></button>
                      <div class="dropdown-content">
                        <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </ul>
    </li>

    @endif
</ul>
</div>
</div>
<div id="wrapper">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <h5 class="text-left text-danger" style="padding-left: 5%;">
                CATEGORIES
            </h5>

            @foreach ($categories as $cat)
            <li>
                <a href="/videos/{{ strtolower($cat->id) }}"><img src="https://cdn0.iconfinder.com/data/icons/graph-4/100/pie_chart2-512.png" class="avatar-xs">  {{ $cat->name }}</a>
            </li>
            @endforeach

            <hr/>
            <p class="col-lg-12">
                Forma<strong>$</strong>tream le meilleur catalogue de vidéos de formation.
                <br/>
                <br/>
            </p>
        </ul>
    </div>
</div>
</nav>
@yield('content')
</div>
<script>
    $(function() {    
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    });
</script>
<!-- Scripts -->
<script src="/js/app.js"></script>

</body>
</html>
