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
    <div class="container">
        <form class="form-style-5"role="form" method="POST" action="kurtiUzklausa"> 
            @csrf  
            <label for="fname">Per kiek laiko norėtumėte kad būtų atlikta paslauga?</label><br>
            <select id="laikas" name="laikas">
                <option value="24 valandos">24 valandos</option>
                <option value="3 dienos">3 dienos</option>
                <option value="7 dienos">7 dienos</option>
                <option value="14 dienų">14 dienų</option>
                <option value="mėnesis">mėnesis</option>
                <option value="nesvarbu">nesvarbu</option>
            </select>
            <label for="lname">Koks jūsų biudžetas šiai paslaugai?(eur)</label>
            <input type="text" id="biudzetas" name="biudzetas" placeholder="000">
            <label for="kategorija">Pasirinkite kategorija:</label>
            <select id="kategorija" name="kategorija">
            @foreach($kategorijos as $kategorija)
            <option value="{{$kategorija->id}}">{{$kategorija->pavadinimas}}</option>
            @endforeach
            </select>

            <label for="subject">Apibūdinkite paslauga kurios ieškote, prašome apibūdinti kuo įmanoma detaliau:</label>
            <textarea id="aprasymas" name="aprasymas" placeholder="Aš ieškau.." style="height:200px"></textarea>

            <input type="submit" value="Patvirtinti užklausa">

        </form>
    </div>
    </body>
    @include('layouts.footer')
        <!-- JS Lib -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/main.js"></script>
</html>