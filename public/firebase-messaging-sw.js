// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in
// your app's Firebase config object.
// https://firebase.google.com/docs/web/setup#config-object
firebase.initializeApp({
  apiKey: "AIzaSyD1olKL99I_mV7pbmldR2nF4k8WkD_v8XU",
  authDomain: "yonima-8b9af.firebaseapp.com",
  projectId: "yonima-8b9af",
  storageBucket: "yonima-8b9af.appspot.com",
  messagingSenderId: "468307143948",
  appId: "1:468307143948:web:5c572fac23b962b32c2d29",
  measurementId: "G-XHTR08FZGM"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.onBackgroundMessage((payload) => {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const notificationTitle = payload.title;
    const notificationOptions = {
      body: payload.body,
      icon: payload.icon
    };
  
    self.registration.showNotification(notificationTitle,
      notificationOptions);
  });