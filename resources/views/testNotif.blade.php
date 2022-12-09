<html>
    <head>
        <title>Firebase Demo</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>

    <body>
        <div class="container mt-5">
            <div class="form-group">
                <label>Token:</label>
                <div class="alert alert-primary text-break" role="alert" id="token"></div>
            </div>

            <div class="form-group">
                <label>Messages:</label>
                <div class="alert alert-secondary text-break" role="alert" id="messages"></div>
            </div>

            <div class="form-group">
                <label>Errors:</label>
                <div class="alert alert-danger text-break" role="alert" id="error"></div>
            </div>
        </div>

        <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
        <script>
            messagesElement = document.getElementById('messages');
            tokenElement = document.getElementById('token');
            errorElement = document.getElementById('error');
        
            var config = {
                'messagingSenderId': '468307143948',
                'apiKey': "AIzaSyD1olKL99I_mV7pbmldR2nF4k8WkD_v8XU",	
                'projectId': 'yonima-8b9af',	
                'appId': "1:468307143948:web:f1286886fefaf95e2c2d29",
            };
            firebase.initializeApp(config);
            function sendTokenTokenToServer(fcm_token){
                const user_id = '1'
                axios.post('/save-fcm-token', {
                    fcm_token,user_id
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            const messaging = firebase.messaging();
            messaging.requestPermission()
            .then(function () {
                console.log('Notification permission granted.');
        
                return messaging.getToken()
            })
            .then(function (token) {
                sendTokenTokenToServer(token);
                tokenElement.innerHTML = token
            })
            .catch(function (err) {
                errorElement.innerHTML = err
                console.log('Unable to get permission to notify.', err);
            });
        
            messaging.onMessage((payload) => {
                console.log('Message received. ', payload);
                appendMessage(payload);
            });
        
            function appendMessage(payload) {
                const messagesElement = document.querySelector('#messages');
                const dataHeaderElement = document.createElement('h5');
                const dataElement = document.createElement('pre');
                dataElement.style = 'overflow-x:hidden;';
                dataHeaderElement.textContent = 'Received message:';
                dataElement.textContent = JSON.stringify(payload, null, 2);
                messagesElement.appendChild(dataHeaderElement);
                messagesElement.appendChild(dataElement);
            }
        </script>
    </body>
</html>