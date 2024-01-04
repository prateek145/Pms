@extends('backend.layouts.app')
@section('content')
<div class="container" style="margin-top: 10%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <button onclick="startFCM()"
                    class="btn btn-danger btn-flat">Allow notification
                </button>
            <div class="card mt-3">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('send.web-notification') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Message Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Message Body</label>
                            <textarea class="form-control" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Send Notification</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js"></script>
<script src="https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/10.7.1/firebase-analytics.js"></script>
<script type="module">

  
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
  
    const firebase = initializeApp(firebaseConfig);
    const messaging = messaging(firebase);

    function startFCM() {
        messaging.requestPermission().then(function () {
            return messaging.getToken()
        }).then(function(token) {
            
            axios.post("{{ route('store.token') }}",{
                _method:"PATCH",
                token
            }).then(({data})=>{
                console.log(data)
            }).catch(({response:{data}})=>{
                console.error(data)
            })

        }).catch(function (err) {
            console.log(`Token Error :: ${err}`);
        });
    }
  
  </script>
@endsection