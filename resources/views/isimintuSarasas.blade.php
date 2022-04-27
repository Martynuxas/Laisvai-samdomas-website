<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    @include('layouts.header')
    <body class="hm-gradient">
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Įsimintų paslaugų/vartotojų sąrašai</h2>
                        </div>
                    <div class="container">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('tab1') ? 'active' : null}}" href= "{{ url('tab1') }}" role="tab">Paslaugos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('tab2') ? 'active' : null}}" href= "{{ url('tab2') }}" role="tab">Vartotojai</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane {{ request()->is('tab1') ? 'active' : null}}" id="{{ url('tab1') }}" role="tabpanel">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pavadinimas</th>
                                        <th>Data</th>
                                        <th>Veiksmas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($isimintosPaslaugos as $isimintaPaslauga)
                                        <tr>
                                            <th scope="row">{{$isimintaPaslauga->isimintosPaslaugosId}}</th>
                                            <td><div onclick="location.href='paslauga/{{$isimintaPaslauga->isimintosPaslaugosId}}';" style="cursor: pointer;"><b>{{$isimintaPaslauga->paslaugos->pavadinimas}}</b></div></td>
                                            <td>{{$isimintaPaslauga->data}}</td>
                                            <td>
                                                <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deleteIsimintaPaslauga/{{$isimintaPaslauga->id}}'>
                                                <span>Pašalinti</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                    {{$isimintosPaslaugos->links()}}
                            </div>
                            <div class="tab-pane {{ request()->is('tab2') ? 'active' : null}}" id="{{ url('tab2') }}" role="tabpanel">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Vardas</th>
                                            <th>Data</th>
                                            <th>Veiksmas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($isimintiVartotojai as $isimintasVartotojas)
                                            <tr>
                                                <th scope="row">{{$isimintasVartotojas->isimintoVartotojoId}}</th>
                                                <td><div onclick="location.href='profilis/{{$isimintasVartotojas->isimintoVartotojoId}}';" style="cursor: pointer;"><b>{{$isimintasVartotojas->users->name}}</b></div></td>
                                                <td>{{$isimintasVartotojas->data}}</td>
                                                <td>
                                                    <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori pašalinti tai?')" href='deleteIsimintaVartotoja/{{$isimintasVartotojas->id}}'>
                                                    <span>Pašalinti</span>
                                                </a>
                                            </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                    {{$isimintiVartotojai->links()}}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </body>
</html>