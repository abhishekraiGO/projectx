<!DOCTYPE html>
<html>

<head>
    <title>Laravel </title>
    @yield('styles')
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class='container mx-auto mt-10 mb-10 max-w-lg'>
    <h1 class='text-3xl'> @yield('title')</h1>
    <div>
        @if (session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
        @yield('content')
    </div>
    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.2/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.7.2/firebase-analytics.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyD6hNpeSRZIoqd6h7fgAS8zskQuO1y2TZM",
            authDomain: "blogpost-by-rai.firebaseapp.com",
            projectId: "blogpost-by-rai",
            storageBucket: "blogpost-by-rai.appspot.com",
            messagingSenderId: "356902031749",
            appId: "1:356902031749:web:1edf4905d5ba69209f34ec",
            measurementId: "G-ELDL0Q0KZP"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
    </script>
</body>


</html>