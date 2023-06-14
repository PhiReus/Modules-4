@extends('admin.layouts.master')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputEmail3">NAME</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                        <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3">DATE</label>
                        <input type="date" class="form-control" name="date">
                        @error('date')
                        <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3">COUNTRY</label>
                        <input type="text" class="form-control" name="country">
                        @error('country')
                        <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3">IMAGE</label>
                        <input type="file" class="form-control" name="image">
                        @error('image')
                        <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3">TEAM</label>
                        <select name="team_id" id="" class="form-control">
                            <option value="">--Vui lòng chọn--</option>
                            @foreach ($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                        @error('team_id')
                        <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                        <a href="{{ route('players.index') }}" class="btn btn-primary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
@endsection