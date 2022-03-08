<link rel="stylesheet" type="text/css" href="{{ asset('css/vaizdo.css') }}">
<script src='https://meet.jit.si/external_api.js'></script>
    <script type="text/javascript">
        function codeAddress(){
            const domain = 'meet.jit.si';
            const options = {
            enableLipSync: false,
            configOverwrite: { inviteDomain: 'localhost:8000' },
            roomName: 'LaisvaiSamdomas9457686481132{{ Auth::user()->id }}16487325947',
            width: 700,
            height: 700,
            parentNode: document.querySelector('#meet'),
            userInfo: {
                email: '{{ Auth::user()->email }}',
                displayName: '{{ Auth::user()->name }}'
            }
    };
        const api = new JitsiMeetExternalAPI(domain, options);
    }
    window.onload = codeAddress;
    </script>
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
    </head>
    <body>
        @include('layouts.header')
        <div class="meetCard">
            <div id="meet"></div>
        </div>
    </body>
</html>