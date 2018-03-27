@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Выбор водителя</div>
                    <div class="panel-body">
                        <div id="map"></div>
                        <div id="requests">
                            <h4>Водители</h4>
                            <hr>
                            <form name="drivers" action="{{ url()->current() }}" method="post">
                                <table>
                                    <tr>
                                        <td>Номер водителя</td>
                                        <td>Имя водителя</td>
                                    </tr>
                                    @foreach($drivers as $driver)
                                        <tr>
                                            <td>{{ $driver['id'] }}</td>
                                            <td>{{ $driver['name'] }}</td>
                                            <td class="no-border">
                                                <input type="radio" name="id" value="{{ $driver['id'] }}" onclick="enable()">
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" id="submit" value="Выбрать водителя" disabled="true">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    var client = {
        lat : {{ $client['client_lat'] }},
        lng : {{ $client['client_lng'] }}
    }

    var drivers = true;

    function enable() {
        console.log('ad');
        document.getElementById('submit').removeAttribute('disabled');
    }
</script>