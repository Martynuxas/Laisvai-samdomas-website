<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/kurti.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    @include('layouts.header')
    <body>
        <div class="container mt-5 px-5">
        <div class="mb-4">
            <h2>Užpildykite laukus ir patalpinkite konkursą!</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card p-3">
                    <form action="sukurtiKonkursa"  method="post" id="sukurtiKonkursa">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Pasirinkite kategorija:</h6>
                            <div class="inputbox mt-3 mr-2"> <select id="kategorija" name="kategorija">
                                <option></option>
                                @foreach($kategorijos as $kategorija)
                                <option value="{{$kategorija->id}}">{{$kategorija->pavadinimas}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                                <h6 class="text-uppercase">Pasirinkite parų skaičių už kiek konkursas pasibaigs:</h6>
                                <div class="inputbox mt-3"> 
                                    <select id="laikas" name="laikas">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3 </option>
                                        <option value="4">4 </option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Užklausos antraštė</h6>
                            <div class="inputbox mt-3 mr-2"> <input type="text" id="pavadinimas" name="pavadinimas" placeholder="..."></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Apibūdinkite paslauga kurios ieškote, prašome apibūdinti kuo įmanoma detaliau:</h6>
                            <div class="inputbox mt-3 mr-2"> <textarea id="aprasymas" name="aprasymas" placeholder="Aš ieškau.." style="height:200px"></textarea></div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-4 d-flex justify-content-between"> <span></span> <button class="btn btn-success px-3" id="card-button" type="submit">Patvirtinti konkursą</button></div>
            </div>
        </div>
    </div>
    </body>
    @include('layouts.footer')
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
     $("#kategorija").select2({
            placeholder: "Ieškokite kategorijos",
            allowClear: true
        });
</script>