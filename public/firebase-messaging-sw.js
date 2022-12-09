// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here.
// Other Firebase libraries are not available in the service worker.
importScripts("https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js");
importScripts(
    "https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"
);

if (firebase.messaging.isSupported()) {
    // Initialize the Firebase app in the service worker by passing in the
    // messagingSenderId.
    firebase.initializeApp({
        apiKey: "AIzaSyD1olKL99I_mV7pbmldR2nF4k8WkD_v8XU",
        authDomain: "yonima-8b9af.firebaseapp.com",
        projectId: "yonima-8b9af",
        storageBucket: "yonima-8b9af.appspot.com",
        messagingSenderId: "468307143948",
        appId: "1:468307143948:web:5c572fac23b962b32c2d29",
        measurementId: "G-XHTR08FZGM",
    });

    // Retrieve an instance of Firebase Messaging so that it can handle background messages.
    const messaging = firebase.messaging();

    messaging.onMessage((payload) => {
        console.log('Message received. ', payload);
        // ...
      });

      messaging.onBackgroundMessage((payload) => {
        console.log('[firebase-messaging-sw.js] Received background message ', payload);
        // Customize notification here
        const notificationTitle = 'Background Message Title';
        const notificationOptions = {
          body: 'Background Message body.',
          icon: '/firebase-logo.png'
        };
      
        self.registration.showNotification(notificationTitle,
          notificationOptions);
      });
      

    messaging.setBackgroundMessageHandler(function (payload) {
        console.log(
            "[firebase-messaging-sw.js] Received background message ",
            payload
        );

        // Customize notification here
        const notificationTitle = "Background Message Title";
        const notificationOptions = {
            body: "Background Message body.",
            icon: "/itwonders-web-logo.png",
        };

        return self.registration.showNotification(
            notificationTitle,
            notificationOptions
        );
    });
}
