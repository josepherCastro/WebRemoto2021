<html>
    <head>
        <title>SISAR - @yield('titulo')</title>
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