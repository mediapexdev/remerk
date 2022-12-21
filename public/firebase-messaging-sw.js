importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyD1olKL99I_mV7pbmldR2nF4k8WkD_v8XU",
    authDomain: "yonima-8b9af.firebaseapp.com",
    projectId: "yonima-8b9af",
    storageBucket: "yonima-8b9af.appspot.com",
    messagingSenderId: "468307143948",
    appId: "1:468307143948:web:f1286886fefaf95e2c2d29",
    measurementId: "G-K33XPD5LYQ"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        // icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});
