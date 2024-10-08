@extends('super.layout')

@section('content')
<h1>Archieved Users</h1>
<table border="1">
    <tr style= "padding:10px">
        <th style= "padding:10px" >First Name</th>
        <th style= "padding:10px">Last Name</th>
        <th style= "padding:10px">Archieved Date</th>
        <!-- Add more columns if needed -->
    </tr>
    @foreach ($data as $user)
    <tr>
        <td> <a href="{{ route('SuperAdmin.showarchieveduser',['id'=> $user['id']]) }}" style="color:blue;" onMouseOver="this.style.color='black'">{{ $user['first_name'] }} </a></td>
        <td> {{ $user['last_name'] }} </td>
        <td>{{ $user['created_at']->format('d/m/Y') }} </td>
        <!-- Add more columns if needed -->
    </tr>
    @endforeach
</table>
<script>
    // Detect back button click event
    window.onload = function () {
        if (window.history && window.history.pushState) {
            window.history.pushState('forward', null, './#');
            window.onpopstate = function () {
                // Perform an AJAX request to a Laravel route to end the session
                axios.post('/logout')
                    .then(response => {
                        // Session ended successfully
                        console.log('Session ended');
                    })
                    .catch(error => {
                        // Handle errors
                        console.error('Error ending session');
                    });
            };
        }
    };
</script>
@endsection