// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyC7OvrvvaUKmTckNBNfh8SoA1OD7B4agwo",
  authDomain: "push-notification-e1ce0.firebaseapp.com",
  projectId: "push-notification-e1ce0",
  storageBucket: "push-notification-e1ce0.appspot.com",
  messagingSenderId: "493945802803",
  appId: "1:493945802803:web:998a2935da39c928509346",
  measurementId: "G-DWZBJXGKR8"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);