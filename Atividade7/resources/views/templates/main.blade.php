<html>
    <head>
        <title>SISAR - @yield('titulo')</title>
        <meta charset="UTF-8">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body {
                padding: 60px;
                padding-top: 20px;
                padding-bottom: 20px;
            }
            footer {
                padding: 50px;
                padding-top: 30px;
            }
            .navbar { margin-bottom: 30px; }
            .nav-link { color: white; }

            .loading {
                position: fixed;
                z-index: 999;
                overflow: show;
                margin: auto;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                width: 50px;
                height: 50px;
            }
        </style>
    </head>
    <body role="document">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
       
        <div class="mx-auto order-0">
            <a class="navbar-brand" href="{{ url('/') }}"><b>SISAR</b></a>
        </div>

        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" style="color: #fff" href="{{ route('login') }}"><b>| {{ __('Login') }} |</b></a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" style="color: #fff" href="{{ route('register') }}"><b>| {{ __('Register') }} |</b></a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: #fff" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <b>{{ Auth::user()->name }}</b><span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item">
                            <u>E-mail</u>: {{ Auth::user()->email }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <b>Sair</b>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
        <nav class="navbar navbar-expand-sm navbar-dark bg-success">
            <a href="{{url('/')}}" class="navbar-brand"><b>Sistema de Avaliação Remota</b></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="align-items: right;">
                
               
                <ul class="navbar-nav">
                    <li @if($tag=="CUR") class="nav-item active" @else class="nav-item " @endif>
                        <a class="nav-link" href="{{ route('curso.index') }}">    
                            <b>Curso</b>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li @if($tag=="DISC") class="nav-item active" @else class="nav-item " @endif>
                        <a class="nav-link" href="{{ route('disciplina.index') }}">    
                            <b>Disciplina</b>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li @if($tag=="PROF") class="nav-item active" @else class="nav-item " @endif>
                        <a class="nav-link" href="{{ route('professor.index') }}">    
                            <b>Professor</b>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li @if($tag=="ALU") class="nav-item active" @else class="nav-item " @endif>
                        <a class="nav-link" href="{{ route('aluno.index') }}">    
                            <b>Aluno</b>
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