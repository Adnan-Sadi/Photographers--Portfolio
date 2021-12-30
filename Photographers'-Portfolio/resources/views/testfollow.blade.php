<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Follow</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>
    <br><br>
    <div align="center">Follow user {{ $userId }}</div>
    @if ($followsUser == true)

    <div align="center">
        <a type="button" class="btn btn-danger" href="/unfollow/{{ $userId }}">Unfollow User</a>
    </div>
  
    @else

    <div align="center">
        <a type="button" class="btn btn-success" href="/follow/{{ $userId }}">Follow User</a>
    </div>

    @endif

    <ul>
        <li>
            <a class="btn btn-success upload-button" href="/follow/{{ $userId }}"><i class="fas fa-user-plus"></i> Follow </a>
        </li>
        <li>
            <a class="btn btn-danger upload-button" href="/"><i class="fas fa-user-minus"></i> Unfollow </a>
        </li>
    </ul>
    

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>