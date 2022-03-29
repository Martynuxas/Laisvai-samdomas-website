<!DOCTYPE html>
<html lang="en">
    <head>
    @include('layouts.head')
    </head>
    <body>
    @include('layouts.header')
    <body class="hm-gradient">
    <main>
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Pranešimai</h2>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pavadinimas</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pranesimai as $pranesimas)
                                <tr>
                                    <th scope="row">{{$pranesimas->id}}</th>
                                    <td>{{$pranesimas->tekstas}}</td>
                                    <td>{{$pranesimas->data}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                                    {{$pranesimai->links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
        @include('layouts.footer')
    </body>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/main.js"></script>
</html>