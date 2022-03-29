<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.head')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/kurti.css') }}">
  <script src="{{ asset('js/uploadOneFile.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/uploadPhotos.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
            <h3>Susikurkite savo individualius dažniausiai užduodamus klausimus!</h3>
            <h6>Neprivaloma užpildyti visus 5 klausimus ir jų atsakymus.</h6>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card p-3">
                    <form action="kurtiKlausima"  method="post" id="kurtiKlausima">
                    @csrf  
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Klausimų sąrašo pavadinimas *</h6>
                            <div class="inputbox mt-3 mr-2"> <input type="text" id="pavadinimas" name="pavadinimas" placeholder="..."></div>
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Pirmas klausimas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="klausimas1" name="klausimas1" placeholder="..."></div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Pirmo klausimo atsakymas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="atsakymas1" name="atsakymas1" placeholder="..."></div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Antras klausimas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="klausimas2" name="klausimas2" placeholder="..."></div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Antro klausimo atsakymas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="atsakymas2" name="atsakymas2" placeholder="..."></div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Trečias klausimas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="klausimas3" name="klausimas3" placeholder="..."></div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Trečio klausimo atsakymas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="atsakymas3" name="atsakymas3" placeholder="..."></div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Ketvirtas klausimas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="klausimas4" name="klausimas4" placeholder="..."></div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Ketvirto klausimo atsakymas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="atsakymas4" name="atsakymas4" placeholder="..."></div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Penktas klausimas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="klausimas5" name="klausimas5" placeholder="..."></div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-uppercase">Penkto klausimo atsakymas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="atsakymas5" name="atsakymas5" placeholder="..."></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-4 d-flex justify-content-between"> <span></span> <button class="btn btn-success px-3" id="card-button" type="submit">Sukurti DUK</button></div>
            </div>
        </div>
    </div>
</body>
@include('layouts.footer')
</html>
