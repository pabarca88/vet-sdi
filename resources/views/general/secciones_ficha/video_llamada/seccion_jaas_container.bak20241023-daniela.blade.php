<style>
    #jaas-container {
        height: 28em;
        width: 35%;
        position: fixed;
        top: 10px;
        left: 10px;
        /* width: 400px; Ajusta según tu diseño */
        /* height: 300px; */
        z-index: 2000!important; /* Para asegurarse de que esté sobre otros elementos */
        cursor: move;
        border: 2px solid #ccc;
        background-color: white;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        border-top: solid #31BEBE 50px;
    }

    /**BOTÓN DE INICIO LLAMADA**/
        .btn-llamada {
          display:block;
          width:200px;
          font-weight: 600;
          height:auto;
          font-size: 1rem;
          color:#fff;
          background-color:#f4962a;
          border-radius: 10px;
          position:fixed;
          right:92px;
          bottom:37px;
          padding:7px;
          text-align:center;
          z-index:100000;
          transition: 0.3s;
          cursor: pointer;

        }

        .btn-llamada:hover {
          display:block;
          width:200px;
          font-weight: 600;
          height:auto;
          font-size: 1rem;
          color:#fff!important;
          background-color:#31BEBE;
          border-radius: 10px;
          position:fixed;
          right:92px;
          bottom:37px;
          padding:7px;
          transition: 0.3s;
          text-align:center;
          z-index:1000000000;
          cursor: pointer;
          text-decoration: none;
        }

</style>

{{-- video llamada --}}
<script src='https://8x8.vc/{{ env('JITSI_APP_ID') }}/external_api.js' async></script>

<script type="text/javascript">
    $(document).ready(function () {
        const videoCallContainer = document.getElementById("jaas-container");
        let isDragging = false, initialX, initialY, offsetX = 0, offsetY = 0;

        // Función para activar la visibilidad del div cuando se hace scroll
        function checkVisibility() {
            const rect = videoCallContainer.getBoundingClientRect();
            if (rect.top < 0 || rect.bottom > window.innerHeight) {
                // Si el div queda fuera de la vista, lo reposicionamos en la esquina superior izquierda
                videoCallContainer.style.position = 'fixed';
                videoCallContainer.style.top = '10px';
                // videoCallContainer.style.left = '10px';
                videoCallContainer.style.right = '10px';
            }
            // else
            // {
            //     videoCallContainer.style.position = '';
            //     videoCallContainer.style.top = '10px';
            //     // videoCallContainer.style.left = '10px';
            //     videoCallContainer.style.right = '10px';
            // }
        }

        // Evento que se dispara al hacer scroll
        window.addEventListener('scroll', checkVisibility);

        // Hacer el div arrastrable
        videoCallContainer.addEventListener('mousedown', function(e) {
            isDragging = true;
            initialX = e.clientX - offsetX;
            initialY = e.clientY - offsetY;
            videoCallContainer.style.cursor = 'grabbing'; // Cambiar el cursor al arrastrar
        });

        document.addEventListener('mousemove', function(e) {
            if (isDragging) {
                offsetX = e.clientX - initialX;
                offsetY = e.clientY - initialY;
                videoCallContainer.style.left = `${offsetX}px`;
                videoCallContainer.style.top = `${offsetY}px`;
            }
        });

        document.addEventListener('mouseup', function() {
            isDragging = false;
            videoCallContainer.style.cursor = 'move'; // Restaurar el cursor al soltar
        });
    });

    function inicio_llamada(token, nombre)
    {
        const api = new JitsiMeetExternalAPI("8x8.vc", {
            roomName: "{{ env('JITSI_APP_ID') }}/"+nombre,
            parentNode: document.querySelector('#jaas-container'),
            jwt: token,
            configOverwrite: {
                startWithAudioMuted: false,
                enableNoisyMicDetection: true,
                // toolbarButtons: ['hangup', 'microphone', 'camera','chat'],
                prejoinPageEnabled: true,
                // Transcription options.
                transcription: {
                    enabled: false,

                    // ./src/react/features/transcribing/translation-languages.json.
                    translationLanguages: ['en', 'es', 'fr', 'ro'],

                    // Important languages to show on the top of the language list.
                    translationLanguagesHead: ['en'],

                    // If true transcriber will use the application language.
                    // The application language is either explicitly set by participants in their settings or automatically
                    // detected based on the environment, e.g. if the app is opened in a chrome instance which
                    // is using french as its default language then transcriptions for that participant will be in french.
                    // Defaults to true.
                    useAppLanguage: true,

                    // Transcriber language. This settings will only work if "useAppLanguage"
                    // is explicitly set to false.
                    // Available languages can be found in
                    // ./src/react/features/transcribing/transcriber-langs.json.
                    preferredLanguage: 'en-US',

                    // Enables automatic turning on transcribing when recording is started
                    autoTranscribeOnRecord: false,
                },
            },
            interfaceConfigOverwrite: {
                DISABLE_DOMINANT_SPEAKER_INDICATOR: true,
                AUDIO_LEVEL_PRIMARY_COLOR: 'rgba(255,255,255,0.4)',
                AUDIO_LEVEL_SECONDARY_COLOR: 'rgba(255,255,255,0.2)',
            },
            lang: 'es',
        });
    }

    function iniciar_llamada_j(id)
    {
        $('#jaas-container-mensaje').hide();
        $('#jaas-container-mensaje').html('');

        url = "{{ route('jitsi.buscar.meet') }}";
        $.ajax({

            url: url,
            type: "GET",
            data: {
                id : id,
            },
        })
        .done(function(data)
        {
            // console.log('-----------------------');
            // console.log(data);
            // console.log('-----------------------');
            if(data.estado == 1)
            {
                inicio_llamada(data.registro.token_moderator, data.registro.nombre_grupo);
                $('#jaas-container').show();
            }
            else
            {
                mensaje = 'Se presento un problema al cargar información de la llamada';
                $('#jaas-container').hide();
                $('#jaas-container-mensaje').show();
                $('#jaas-container-mensaje').html(mensaje);

                setTimeout(function(){
                    $('#jaas-container-mensaje').hide();
                    $('#jaas-container-mensaje').html('');
                }, 2000);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
  </script>
{{-- video llamada --}}

{{-- BOTON DE INICIO DE LLAMADA --}}
@if ( $hora_medica->tipo_hora_medica == 'T' )
    <button type="button" class="btn btn-llamada shadow heartbeat" role="button" id="startCallButton" onclick="iniciar_llamada_j({{ $hora_medica->id_jitsi_video_consulta }});"><i class="fas fa-video"></i> Iniciar videollamada</button>
    <div id="jaas-container" style="display: none;"></div>
@endif
