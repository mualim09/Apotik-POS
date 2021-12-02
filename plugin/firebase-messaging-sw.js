importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

var firebaseConfig = {
		apiKey: "AIzaSyCRrp6rDPLQohEUNQZApxvRy1KFLSbw7jA",
		authDomain: "android-21d75.firebaseapp.com",
		databaseURL: "https://android-21d75.firebaseio.com",
		projectId: "android-21d75",
		storageBucket: "android-21d75.appspot.com",
		messagingSenderId: "696175720584",
		appId: "1:696175720584:web:c6d1885c2468addc6ac73d",
		measurementId: "G-J3TTCG93HY"
};

firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});