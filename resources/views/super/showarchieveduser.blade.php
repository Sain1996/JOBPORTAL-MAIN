
<!DOCTYPE html>
<html>
<head>
    <title>Archieved User Details</title>
</head>
<body>

<h1>User Details</h1>

<table border="1">
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <!-- Add more columns if needed -->
    </tr>
    <tr>
        <td>{{$archieveduser->id }}</td>
        <td>{{$archieveduser->first_name }}</td>
        <td>{{$archieveduser->last_name }}</td>
        <td>{{$archieveduser->username }}</td>
        <td>{{$archieveduser ->email }}</td>
        <td>{{$archieveduser->password }}</td>
        <!-- Add more columns if needed -->
    </tr>
</table>

</body>
</html>







