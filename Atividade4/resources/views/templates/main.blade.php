<html>
    <head>
        <title>SGM - @yield('titulo')</title>
        <meta charset="UTF-8">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body{ padding:40px;}
            .navbar{margin-bottom:30px;}
            .card{margin:20px;}
            .card-header{color: #000;}
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-success">
            <a href="#" class="navbar-brand"><b>VetClin System</b></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li @if($tag=="CLI") class="nav-item active" @else class="nav-item " @endif>
                        <a class="nav-link" href="{{ route('cliente.index') }}">    
                            <b>Cliente</b>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li @if($tag=="VET") class="nav-item active" @else class="nav-item " @endif>
                        <a class="nav-link" href="{{ route('veterinario.index') }}">    
                            <b>Veterinario</b>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li @if($tag=="ESP") class="nav-item active" @else class="nav-item " @endif>
                        <a class="nav-link" href="{{ route('especialidade.index') }}">    
                            <b>Especialidades</b>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="card">
            <div class="card-header bg-sucess">
                <h3><b>{{$titulo}}</b></h3>
            </div>
        </div>    
        <div class="card-body">
            @yield('conteudo')
        </div>
    </body>
    <footer>
        <b>&copy;2021 - Josepher Castro.</b>
    </footer>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>

    @yield('script')
</html>