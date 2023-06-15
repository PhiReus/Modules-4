
@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .pagination li {
        margin: 0 5px;
        display: inline-block;
    }
    .pagination a {
        color: #333;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #ccc;
    }
    .pagination a.active {
        background-color: #333;
        color: #fff;
    }
</style>
<h1 class="offset-4">Danh sách caau thu</h1>
<main class="page-content">
        <div class="container">
            <table class="table">
                <div class="col-6">
                    <!-- <form class="navbar-form navbar-left" action="{{route('players.search')}}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search...">
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-info">Tìm kiếm</button>
                            </div>
                        </div>
                    </form> -->
                <a href="{{ route('players.create') }}" class="btn btn-primary">Thêm mới</a>

                    </form>
                </div>
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên Cầu Thủ</th>
                        <th scope="col">Ngày Sinh</th>
                        <th scope="col">Quốc Gia</th>
                        <th scope="col">Ảnh</th>

                        <th adta-breakpoints="xs">Quản lí</th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    @foreach ($players as $key => $player)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->date }}</td>
                            <td>{{ $player->team->name }}</td>
                            <td><img width="90px" height="90px" src="{{ asset($player->image) }}" alt=""></td>
                            <td>  
                                <form  action="{{ route('players.destroy', $player->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-success" href="{{ route('players.edit', $player->id) }}" class="btn btn-primary">Sửa</a>
                                    <a class="btn btn-success" href="{{ route('players.show',$player->id) }}"class="btn btn-primary">Chi tiết</a>
                                     <button type="submit" class="btn btn-danger"
                                      onclick="return confirm('Chuyễn vào thùng rác')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $players->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </main>
    @endsection