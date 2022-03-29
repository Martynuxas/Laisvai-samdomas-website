
    <!--<iframe allow="camera; microphone; fullscreen; display-capture; autoplay" src="https://meet.jit.si/laisvas" style="height: 100%; width: 100%; border: 0px;"></iframe>-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vaizdo.css') }}">
    <script src='https://meet.jit.si/external_api.js'></script>
        <script type="text/javascript">
            function codeAddress(){
                const domain = 'meet.jit.si';
                const options = {
                    configOverwrite:{
			startWithVideoMuted: true,
			startWithAudioMuted: true,
			disableRemoteMute: true,
			disablePolls: true,
			logoImageUrl: 'https://www.agrokoncernas.lt/metro/images/Agrokoncernas_logo_70.png',
                        disableDeepLinking: true,
                        remoteVideoMenu: {
                            disableKick: true,
                        },
                        toolbarButtons: [
                            'camera',
                            'chat',
                            'closedcaptions',
                            'desktop',//ekrano live
                            'etherpad',
                            'filmstrip',
                            'fullscreen',
                            'hangup',
                            'highlight',
                            'linktosalesforce',
                            'microphone',
                            'profile',
                            'raisehand',
                            'select-background',
                            'settings',
                            'stats',
                            'tileview',
                            'toggle-camera',
                            'videoquality',
                            '__end'                        ]
                    },
                    interfaceConfigOverwrite:{
                        HIDE_INVITE_MORE_HEADER: true,
                        JITSI_WATERMARK_LINK: 'https://www.agrokoncernas.lt/metro/images/Agrokoncernas_logo_70.png',
 			            DEFAULT_LOGO_URL: 'https://www.agrokoncernas.lt/metro/images/Agrokoncernas_logo_70.png',
    			        DEFAULT_WELCOME_PAGE_LOGO_URL: 'https://www.agrokoncernas.lt/metro/images/Agrokoncernas_logo_70.png',
			            SHOW_JITSI_WATERMARK: false,
                    },
                    enableLipSync: false,
                    roomName: 'laisvaiSamdomas5832362{{ $id }}432541841',
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