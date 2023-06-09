<a href="{{ route('users.create') }}" class="btn btn-primary">Them moi</a>
<table border="1" class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>TEN</th>
            <th>EMAIL</th>
            <th>MAT KHAU</th>
            <th>NGAY TAO</th>
            <th>NGAY CAP NHAT</th>
            <th>HANH DONG</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $users as $key => $user )
        <tr>
            <td> {{ $key+1 }} </td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td>

                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-success" href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Sửa</a>
                    <a class="btn btn-success" href="{{ route('users.show',$user->id) }}" class="btn btn-primary">Chi tiết</a>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <!-- {{$users->appends(request()->query())}} -->
</table>