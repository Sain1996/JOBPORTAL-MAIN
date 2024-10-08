@extends('super.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Job Title Search</div>
                <div class="card-body">
                    <form action="{{ route('JobPost.search') }}" method="get">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="search" class="form-control" placeholder="Search by Job Title" >
                            </div>
                            <div class="col">
                                <button type="submit"  value="search" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
         </div>

@if(isset($datas) && count($datas) > 0)

<table class="table table-hover" style=" border:groove;">  
   <thead>
       <tr>
       <th scope="col">ID</th>  
       <th scope="col">Job Title</th>  
       <th scope="col">Date of Creation</th> 
       <th scope="col">Action</th>  
</tr> 
</thead>  
@foreach ($datas as $data)

<tr> 
   <th scope='row'>{{ $data->id}}</th>
   <td><a href="{{ route('JobPost.show',['id'=> $data['id']]) }}" >{{ $data->title}}</a></td>
   <td>{{ $data->post_date}}</td>
   <td><a href="" class="btn btn-primary">Edit</a></td>
   <td><a href="" class="btn btn-danger">Remove</a></td>
   </tr>
@endforeach
</tbody>
</div>
@else
 <p>No job titles found.</p>
@endif

</div>
@endsection
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
