{{-- {{ $id }}
{{ $nombre }}
{{ $error }} --}}
{{ $token_invitado }}


<!DOCTYPE html>
<html>
  <head>
    <script src='https://8x8.vc/vpaas-magic-cookie-f5b9f550ffbf44928ff69685ab1a3eb1/external_api.js' async></script>
    <style>html, body, #jaas-container { height: 100%; }</style>
    <script type="text/javascript">
      window.onload = () => {
        const api = new JitsiMeetExternalAPI("8x8.vc", {
			roomName: "{{ $id }}/{{ $nombre }}",
			parentNode: document.querySelector('#jaas-container'),
                        // Make sure to include a JWT if you intend to record,
                        // make outbound calls or use any other premium features!
            //jwt: "eyJraWQiOiJ2cGFhcy1tYWdpYy1jb29raWUtZjViOWY1NTBmZmJmNDQ5MjhmZjY5Njg1YWIxYTNlYjEvOWNkMTFkLVNBTVBMRV9BUFAiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJqaXRzaSIsImlzcyI6ImNoYXQiLCJpYXQiOjE3MjYyODA0NTUsImV4cCI6MTcyNjI4NzY1NSwibmJmIjoxNzI2MjgwNDUwLCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtZjViOWY1NTBmZmJmNDQ5MjhmZjY5Njg1YWIxYTNlYjEiLCJjb250ZXh0Ijp7ImZlYXR1cmVzIjp7ImxpdmVzdHJlYW1pbmciOnRydWUsIm91dGJvdW5kLWNhbGwiOnRydWUsInNpcC1vdXRib3VuZC1jYWxsIjpmYWxzZSwidHJhbnNjcmlwdGlvbiI6dHJ1ZSwicmVjb3JkaW5nIjp0cnVlfSwidXNlciI6eyJoaWRkZW4tZnJvbS1yZWNvcmRlciI6ZmFsc2UsIm1vZGVyYXRvciI6dHJ1ZSwibmFtZSI6ImZyYW5jaXNjby5yb2pvLmdhbGxhcmRvIiwiaWQiOiJnb29nbGUtb2F1dGgyfDEwMTc5MTk3NjczOTY3NTQxNTQyNCIsImF2YXRhciI6Imh0dHBzOi8vaS5waW5pbWcuY29tLzU2NHgvYmQvNDAvYjAvYmQ0MGIwOGE2ZWNhMGRlYjE1ODlkZjE1ZDM2NDYzZmEuanBnIiwiZW1haWwiOiJmcmFuY2lzY28ucm9qby5nYWxsYXJkb0BnbWFpbC5jb20ifX0sInJvb20iOiIqIn0.GOrBfM3GmZHJgQpbWFVtwk1e1m0UF13dvhUwkrlqg9G6py9OgpL6I1TGf6qnOqcF5PWyitsQpWduiLnpU-VCC61u_YtXOCZN_eyQpxfxnXZaOWuT9aWi7vmnYoWQnFvmRC_BTMky1W3Lr-PaKWzxpZmaW8AwQgwTFs7ZTdMctUp-9nkKwf4u38T_kifB54OS_ZMzWJ_n2l6ZCId9U4OZSyeaaWQgxIkLd1fTOnLMmMtxViIYsUoK-r9DvjFp7pjbVPTTrAip3nHU0yuOPOJSAsa8OVpVPLA_bOr7WBF1nU3IQQH0jcZwjCrk9NP1Gwpr1AhtARLknwWFUOIeHqaufg",
			// jwt: "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6InZwYWFzLW1hZ2ljLWNvb2tpZS1mNWI5ZjU1MGZmYmY0NDkyOGZmNjk2ODVhYjFhM2ViMS8wM2M1ZmUifQ.eyJhdWQiOiJqaXRzaSIsImlzcyI6ImNoYXQiLCJpYXQiOjE3MjY3NjM0NjEsImV4cCI6MTc1ODI5OTQ2MSwibmJmIjoxNzI2NzYzNDYxLCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtZjViOWY1NTBmZmJmNDQ5MjhmZjY5Njg1YWIxYTNlYjEiLCJjb250ZXh0Ijp7ImZlYXR1cmVzIjp7ImxpdmVzdHJlYW1pbmciOnRydWUsIm91dGJvdW5kLWNhbGwiOnRydWUsInNpcC1vdXRib3VuZC1jYWxsIjpmYWxzZSwidHJhbnNjcmlwdGlvbiI6dHJ1ZSwicmVjb3JkaW5nIjp0cnVlfSwidXNlciI6eyJoaWRkZW4tZnJvbS1yZWNvcmRlciI6ZmFsc2UsImlkIjoiODMtODc2NmY0ZGY4MThmNzU0My45Mjk0ODc0MCIsIm5hbWUiOiJKb2hhbiBkYXZpbGEiLCJhdmF0YXIiOiIiLCJlbWFpbCI6ImpvaGFuLmUuZGF2aWxhcEBnbWFpbC5jb20iLCJtb2RlcmF0b3IiOmZhbHNlfX0sInJvb20iOiJDb25zdWx0YS5EUi5LUklNQU4uSk9IQU5EQVZJTEEuMTcyNzUxMTAwMSJ9.tvAA8vVQmkc4iz-yInkpindDwmCkBXY9u3TLR1_eazs4aXqAwIXfjBul2nzZbkzx6er4YtO1qhrG1A1P7QvTX87sXo18h_ptGf1QpXFsjAZiKDHHApDqpJW1Jt0cfqOHPWXjcIlEEbMdFFTlI9zg5HGaGxTly0M524VgzuywSagM3AKsVznp3Poq3pyTvE1y1-Y6rNYzgKQ25xdNRfvAVXIhUhavxilwEmlCSM3ES0NVLtgC-I9z7SvQm16ysFu40935KD-TKXfnaTduYEK-e6Cwt_x0wmkEPh1owyei1wngvkrbIa83KfBjC6lDhTgEcfAL9t3DZaCClsYzATXuGwiSuwjpEkrOVBeD9o9noTXBk0BxBaem1LWJcJlpOEEmgVihWODYislRXylYKcXDbW7dRp1Duqd3Gp7Bup3tWO0vLTXk_jvDyoiwpVKJNWce8SAPNTP2_fwmLgig__y4KL3VnqaAqJfSaUBVSZk-OJSfzWn68FfeXJBWg7GKJJWxaPBWp_H4AKWLFWtwJy2VWSizUL5owgVFfst2K8kimGtH86EwRew2Pi9w5PO-PYKoIXeOo3UZOumhYCTfaVMt13rwzeru9jSAawlU9ZV_t2iMQmXhk_ffGqhuvuGHAdrdCqVAcddJ-3qTABsAXtiW44Lc7Lqj3U-xAiv9zlDdE-U",
            jwt: "{{ $token_invitado }}",
            configOverwrite: {
                startWithAudioMuted: false,
                enableNoisyMicDetection: true,
                // toolbarButtons: ['hangup', 'microphone', 'camera','chat'],
                prejoinPageEnabled: true,
                // Transcription options.
                transcription: {
                    // Whether the feature should be enabled or not.
                    enabled: false,

                    // Translation languages.
                    // Available languages can be found in
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
            lang: 'es'
        });
      }
    </script>
  </head>
  <body><div id="jaas-container" ></body>
</html>
