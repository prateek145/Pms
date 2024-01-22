@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Allow
            for Push Notification</button>

        <div id="layoutSidenav_content">
            <main>
                <div class="calendar">
                    <div class="d-flex justify-content-between m-4">
                        {{-- {{ dd($current_date['formatted']) }} --}}
                        <div>
                            <a href="{{ route('previousmonth.dashboard', $current_date['formatted']) }}"> <button
                                    class="btn btn-primary">previous month</button> </a>
                        </div>
                        <div>
                            <a href="{{ route('nextmonth.dashboard', $current_date['formatted']) }}"> <button
                                    class="btn btn-primary">next month</button> </a>

                        </div>
                    </div>
                    <h3 class="text-center">{{ $currentmonth . ' ' . $current_year }}

                        <ul class="month oct">
                            @for ($i = 1; $i < $daysinmonth + 1; $i++)
                                <li
                                    class="date-{{ $i }} date {{ $current_day == $i && date('m') == $current_month && date('Y') == $current_year ? 'active' : '' }}">
                                    <h5>{{ $i }}</h5>
                                    <a href="{{ route('task.list', $current_year . '-' . $current_month . '-' . $i) }}">
                                        <ul class="remind">
                                        </ul>
                                    </a>
                                </li>
                            @endfor


                        </ul>

                </div>
            </main>

        </div>

    </main><!-- End #main -->
    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyC7OvrvvaUKmTckNBNfh8SoA1OD7B4agwo",
            authDomain: "push-notification-e1ce0.firebaseapp.com",
            projectId: "push-notification-e1ce0",
            storageBucket: "push-notification-e1ce0.appspot.com",
            messagingSenderId: "493945802803",
            appId: "1:493945802803:web:998a2935da39c928509346",
            measurementId: "G-DWZBJXGKR8"

        };

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function initFirebaseMessagingRegistration() {
            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(token) {
                    console.log(token);

                    // $.ajaxSetup({
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     }
                    // });

                    $.ajax({
                        url: '{{ route('save-token') }}',
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            token: token
                            
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            alert('Token saved successfully.');
                        },
                        error: function(err) {
                            console.log('User Chat Token Error' + err);
                        },
                    });

                }).catch(function(err) {
                    console.log('User Chat Token Error' + err);
                });
        }

        messaging.onMessage(function(payload) {
            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            console.log(noteTitle, noteOptions);
            new Notification(noteTitle, noteOptions);
        });
    </script>
@endsection
