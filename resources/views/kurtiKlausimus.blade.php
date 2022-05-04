<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/kurti.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
@include('layouts.header')
<body>
        <div class="container mt-5 px-5">
        <div class="mb-4">
            <h3>Susikurkite savo individualius dažniausiai užduodamus klausimus!</h3>
            <h6>Neprivaloma užpildyti visus 5 klausimus ir jų atsakymus.</h6>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="kurtiKlausima"  method="post" id="kurtiKlausima">
                @csrf  
                <div class="card p-4" id="card p-4">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Klausimų sąrašo pavadinimas *</h6>
                            <div class="inputbox mt-3 mr-2"> <input type="text" id="pavadinimas" name="pavadinimas" placeholder="..."></div>
                        </div>
                    </div>
                    <div class="card p-3" id="card p-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-uppercase">1 klausimas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="klausimas1" name="klausimas1" placeholder="..."></div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-uppercase">1 klausimo atsakymas: </h6>
                                <div class="inputbox mt-3 mr-2"> <input type="text" id="atsakymas1" name="atsakymas1" placeholder="..."></div>
                            </div>
                        </div>
                    </div>
                </div>
                <th><a href="#/" class="btn btn-info" onclick="addRow()">Pridėti klausimą</a></th>
                <div class="mt-4 mb-4 d-flex justify-content-between"> <span></span> <button class="btn btn-success px-3" id="card-button" type="submit">Sukurti DUK</button></div>
            </form>
            </div>
        </div>
    </div>
</body>
@include('layouts.footer')
</html>
<script>
    var countQuestion = 1;
    function addRow(){
    if(countQuestion < 5){
    countQuestion++;
    const div = document.getElementById('card p-4');
    var tr = '<div class="card p-3">'+
                        '<div class="row">'+
                            '<div class="col-md-8">'+
                                '<h6 class="text-uppercase">'+countQuestion+' klausimas: </h6>'+
                                '<div class="inputbox mt-3 mr-2"> <input type="text" id="klausimas'+countQuestion+'" name="klausimas'+countQuestion+'" placeholder="..."></div>'+
                            '</div>'+
                            '<div class="col-md-8">'+
                                '<h6 class="text-uppercase">'+countQuestion+' klausimo atsakymas: </h6>'+
                                '<div class="inputbox mt-3 mr-2"> <input type="text" id="atsakymas'+countQuestion+'" name="atsakymas'+countQuestion+'" placeholder="..."></div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
    
    div.insertAdjacentHTML("beforeend", tr);
    }
    else{
        alert("Daugiau klausimų pridėti negalite.");
    }    
    }
</script>
