<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/profilisEdit.css') }}">
  <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
@include('layouts.header')
<body>
<div class="container">
<div class="row flex-lg-nowrap">
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px;">
                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="Image" class="rounded-circle" width="150">
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ Auth::user()->name }}</h4>
                    <div class="mt-2">
                    <form action="fileUpload" method="POST" enctype="multipart/form-data">
                      @csrf   
                      <fieldset>
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <i class="fa fa-fw fa-camera"></i>
                            <input type="file" name="avatar">
                  
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <div class="text-muted"><small>Sukurtas {{ Auth::user()->created_at }}</small></div>
                    <div class="text-muted"><small>Atnaujintas {{ Auth::user()->updated_at }}</small></div>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Nustatymai</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Vardas</label>
                              <input class="form-control" type="text" name="name" id="name" placeholder="Vardenis Pavardenis" value="{{ Auth::user()->name }}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Miestas</label>
                              <input class="form-control" type="text" name="miestas" id="miestas" placeholder="Kaunas" value="{{ Auth::user()->miestas }}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>El. paštas</label>
                              <input class="form-control" type="text" name="elpastas" id="elpastas" placeholder="pvz@pvz.lt" value="{{ Auth::user()->email }}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                            <label>Asmens tipas:</label>
                            <br>
                                <select id="asmens_tipas" name="asmens_tipas" class="form-select" aria-label="Default select example">
                                    <option disabled value='{{ Auth::user()->asmens_tipas }}'>{{ Auth::user()->asmens_tipas }} </option>
                                    <option value="Fizinis">Fizinis</option>
                                    <option value="Juridinis">Juridinis</option>
                                </select>  
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-sm-auto mb-3">
                            <div class="form-group">
                              <label>Telefonas</label>
                              <input class="form-control" type="text" name="numeris" id="numeris" placeholder="860000000" value="{{ Auth::user()->numeris }}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>Apie mane</label>
                              <textarea class="form-control" id="editor" name="editor"rows="5">{{ Auth::user()->apie }}</textarea>
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
                      </div>
                          <div class="col">
                              <div class="form-group">
                                <label>Github</label>
                                <input class="form-control" type="text" id="github" name="github" placeholder="pvz.lt" value="{{ Auth::user()->github }}">
                            </div>
                            <div class="form-group">
                              <label>Puslapis</label>
                              <input class="form-control" type="text" id="puslapis" name="puslapis" placeholder="pvz.lt" value="{{ Auth::user()->puslapis }}">
                            </div>
                          </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Išsaugoti</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@include('layouts.footer')
</body>
