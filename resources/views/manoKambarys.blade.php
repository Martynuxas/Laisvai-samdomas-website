<link rel="stylesheet" type="text/css" href="{{ asset('css/vaizdo.css') }}">
<script src='https://meet.jit.si/external_api.js'></script>
    <script type="text/javascript">
        function codeAddress(){
            const domain = 'meet.jit.si';
            const options = {
                enableLipSync: false,
                roomName: 'laisvaiSamdomas5832362{{ Auth::user()->id }}432541841',
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    @include('layouts.header')
    <body>
        <div class="meetCard">
            <div id="meet"></div>
        </div>
        @include('layouts.footer')
    </body>
</html>