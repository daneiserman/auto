@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Панель оператора</div>
                    <div class="panel-body">
                        <div id="map"></div>
                        <div id="requests">
                            <h4>Заявки</h4>
                            <hr>
                            <table>
                                <tr>
                                    <td>Номер заявки</td>
                                    <td>Имя пассажира</td>
                                </tr>
                            @foreach($requests as $request)
                                <tr>
                                    <td>{{ $request['id'] }}</td>
                                    <td>{{ $request['name'] }}</td>
                                    <td class="no-border"><a href="/chooseDriver/{{ $request['id'] }}">Выбрать водителя</a></td>
                                </tr>
                            @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    var requests = true;
    var drivers = true;
</script>
