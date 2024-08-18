<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center text-info m-5">Create New Track </h1>

    <form class=" border p-2 bordered w-75 m-auto" method="post" action="{{ route('tracks.store') }}"
        enctype="multipart/form-data">
        @csrf
        
        {{-- name --}}
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name </label>
            <input name="name" type="Name" class="form-control" id="exampleInputName1" aria-describedby="NameHelp">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        {{-- about --}}
        <div class="mb-3">
            <label for="exampleInputAbout1" class="form-label">About</label>
            <input name="about" type="About" class="form-control" id="exampleInputAbout1" aria-describedby="AboutHelp">
        </div>
        @error('about')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- /// image --}}
        <div class="mb-3">
            <label for="exampleInputImage1" class="form-label">logo </label>
            <input name="logo" type="file" class="form-control" id="exampleInputImage1" aria-describedby="ImageHelp">
        </div>



        <button type="submit" class="btn btn-primary">Create Track</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
