<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/kurti.css') }}">
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
            <h2>Užpildykite laukus ir patalpinkite užklausą!</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card p-3">
                    <form action="/updateUzklausa" method="post" id="/updateUzklausa">
                    @csrf  
                    <input type="hidden" name="id" id="id" value="{{$data->id}}"></input>
                    <h6 class="text-uppercase">Per kiek laiko norėtumėte kad būtų atlikta paslauga?</h6>
                        <div class="inputbox mt-3"> 
                            <select id="laikas" name="laikas">
                                <option value='{{$data->laikas}}'>{{$data->laikas}} </option>
                                <option value="24 valandos">24 valandos</option>
                                <option value="3 dienos">3 dienos</option>
                                <option value="7 dienos">7 dienos</option>
                                <option value="14 dienų">14 dienų</option>
                                <option value="mėnesis">mėnesis</option>
                                <option value="nesvarbu">nesvarbu</option>
                            </select>
                        </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Koks jūsų biudžetas šiai paslaugai?(eur)</h6>
                            <div class="inputbox mt-3 mr-2"> <input type="text" id="biudzetas" name="biudzetas" placeholder="000" value="{{$data->biudzetas}}"></div>
                        </div>
                    </div>
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
                            <h6 class="text-uppercase">Užklausos antraštė</h6>
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
                <div class="mt-4 mb-4 d-flex justify-content-between"> <span></span> <button class="btn btn-success px-3" id="card-button" type="submit">Patvirtinti užklausą</button></div>
            </div>
        </div>
    </div>
    </body>
    @include('layouts.footer')
        <!-- JS Lib -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/main.js"></script>
</html>