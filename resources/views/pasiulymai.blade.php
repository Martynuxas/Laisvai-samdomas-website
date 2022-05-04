<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    @include('layouts.header')
    <body class="hm-gradient">
            <main>
                <div class="container mt-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Konkurso pasiūlymai</h2>
                                </div>
                            </div>
                                    @if (count($gautiPasiulymai) > 0)
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Vartotojas</th>
                                                    <th>Suma</th>
                                                    <th>Už dienų galėtų pradėti</th>
                                                    <th>Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($gautiPasiulymai as $pasiulymas)
                                                    <tr>
                                                        <th scope="row">{{$pasiulymas->id}}</th>
                                                        <td><b><div onclick="location.href='/profilis/{{$pasiulymas->vartotojo_id}}';" style="cursor: pointer;">[{{$pasiulymas->vartotojo_id}}]{{$pasiulymas->vartotojas->name}}</b></div></td>
                                                        <td>{{$pasiulymas->suma}}</td>
                                                        <td>{{$pasiulymas->dienuSkaicius}}</td>
                                                        <td>{{$pasiulymas->data}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    {{$gautiPasiulymai->links()}}
                                    @else
                                    Konkurse pasiūlymų dar nėra
                                    @endif
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        @include('layouts.footer')
    </body>
</html>