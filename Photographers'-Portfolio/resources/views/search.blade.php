<!doctype html>
<html>
<head>

</head>
<body>
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" required/>
        <button type="submit">Search</button>
    </form>

  @if(isset($details)){

	?>
	 <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
                <td>{{$user->full_name}}</td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <?php
}

</body>
</html>
