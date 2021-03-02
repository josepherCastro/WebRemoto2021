<div class="table-responsive" style="overflow-x:visible; overflow-y: visible;">
    <table class="table table-striped" id="tabela">
        <thead>
            <tr style="text-align: center">
                @foreach ($header as $item)
                    <th>{{$item}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr style="text-align: center">
                    <td style="display:none;">{{ $item['id']}}</td>
                    <td>{{ $item['nome'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>