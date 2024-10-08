@extends('super.layout')

@section('content')

<h1>JobPost Details</h1>

<table border="2" class="table table-hover" style=" border:groove;">  
   <thead>
    <tr>
        <th>Id</th>
        <th>Job Title</th>
        <th>Years of experience</th>
        <th>Salary</th>
        <th>Qualification</th>
        <th>Technology</th>
        <th>Job Description</th>
        <th>Work Mode</th>
        <th>Date of job post</th>
        <th>Status</th>
        <th>Company</th>
        <th>Email</th>
        <th>Phone</th>
        <!-- Add more columns if needed -->
    </tr>
 </thead>
    @foreach ($datas as $data)
    <tr>
         <td>{{$data->id }}</td>
        <td>{{$data->title }}</td>
        <td>{{$data->years_of_experience }}</td>
        <td>{{$data->salary }}</td>
        <td>{{$data->qualification }}</td>
        <td>{{$data->technology }}</td>
        <td>{{$data->description }}</td>
        <td>{{$data->work_mode }}</td>
        <td>{{$data->post_date }}</td>
        <td>{{$data->status }}</td>
        <td>{{$data->company }}</td>
        <td>{{$data->email }}</td>
        <td>{{$data->phone }}</td>
        <td><a href="" class="btn btn-primary">Edit</a> </td>
        <td><a href="{{route('JobPost.jobpostsearch') }}" class="btn btn-primary">Back</a></td>
        <!-- Add more columns if needed -->
    </tr>
    @endforeach
</table>


@endsection