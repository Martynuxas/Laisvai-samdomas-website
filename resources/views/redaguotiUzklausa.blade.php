<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/kurti.css') }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
    </head>
    @include('layouts.header')
    <body>
        <div class="container mt-5 px-5">
            <div class="mb-4">
                <h2>Užpildykite laukus ir patalpinkite užklausą!</h2>
            </div>
                <div class="col-md-8">
                    <div class="card p-3">
                        <form method="post" action="/updateUzklausa" id="/updateUzklausa" enctype="multipart/form-data">      
                        @csrf  
                        <input type="hidden" name="id" id="id" value="{{$data->id}}"/>
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="text-uppercase">Per kiek laiko norėtumėte kad būtų atlikta paslauga?</h6>
                                    <div class="inputbox mt-3"> 
                                        <select id="laikas" name="laikas" required>
                                            <option selected value="{{$data->laikas}}">{{$data->laikas}}</option>
                                            <option value="24 valandos">24 valandos</option>
                                            <option value="3 dienos">3 dienos</option>
                                            <option value="7 dienos">7 dienos</option>
                                            <option value="14 dienų">14 dienų</option>
                                            <option value="mėnesis">mėnesis</option>
                                            <option value="nesvarbu">nesvarbu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="text-uppercase">Koks jūsų biudžetas šiai paslaugai?(eur)</h6>
                                <div class="inputbox mt-2 mr-2"> <input type="text" id="biudzetas" name="biudzetas" placeholder="000" value="{{$data->biudzetas}}"required></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="text-uppercase">Pasirinkite kategorija:</h6>
                                <div class="inputbox mt-3 mr-2">
                                    <select id="kategorija" name="kategorija">
                                        <option selected value="{{$data->kategorijos->id}}">{{$data->kategorijos->pavadinimas}}</option>
                                            @foreach($kategorijos as $kategorija)
                                                <option value="{{$kategorija->id}}">{{$kategorija->pavadinimas}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                            <br>
                            <h6 class="text-uppercase">Užklausos antraštė</h6>
                            <div class="inputbox mt-3 mr-2"> <input type="text" id="pavadinimas" name="pavadinimas" placeholder="..." value="{{$data->pavadinimas}}" required></div>

                            <h6 class="text-uppercase">Apibūdinkite paslauga kurios ieškote, prašome apibūdinti kuo įmanoma detaliau:</h6>
                            <div class="inputbox mt-3 mr-2"> <textarea id="aprasymas" name="aprasymas" placeholder="Aš ieškau.." style="height:200px" value="{!!$data->aprasymas!!}" required>{!!$data->aprasymas!!}</textarea></div>

                            <h6 class="text-uppercase">Įkelkite naujas nuotraukas:</h6>   
                                <div class="forma">
                                        <span class="inner">Nuvilkite naujas nuotraukas čia arba <span class="select">Naršykite atmintį</span></span>
                                        <input name="filename[]" type="file" class="file" multiple="multiple"/>
                                </div>
                                <div class="containerisSenu">
                                    @foreach(App\Http\Controllers\KurtiController::gautiNuotraukas($data->id, "uzklausa") as $nuotrauka)
                                    <div class="oneOfImage" id="oneOfImage{{$nuotrauka->id}}">
                                        <div class="image">
                                            <img src="{{ URL::to('/images')}}/{{$nuotrauka->nuoroda}}" alt="image" width="100" height="100">
                                            <span onclick="delImageFromData({{$nuotrauka->id}},'oneOfImage{{$nuotrauka->id}}')">&times;</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="containeris"></div>
                </div>
                <div class="mt-4 mb-4 d-flex justify-content-between"> <span></span> <button class="btn btn-success px-3" id="card-button" type="submit">Redaguoti užklausą</button></div>
            </form>
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
<script>
    $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
         });
    });
    let files = [], // will be store images
    button = document.querySelector('.top button'), // uupload button
    form = document.querySelector('.forma'), // form ( drag area )
    container = document.querySelector('.containeris'), // container in which image will be insert
    text = document.querySelector('.inner'), // inner text of form
    browse = document.querySelector('.select'), // text option fto run input
    input = document.querySelector('.forma input'); // file input
    
    browse.addEventListener('click', () => input.click());
    
    // input change event
    input.addEventListener('change', () => {
        let file = input.files;
    
        for (let i = 0; i < file.length; i++) {
            if (files.every(e => e.name !== file[i].name)) files.push(file[i])
        }
        showImages();
    })
    
    const showImages = () => {
        let images = '';
        files.forEach((e, i) => { 
            images += `<div class="image">
                    <img src="${URL.createObjectURL(e)}" alt="image">
                    <span onclick="delImage(${i})">&times;</span>
                </div>`
        })
        //console.log(input.value);
        //array=[];
        //files.forEach((e, i) => { 
        //    array.push("C:/fakepath/"+e['name']);
        //})
        //console.log(array); 
        //input.value = array;
        container.innerHTML = images;
    } 
    const delImageFromData = (index, divName) => {
        var id = index;
        var token = $("meta[name='csrf-token']").attr("content");
        if(confirm('Ar tikrai norite pašalinti nuotrauką?')) {
        $.ajax({
            type: "GET",
            url: "/deleteUzklausosNuotrauka/"+id,
            success: function(result) {
                document.getElementById(divName).remove();
            }
        });
        }
    }
    const delImage = index => {
        files.splice(index, 1)
        showImages()
    } 
    
    // drag and drop 
    form.addEventListener('dragover', e => {
        e.preventDefault()
    
        form.classList.add('dragover')
        text.innerHTML = 'Tempkite nuotraukas čia'
    })
    
    form.addEventListener('dragleave', e => {
        e.preventDefault()
    
        form.classList.remove('dragover')
        text.innerHTML = 'Nuvilkite nuotraukas čia arba <span class="select">Naršykite atmintį</span>'
    })
    
    form.addEventListener('drop', e => {
        e.preventDefault()
    
        form.classList.remove('dragover')
        text.innerHTML = 'Nuvilkite nuotraukas čia arba <span class="select">Naršykite atmintį</span>'
    
        let file = e.dataTransfer.files;
        for (let i = 0; i < file.length; i++) {
            if (files.every(e => e.name !== file[i].name)) files.push(file[i])
        }
        showImages();
    })
    
    button.addEventListener('click', () => {
        let form = new FormData();
        files.forEach((e, i) => form.append(`file[${i}]`, e))
        // now you can send the image to server using AJAX or FETCH API
        
    })
    </script>