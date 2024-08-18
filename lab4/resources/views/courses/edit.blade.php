<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center text-info m-5">Edit {{$course->name}} </h1>
    <form class=" border p-2 bordered w-75 m-auto" method="post" action="{{ route('courses.update',$course) }}"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        {{-- name --}}
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name </label>
            <input name="name" type="Name" value="{{old('name',$course->name)}}" class="form-control" id="exampleInputName1"
                aria-describedby="NameHelp">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- Desc --}}
        <div class="mb-3">
            <label for="exampleInputDesc1" class="form-label">Description</label>
            <input name="desc" type="Desc" class="form-control" id="exampleInputDesc1"
                aria-describedby="AboutHelp" value="{{old('desc',$course->desc)}}">
        </div>
        @error('desc')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- grade --}}
        <div class="mb-3">
            <label for="exampleInputGrade1" class="form-label">Grade</label>
            <input name="grade" type="Grade" class="form-control" id="exampleInputGrade1"
                aria-describedby="AboutHelp" value="{{old('grade',$course->grade)}}">
        </div>
        @error('grade')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- /// image --}}
        <div class="mb-3">
            <label for="exampleInputImage1" class="form-label">Logo</label>
            <input name="logo" type="file" class="form-control" id="exampleInputImage1" aria-describedby="ImageHelp">
            @if(isset($course->logo))
                <div class="mt-2">
                    <img src="{{ asset('images/courses/'.$course->logo) }}" alt="Current Logo" style="max-width: 100px; max-height: 100px;">
                </div>
            @endif
        </div>
        @error('logo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <button type="submit" class="btn btn-primary">Update Course</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>