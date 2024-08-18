<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <h1 class="text-info w-50 mt-5 m-auto"> All Courses Data</h1>
    <a href="{{route('courses.create')}}"> <button class="btn btn-info m-5">Create New Course</button></a>

    <table class="table w-75 m-auto table-bordered mt-5">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Grade</th>
                <th scope="col">logo</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->desc }}</td>
                    <td>{{ $course->grade }}</td>
                    <td><img src="{{asset('images/courses/'.$course->logo)}}" alt="{{ $course->name }}"  class="w-25 h-25 rounded-circle"></td>
                    <td>
                        <a href="{{route('courses.show',$course->id)}}"> <button class="btn btn-success">View</button></a>
                        <form action="{{route('courses.destroy',$course)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form> 
                        <a href="{{route('courses.edit',$course->id)}}"> <button class="btn btn-warning">Edit</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-50 m-auto mt-2">
        {{$courses->links()}}
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>