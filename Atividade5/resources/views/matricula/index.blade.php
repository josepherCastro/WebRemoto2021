@extends('templates.main', ['titulo'=> "Matricula",'tag' => "MAT"])

@section('titulo') Matricula @endsection

@section('conteudo')
<div class="row">
    <div class="col-sm-12">
        <button class="btn btn-primary btn-block" onClick="criar()">
           <b>Matricular novo aluno</b>
        </button>     
    </div>
</div>
        
<x-tablelistMatricula :header="['Curso', 'aluno']" :data="$matricula"/>

<div class="modal fade" tabindex="-1" role="dialog" id="modalMatricula"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="formMatricula">
                <div class="modal-header">
                    <h5 class="modal-title"><b>Novo Matricula</b></h5>
                </div>

                <div class="modal-body">

                    <input type="hidden" class="form-control" id="id">
                    <div class="row" style="margin-top:10px">
                        <div class="col-sm-12">
                            <label><b>Aluno</b></label>
                            <select class="form-control" name="aluno" id="aluno" required>
                                @foreach ( $aluno as $item)
                                    <option value="{{ $item->id }}"><p> {{ $item->nome}} </p></option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalInfo"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Informações da Matricula</b></h5>
            </div>

            <div class="modal-body">

            </div>

            <div class="modal-footer">       
                <button type="cancel" class="btn btn-success" data-dismiss="modal"><b>OK</b></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalRemove"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <input type="hidden" id="id_remove" class="form-control">
            <div class="modal-header">
                <h5 class="modal-title"><b>Remover Disciplina</b></h5>
            </div>

            <div class="modal-body">

            </div>

            <div class="modal-footer">    
                <button class="btn btn-danger" onClick="remove()"><b>Remover</b></button>
                <button type="cancel" class="btn btn-secondary" data-dismiss="modal"><b>Cancelar</b></button>

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : "{{csrf_token()}}"
            }
        });

        function criar(){
            $('#modalAluno').modal().find('.modal-title').text("Selecionar aluno");
            $('#id').val('');
            $('#aluno').removeAttr('selected');
            $('#modalAluno').modal('show');
        }

        function editar(id){
            $('#modalAluno').modal().find('.modal-title').text("Alterar Aluno");

            $.getJSON('/api/matricula/'+ id, function(data){
               
                $('#id').val(data.id);
                $('#aluno').val(data.aluno_id);

                $('#modalDisciplina').modal('show');    
                
            });        
        }

        function remover(id, nome){
            $('#modalRemove').modal().find('.modal-title').text("");
            $('#modalRemove').modal().find('.modal-title').append("Deseja Remover o Disciplina '"+ nome +"'?");
            $('#id_remove').val(id);
            $('#modalRemove').modal('show');

        }

        function visualizar(id){
            $('#modalInfo').modal().find('.modal-body').html("");

            $.getJSON('/api/disciplina/'+ id, function(data){

                $('#modalInfo').modal().find('.modal-body').append("<b>ID:</b> " + data.id + "<br></br>");
                $('#modalInfo').modal().find('.modal-body').append("<b>NOME:</b> " + data.nome + "<br></br>");
                $("#modalInfo").modal().find('.modal-body').append("<b>CURSO:</b> " + data.curso.nome + "<br><br>");
                $("#modalInfo").modal().find('.modal-body').append("<b>PROFESSOR:</b> " + data.professor.nome + "<br><br>");

            });

        }

        $("#formDisciplina").submit( function(event){

            event.preventDefault();

            if($("#id").val() !=''){
                update( $("#id").val() );
            }
            else{
                insert();
            }

            $("#modalDisciplina").modal('hide');
        });

        function insert(){
            
            disciplina = {
                nome: $("#nome").val(),
                curso: $("#curso").val(),   
                professor: $("#professor").val()


            };

            $.post("/api/disciplina", disciplina , function(data){
                novoDisciplina = JSON.parse(data);
                linha = getLin(novoDisciplina);
                $("#tabela>tbody").append(linha)

            });
        }

        function update(id){
            disciplina = {
                nome : $("#nome").val(),
                curso: $("#curso").val(),
                professor: $("#professor").val()

            }

            $.ajax({
                type: "PUT",
                url : "/api/disciplina/" + id,
                context : this,
                data : disciplina,
                success : function(data) {
                    linhas = $("#tabela>tbody>tr");

                    e = linhas.filter(function(i,e){
                        return e.cells[0].textContent == id;
                    });

                    if(e){
                        e[0].cells[1].textContent = disciplina.nome.toUpperCase();
                    }
                },
                error : function(error){
                    alert('ERRO - UPDATE');
                }
            });
        }

        function remove(){
            var id = $("#id_remove").val();

            $.ajax({
                type: "DELETE",
                url : "/api/disciplina/" + id,
                context : this,
                success : function() {
                    linhas = $("#tabela>tbody>tr");

                    e = linhas.filter(function(i,e){
                        return e.cells[0].textContent == id;
                    });

                    if(e){
                        e.remove();
                    }
                },
                error : function(error){
                    alert('ERRO - DELETE');
                }
            });

            $('#modalRemove').modal('hide');

        }

        function getLin(disciplina){

                var linha = 
                "<tr style='text-align: center'>" +


                    "<td>" + disciplina.nome + "</td>" +
                    "<td>" + disciplina.curso.nome + "</td>" +
                    "<td>" + disciplina.professor.nome + "</td>" +

                    "<td>" +   
                        "<a class='btn' nohref style='cursor:pointer' onCLick='visualizar("+ disciplina.id +")'><i class='fa fa-question'></i></a>" +
                        "<a class='btn' nohref style='cursor:pointer' onCLick='editar("+ disciplina.id +")'><i class='fa fa-pencil-square-o'></i></a>" + 
                        "<a class='btn' nohref style='cursor:pointer' onCLick='remover("+ disciplina.id +")'><i class='fa fa-trash-o'></i></a>" +
                    "</td>" +
                "</tr>";

                return linha;

            }
        

    </script>
        
@endsection