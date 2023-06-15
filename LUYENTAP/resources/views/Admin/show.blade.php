<table class="table" border="1">
    <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">TEN</th>
            <th scope="col">EMAIL</th>
            <th scope="col">PASSWORD</th>
            <th scope="col">NGAY TAO</th>
            <th scope="col">NGAY CAP NHAT</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <!-- <th scope="row">1</th> -->
            <td> {{ $usershow->id }} </td>
            <td>{{ $usershow->username }}</td>
            <td>{{ $usershow->email }}</td>
            <td>{{ $usershow->password }}</td>
            <td>{{ $usershow->created_at }}</td>
            <td>{{ $usershow->updated_at }}</td>
        </tr>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


