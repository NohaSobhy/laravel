<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tracks Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h5 class="m-5" > To create new track click here </h5>
    <a class="ms-5" href="{{route('tracks.create')}}" > <button class="btn btn-info">Create</button></a>
    <table class="table w-70 m-5">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">logo</th>
            <th scope="col">address</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($tracks as $track)
            <tr>
                <td>{{ $track->id }}</td>
                <td>{{ $track->name }}</td>
                <td>
                    <img src="{{ asset('images/tracks/'.$track->logo) }}" width= '50' height='50' class="img img-responsive" />
                </td>
                <td>{{ $track->address }}</td>
                <td>
                    <form action="{{route('track.destroy',$track->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>