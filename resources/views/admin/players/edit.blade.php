@extends('admin.layouts.master')
@section('content')
<form action="{{ route('players.update', $players->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="exampleInputEmail1">NAME</label>
        <input type="text" class="form-control" placeholder="name" value="{{ $players->name }}" name="name">
        @error('name')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">DATE</label>
        <input type="date" class="form-control" placeholder="date" value="{{ $players->date }}" name="date">
        @error('date')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">COUNTRY</label>
        <input type="text" class="form-control" placeholder="country" value="{{ $players->country }}" name="country">
        @error('country')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">IMAGE</label>
        <input type="file" class="form-control-file" id="inputFile" name="image">
        <!-- @error('image')
        <div class="text text-danger">{{ $message }}</div>
        @enderror -->
        <img src="{{ asset($players->image) ?? asset('public/images/' . old('image', $players->image)) }}" width="90px" height="90px" id="blah1" alt="">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">TEAM</label>
        <select name="team_id" class="form-control">
            @foreach ($teams as $team)
            <option value="{{ $team->id }}" {{ $team->id == $players->team_id ? 'selected' : '' }}>
                {{ $team->name }}
            </option>
            @endforeach
        </select>
        @error('team_id')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('players.index') }}" class="btn btn-primary">Quay lại</a>
</form>
@endsection