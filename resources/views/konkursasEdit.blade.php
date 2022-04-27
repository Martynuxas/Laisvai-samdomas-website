<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/kurti.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    @include('layouts.header')
    <body>
    <div class="col-12 col-md-9">
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{!! \Session::get('success') !!}</p>
            </div>
            @endif
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <p>Klaidos:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @yield('content')
        </div>
        <div class="container mt-5 px-5">
        <div class="mb-4">
            <h2>Užpildykite laukus ir patalpinkite konkursą!</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card p-3">
                    <form action="/updateKonkursa" method="post" id="/updateKonkursa">
                    @csrf  
                    <input type="hidden" name="id" id="id" value="{{$data->id}}"/>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Pasirinkite kategorija:</h6>
                            <div class="inputbox mt-3 mr-2"> <select id="kategorija" name="kategorija">
                                <option value='{{$data->kategorijos->id}}'>{{$data->kategorijos->pavadinimas}} </option>
                                @foreach($kategorijos as $kategorija)
                                <option value="{{$kategorija->id}}">{{$kategorija->pavadinimas}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Konkurso antraštė</h6>
                            <div class="inputbox mt-3 mr-2"> <input type="text" id="pavadinimas" name="pavadinimas" placeholder="..." value="{{$data->pavadinimas}}"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Apibūdinkite paslauga kurios ieškote, prašome apibūdinti kuo įmanoma detaliau:</h6>
                            <div class="inputbox mt-3 mr-2"> <textarea id="aprasymas" name="aprasymas" placeholder="Aš ieškau.." style="height:200px" value="{{$data->aprasymas}}">{{$data->aprasymas}}</textarea></div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-4 d-flex justify-content-between"> <span></span> <button class="btn btn-success px-3" id="card-button" type="submit">Redaguoti konkursą</button></div>
            </div>
        </div>
    </div>
    </body>
    @include('layouts.footer')
</html>