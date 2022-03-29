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
            <h2>Užpildykite laukus ir patalpinkite užklausą!</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card p-3">
                    <form action="kurtiUzklausa"  method="post" id="kurtiUzklausa">
                    @csrf  
                    <h6 class="text-uppercase">Jūsų užsiėmimas? *</h6>
                            <div class="inputbox mt-3 mr-2">
                                <select id="kategorija" name="kategorija">
                                <option></option>
                                @foreach($kategorijos as $kategorija)
                                <option value="{{$kategorija->id}}">{{$kategorija->pavadinimas}}</option>
                                @endforeach
                                </select>
                            </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Jūsų paslaugos puslapio antraštė *</h6>
                            <div class="inputbox mt-3 mr-2"> <input type="text" id="antraste" name="antraste" placeholder="Atlieku..."></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Aprašymas *</h6>
                            <div class="inputbox mt-3 mr-2"> <textarea id="aprasymas" name="aprasymas" placeholder="Aš teikiu.." style="height:200px"></textarea></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Pagrindinė viršelio nuotrauka *</h6>   
                            <p>Pridėkite pagrindinę viršelio nuotrauką</p>                      
                              <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                              <div class="file-upload">
                                <div class="image-upload-wrap">
                                  <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                  <div class="drag-text">
                                    <h3>Įtempkite arba paspauskite ČIA, norėdami įkelti nuotrauką.</h3>
                                  </div>
                                </div>
                                <div class="file-upload-content">
                                  <img class="file-upload-image" src="#" alt="your image" />
                                  <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Pašalinti <span class="image-title">Uploaded Image</span></button>
                                  </div>
                                </div>
                              </div>
                          </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-uppercase">Galerija *</h6>
                            <p>Pridėkite kitas nuotraukas susijusias su paslaugų teikimu</p>   
                            <div class="file-upload">
                                <div class="image-upload-wrap">                  
                                <div class="card">
                                    <form action="/upload" method="post" class="">
                                        <div class="drag-text">
                                            <span class="inner">Drag & drop image here or <span class="select">Browse</span></span>
                                        </div>
                                        <input name="file" type="file" class="file" multiple />
                                    </form>
                                    <div class="container"></div>
                                    </div>
                                </div>
                                </div>
                                <script src="{{ asset('js/uploadPhotos.js') }}"></script>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-4 d-flex justify-content-between"> <span></span> <button class="btn btn-success px-3" id="card-button" type="submit"">Patvirtinti užklausą</button></div>
            </div>
        </div>
    </div>
</body>
@include('layouts.footer')
</html>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
     $("#kategorija").select2({
            placeholder: "Ieškokite kategorijos",
            allowClear: true
        });
</script>