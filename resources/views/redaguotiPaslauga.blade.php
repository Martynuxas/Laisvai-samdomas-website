<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/kurti.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
</head>
@include('layouts.header')
<body>
        <div class="container mt-5 px-5">
        <div class="mb-4">
            <h2>Užpildykite laukus ir patalpinkite užklausą!</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card p-3">
                    <form method="post" action="/updatePaslauga" enctype="multipart/form-data">      
                    @csrf  
                    <input type="hidden" name="id" id="id" value="{{$data->id}}"/>
                    <h6 class="text-uppercase">Jūsų užsiėmimas? *</h6>
                            <div class="inputbox mt-3 mr-2">
                                <select id="kategorija" name="kategorija">
                                <option selected value="{{$data->kategorijos->id}}">{{$data->kategorijos->pavadinimas}}</option>
                                @foreach($kategorijos as $kategorija)
                                <option value="{{$kategorija->id}}">{{$kategorija->pavadinimas}}</option>
                                @endforeach
                                </select>
                            </div>
                            <br>
                    <h6 class="text-uppercase">Asmens tipas? *</h6>
                            <div class="inputbox mt-3 mr-2">
                                <select id="asmens_tipas" name="asmens_tipas">
                                <option selected value="{{$data->asmens_tipas}}">{{$data->asmens_tipas}}</option>
                                <option value="Fizinis">Fizinis</option>
                                <option value="Juridinis">Juridinis</option>
                                </select>
                            </div>
                            <br>
                    <h6 class="text-uppercase">Teikiamos paslaugos atstumas? *</h6>
                    <div class="inputbox mt-3 mr-2">
                        <select id="paslaugos_atstumas" name="paslaugos_atstumas">
                        <option selected value="{{$data->paslaugu_atstumai}}">{{$data->paslaugu_atstumai}} km</option>
                        <option value="10">10 km</option>
                        <option value="30">30 km</option>
                        <option value="50">50 km</option>
                        <option value="70">70 km</option>
                        <option value="100">100 km</option>
                        <option value="200">200 km</option>
                        <option value="300">300 km</option>
                        <option value="VISA LIETUVA">VISA LIETUVA</option>
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-uppercase">Jūsų teikiamos paslaugos valandinis įkaiinis *</h6>
                            <div class="inputbox mt-3 mr-2"> <input type="text" id="valandinis" name="valandinis" placeholder="..." value="{{$data->valandinis}}"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-uppercase">Teikiamos paslaugos patirtis(metai) *</h6>
                            <div class="inputbox mt-3 mr-2"> <input type="text" id="patirtis" name="patirtis" placeholder="..." value="{{$data->patirtis}}"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-uppercase">Miestas *</h6>
                            <div class="inputbox mt-3 mr-2"> <input type="text" id="miestas" name="miestas" placeholder="..." value="{{$data->miestas}}"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-uppercase">Jūsų paslaugos puslapio antraštė *</h6>
                            <div class="inputbox mt-3 mr-2"> <input type="text" id="pavadinimas" name="pavadinimas" placeholder="Atlieku..." value="{{$data->pavadinimas}}" required ></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                          <div class="form-group">
                            <label>Apie mane</label>
                            <textarea class="form-control" id="editor" name="editor"rows="5" value="{{$data->aprasymas}}">{{$data->aprasymas}}</textarea>
                            <script>
                                ClassicEditor
                                    .create( document.querySelector( '#editor' ) )
                                    .catch( error => {
                                        console.error( error );
                                    } );
                            </script>
                          </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-uppercase">Galerija</h6>   
                            <p>Pridėkite naujų nuotraukų</p>                      
                            <div class="forma">
                                <span class="inner">Nuvilkite nuotraukas čia arba <span class="select">Naršykite atmintį</span></span>
                                
                                <input name="filename[]" type="file" class="file" multiple="multiple"/>
                            </div>
                            <div class="containerisSenu">
                                @foreach(App\Http\Controllers\KurtiController::gautiNuotraukas($data->id, "skelbimas") as $nuotrauka)
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
                    </div>
                    <div class="col-md-12">
                        <div id="plan_append">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                            <th><a href="#/" class="btn btn-info addPlan">Pridėti planą</a></th>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="mt-4 mb-4 d-flex justify-content-between"> <span></span> <button class="btn btn-success px-3" id="card-button" type="submit">Patvirtinti paslaugą</button></div>
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
<script>
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
        let form = new FormData();
        files.forEach((e, i) => form.append(`filename[${i}]`, e))
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
    <script type="text/javascript">
        var countFields1 = 1;
        var countFields2 = 1;
        var countFields3 = 1;
        var countPlans = 0;
            $("body").on('click',"#removePlanButton1", function(){
                removePlan(".plan1");
            });
            $("body").on('click',"#removePlanButton2", function(){
                removePlan(".plan2");
            });
            $("body").on('click',"#removePlanButton3", function(){
                removePlan(".plan3");
            });
            $("body").on('click',"#addInput1", function(){
                if(countFields1 < 5){
                    addRow1();
                }
                else{
                    alert("Daugiau laukų pridėti negalite.");
                }
            });
            $("body").on('click',"#addInput2", function(){
                if(countFields2 < 5){
                    addRow2();
                }
                else{
                    alert("Daugiau laukų pridėti negalite.");
                }
            });
            $("body").on('click',"#addInput3", function(){
                if(countFields3 < 5){
                    addRow3();
                }
                else{
                    alert("Daugiau laukų pridėti negalite.");
                }
            });

            
            $('.addPlan').on('click', function(){
                if(countPlans < 3){
                addPlan();
                }
                else{
                    alert("Daugiau planų pridėti negalite.");
                }
            });
        function addPlan(){
            countPlans ++;
            var html = 
            '<div class="plan'+countPlans+'">'+
            '<div class="round">'+
                '<div class="row">'+
                    '<div class="col">'+
                        '<div class="row">'+
                            '<div class="col">'+
                                '<div class="form-group">'+
                                '<label>Plano pavadinimas</label>'+
                                '<input class="form-control" type="text" name="pavadinimas'+countPlans+'" id="pavadinimas'+countPlans+'" placeholder="Įprastas" value="" required>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col">'+
                                '<div class="form-group">'+
                                '<label>Kaina</label>'+
                                '<input class="form-control" type="text" name="kaina'+countPlans+'" id="kaina'+countPlans+'" placeholder="000e" value="{{$planai[0]->kaina}}" required>'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group">'+
                              '<label>Kainos tipas:</label>'+
                                '<br>'+
                                    '<select id="kainos_tipas'+countPlans+'" name="kainos_tipas'+countPlans+'" class="form-select" aria-label="Default select example" value="{{$planai[0]->kainos_tipas}}" required>'+
                                        '<option value="Fiksuota">Fiksuota</option>'+
                                        '<option value="Mėnesinė">Mėnesinė</option>'+
                                    '</select>'+
                                '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col">'+
                                '<div class="form-group">'+
                                '<label>Lauko tekstas</label>'+
                                    '<input class="form-control" type="text" name="tekstas'+countPlans+'_1" id="tekstas'+countPlans+'_1" placeholder="10 puslapių" value="{{$planai[0]->tekstas_1}}" required>'+
                                '<div id="dynamic_field_append'+countPlans+'"></div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                    '<div class="row">'+
                            '<div class="col d-flex justify-content-end">'+
                                '<th><a href="#/" class="btn btn-info addInput'+countPlans+'" id="addInput'+countPlans+'">Pridėti lauką</a></th>'+
                                '<th><a href="#/" class="btn btn-danger removePlanButton'+countPlans+'" id="removePlanButton'+countPlans+'">Pašalinti planą</a></th>'+
                            '</div>'+
                    '</div>'+
                '</div>'+
                '</div>';
            $('#plan_append').append(html);
        };
        function removePlan(plan){
            countPlans --;
            $(plan).remove();
        };
        function addRow1(){
            countFields1++;
            var tr = '<input class="form-control" type="text" name="tekstas1_'+countFields1+'" id="tekstas1_'+countFields1+'" placeholder="10 puslapių">';
            $('#dynamic_field_append1').append(tr);
        };
        function addRow2(){
            countFields2++;
            var tr = '<input class="form-control" type="text" name="tekstas2_'+countFields2+'" id="tekstas2_'+countFields2+'" placeholder="10 puslapių">';
            $('#dynamic_field_append2').append(tr);
        };
        function addRow3(){
            countFields3++;
            var tr = '<input class="form-control" type="text" name="tekstas3_'+countFields3+'" id="tekstas3_'+countFields3+'" placeholder="10 puslapių">';
            $('#dynamic_field_append3').append(tr);
        };
    </script>