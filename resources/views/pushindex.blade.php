@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Push Notification</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Push Notification</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Push Notification</h5>
                        <div>
                            @foreach ($subscriptions as $sub)
                                <form class="row p-2 m-3 shadow rounded bg-white"
                                    action="{{ route('admin.send_notifications') }}" method="POST">
                                    Sub #{{ $sub->id }}
                                    <input type="hidden" value="{{$sub->user_id}}" name="user_id">
                                    <input class="py-1 my-2" type="text" name="title" placeholder="title">
                                    <input class="py-1 my-2" type="text" name="body" placeholder="body">
                                    <input class="py-1 my-2" type="text" name="url" placeholder="url">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input class="btn btn-primary my-2" type="submit" value="Send">
                                </form>
                            @endforeach

                            <button onclick="requestPermission()">Enable Notification</button>

                        </div>

                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
    <script>
        // console.log(navigator.serviceWorker.register("sw.js"));
        navigator.serviceWorker.register("sw.js");

        function requestPermission() {
            // console.log('working');
            Notification.requestPermission().then((permission) => {
                if (permission === 'granted') {

                    // console.log(permission);
                    // get service worker
                    navigator.serviceWorker.ready.then((sw) => {

                        // subscribe
                        sw.pushManager.subscribe({
                            userVisibleOnly: true,
                            applicationServerKey: "BH_3PDMod9Me70Zz27uSCNapPS2HNMsa3zjMiAk9IZUUK20AHrQF3G-R7Ktkq_DTInnGc6X0qT-MBGSoBdQHXJM"
                        }).then((subscription) => {

                            $.ajax({
                                url: "{{ route('push.subscribe') }}",
                                method: "POST",
                                data: {
                                    '_token': "{{ csrf_token() }}",
                                    "subscription": JSON.stringify(subscription),
                                    "user_id": {{auth()->id()}}
                                },
                                success: function(response) {
                                    console.log(response);
                                    if (response.status == 200) {
                                        console.log('Token Successfully Created.');
                                    }

                                }
                            });
                            // console.log(, 'prateek');
                            // // subscription successful
                            // fetch("push-subscribe", {
                            //     method: "post",
                            //     body: JSON.stringify(subscription),

                            // }).then(alert("ok"));
                        });
                    });
                }
            });

            // Notification.requestPermission().then(function(permission) {
            //     console.log('permiss', permission)
            // });
        }
    </script>
@endsection
