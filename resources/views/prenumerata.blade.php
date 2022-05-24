<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/prenumeratos.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />   
        @include('layouts.header')
        
    </head>
    <body class="hm-gradient">
            <main>
                <div class="container mt-4">
                    <div class="card mb-4">
                        <div class="card-body">
                                    <div class="container2">
                                        <img src="img/bannerNotification.jpg" alt="Image">
                                        <div class="container2-text">
                                        <h2>Gaukite užklausas tiesiai į <br>el. paštą!</h2>
                                        <p>Pasirinkite kategoriją, kurią norite užsiprenumeruoti</p>
                                        <div>
                                        <form action="prenumeruoti" method="post" id="prenumeruoti">
                                        @csrf  
                                                <div class="inputbox mt-3 mr-2">
                                                    <select id="kategorija" name="kategorija" required>
                                                    <option></option>
                                                    @foreach($kategorijos as $kategorija)
                                                    <option value="{{$kategorija->id}}">{{$kategorija->pavadinimas}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <button  type="submit" class="btn btn-primary btn-lg">Prenumeruoti</button>
                                        </form>
                                        </div>
                                    </div>
                                    @if (count($prenumeratos) == 0)
                                    Neturite prenumeratų.
                                    @else

                                            @foreach($prenumeratos as $prenumerata)
                                                <tr>
                                                    <br>
                                                        <a class="btn btn-danger" onclick="javascript:return confirm('Ar tikrai nori atšaukti prenumerata?')" href='deletePrenumerata/{{$prenumerata->id}}'>
                                                        <span>Atšaukti kategorijos <b>{{$prenumerata->kategorijos->pavadinimas}}</b> prenumerata</span>
                                                        </a>
                                                    <br>
                                                </tr>
                                            @endforeach
                                            {{$prenumeratos->links()}}
                                    @endif
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        @include('layouts.footer')
    </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript">
     $("#kategorija").select2({
            placeholder: "Ieškokite kategorijos",
            allowClear: true
        });
</script>