@extends('admin.layouts.master')
@section('content')
<!-- Hiển thị danh sách các cầu thủ có cùng name -->
@if ($relatedPlayers->count() > 1)
<h2>Các cầu thủ khác có cùng tên:</h2>
<table class="table">
    <thead class="thead-dark">
        <!-- Tiêu đề cột -->
    </thead>
    <tbody>
        @foreach ($relatedPlayers as $relatedPlayer)
        <tr>
            <td> {{ $relatedPlayer->id }} </td>
            <td>{{ $relatedPlayer->name }}</td>
            <td>{{ $relatedPlayer->date }}</td>
            <td>{{ $relatedPlayer->country }}</td>
            <td><img width="90px" height="90px" src="{{ asset($relatedPlayer->image) }}" alt=""></td>
            <td>{{ $relatedPlayer->team->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Hiển thị chi tiết cầu thủ hiện tại -->
<table class="table" border="1">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">DATE</th>
            <th scope="col">COUNTRY</th>
            <th scope="col">IMAGE</th>
            <th scope="col">TEAM</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <!-- <th scope="row">1</th> -->
            <td> {{ $playershow->id }} </td>
            <td>{{ $playershow->name }}</td>
            <td>{{ $playershow->date }}</td>
            <td>{{ $playershow->country }}</td>
            <td><img width="90px" height="90px" src="{{ asset($playershow->image) }}" alt=""></td>
            <td>{{ $playershow->team->name }}</td>
        </tr>
    </tbody>
</table>
@endsection

