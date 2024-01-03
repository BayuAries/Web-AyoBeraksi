/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
    apiKey: "AIzaSyBcKe_ABZsLA4dBLK9n-mk49g4gzQHut_o",
    authDomain: "ayo-beraksi.firebaseapp.com",
    projectId: "ayo-beraksi",
    storageBucket: "ayo-beraksi.appspot.com",
    messagingSenderId: "818557378183",
    appId: "1:818557378183:web:6ea0d470588dfcf4816222"
    // measurementId: "G-6K8LXW630M"
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messagings = firebase.messaging();
messagings.setBackgroundMessageHandler(function (payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});
