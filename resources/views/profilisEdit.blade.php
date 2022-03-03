<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<head>
@include('layouts.head')
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/profilisEdit.css') }}">
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
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
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
                    <span class="badge badge-secondary">vartotojas</span>
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
                              <input class="form-control" type="text" name="name" placeholder="Vardenis pavardenis" value="{{ Auth::user()->name }}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Miestas</label>
                              <input class="form-control" type="text" name="miestas" placeholder="Kaunas" value="{{ Auth::user()->miestas }}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>El. paštas</label>
                              <input class="form-control" type="text" placeholder="pvz@pvz.lt" value="{{ Auth::user()->email }}">
                            </div>
                          </div>
                          <div class="col">
                          <div class="form-group">
                            <label>Asmens tipas:</label>
                                <select id="name" name="asmens_tipas">
                                    <option value='{{ Auth::user()->asmens_tipas }}'>{{ Auth::user()->asmens_tipas }} </option>
                                    <option value="Fizinis">Fizinis</option>
                                    <option value="Juridinis">Juridinis</option>
                                </select>  
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>Apie mane</label>
                              <textarea class="form-control" rows="5" placeholder="Gyvenimo aprašymas" value="{{ Auth::user()->apie }}"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Keisti slaptažodį</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Dabartinis slaptažodis</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Naujas slaptažodis</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Patvirtinti <span class="d-none d-xl-inline">slaptažodį</span></label>
                              <input class="form-control" type="password" placeholder="••••••"></div>
                          </div>
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