@section('scripts')
    {{-- <!--begin::Vendors Javascript(used by this page)--> --}}
    @include('components.scripts')
    {{-- <!--end::Vendors Javascript--> --}}
    {{-- <!--begin::Custom Javascript(used by this page)--> --}}
    <script src="{{ URL::asset('assets/js/custom/utilities/modals/create-expedition.js') }}"></script>
    @yield('custom-js')
    {{-- <!--end::Custom Javascript--> --}}
    <script>
        $(document).ready(function() {
            @if (Session::has('expedition-acknowledgment-of-receipt'))
                acknowledgmentOfReceipt();
            @endif
        });
    </script>
    {{-- begin::impression --}}
    <script>
        function imprimer() {
            const page = document.getElementById("html").innerHTML;
            const facture = document.getElementById("facture").innerHTML;
            window.document.body.innerHTML = facture;
            window.print();
            window.document.body.innerHTML = page;
        }
    </script>
    {{-- end::impression --}}
    <script>
        tokenElement = document.getElementById('token');
        errorElement = document.getElementById('error');
        messagesElement = document.getElementById('messages');

        var config = {
            apiKey: "AIzaSyD1olKL99I_mV7pbmldR2nF4k8WkD_v8XU",
            authDomain: "yonima-8b9af.firebaseapp.com",
            projectId: "yonima-8b9af",
            storageBucket: "yonima-8b9af.appspot.com",
            messagingSenderId: "468307143948",
            appId: "1:468307143948:web:5c572fac23b962b32c2d29",
            measurementId: "G-XHTR08FZGM"
        };
        firebase.initializeApp(config);

        function sendTokenTokenToServer(fcm_token) {
            const user_id = '{{ Auth::user()->id }}'
            axios.post('/save-fcm-token', {
                    fcm_token,
                    user_id
                })
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
        const messaging = firebase.messaging();
        messaging.requestPermission()
            .then(function() {
                console.log('Notification permission granted.');

                return messaging.getToken()
            })
            .then(function(token) {
                sendTokenTokenToServer(token);
                console.log(token)
                tokenElement.innerHTML = token
            })
            .catch(function(err) {
                errorElement.innerHTML = err
                console.log('Unable to get permission to notify.', err);
            });

        // messaging.onMessage((payload) => {
        //     console.log('Message received. ', payload);
        //     const title = payload.notification.title;
        //     const options = {
        //         body: payload.notification.body,
        //         icon: payload.notification.icon,
        //     };
        //     new Notification(title, options);
        // });

        // function appendMessage(payload) {
        //     const messagesElement = document.querySelector('#messages');
        //     const dataHeaderElement = document.createElement('h5');
        //     const dataElement = document.createElement('pre');
        //     dataElement.style = 'overflow-x:hidden;';
        //     dataHeaderElement.textContent = 'Received message:';
        //     dataElement.textContent = JSON.stringify(payload, null, 2);
        //     messagesElement.appendChild(dataHeaderElement);
        //     messagesElement.appendChild(dataElement);
        // }
    </script>
@endsection
