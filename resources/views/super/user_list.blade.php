<!-- user_list.blade.php -->

@if(isset($users) && count($users) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Type of User</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->type }}</td>
                    <td><a href="#">Edit</a> | <a href="#">Remove</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No Users found.</p>
@endif
