@extends('super.layout')

@section('content')
<div class="row justify-content-center">
        <div class="super-container" style="background-color: white;">
            <h3>CV Search</h3>
            
            
            <form action="{{ route('SuperAdmin.cvsearch') }}" method="GET">
    
        <label for="years_of_exp">Years of Experience:</label>
        <select name="years_of_exp" id="years_of_exp">
            @for ($i = 0; $i <= 50; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    

    
        <label for="designation">Designation:</label>
        <select name="designation" id="designation">
            @foreach ($designations as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    

    
        <label for="technology">Technology:</label>
        <select name="technology" id="technology">
            @foreach ($technologies as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    

    <button type="submit">Search</button>
</form>
</div>
</div>
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
