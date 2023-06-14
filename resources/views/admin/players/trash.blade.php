@extends('admin.layouts.master')
@section('content')
<table class="table" style="text-align: center;">
    <h1 style="text-align: center; color: black;">Thùng rác</h1>
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Cầu Thủ</th>
            <th scope="col">Ngày Sinh</th>
            <th scope="col">Quốc Gia</th>
            <th scope="col">Ảnh</th>

    </thead>
    <tbody>
        @foreach($softs as $key => $soft)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $soft->name }}</td>
            <td>{{ $soft->date }}</td>
            <td>{{ $soft->team->name }}</td>
            <td>
                <img src="{{ asset($soft->image)}}" alt="" width="90px" height="90px">
            </td>
            <td>
                <a href="{{route('players.restore',[$soft->id])}}" class="btn btn-warning">Khôi phục</a>
                <a href="{{route('players.deleteforever',[$soft->id])}}" onclick="return confirm('Bạn có chắc chắn xóa vĩnh viễn không?');" class="btn btn-secondary">Xóa vĩnh viễn</a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<a href="{{ route('players.index') }}" class="btn btn-info">Trở lại</a> <br>
@endsection