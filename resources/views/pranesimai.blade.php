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
                            <div class="input-group md-form form-sm form-2 pl-0">
                                <input class="form-control my-0 py-1 pl-3 purple-border" type="text" placeholder="Ieškokite pranešimų" aria-label="Search">
                                <span class="input-group-addon waves-effect purple lighten-2" id="basic-addon1"><a><i class="fa fa-search white-text" aria-hidden="true"></i></a></span>
                            </div>
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
                    <div class="d-flex justify-content-center">
                    <nav class="my-4 pt-2">
                            <ul class="pagination pagination-circle pg-blue mb-0">
                                <li class="page-item disabled clearfix d-none d-md-block"><a class="page-link">First</a></li>
                                <li class="page-item disabled">
                                    <a class="page-link" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                </li>
                                <li class="page-item active"><a class="page-link">1</a></li>
                                <li class="page-item"><a class="page-link">2</a></li>
                                <li class="page-item"><a class="page-link">3</a></li>
                                <li class="page-item"><a class="page-link">4</a></li>
                                <li class="page-item"><a class="page-link">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                </li>
                                <li class="page-item clearfix d-none d-md-block"><a class="page-link">Last</a></li>
                            </ul>
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