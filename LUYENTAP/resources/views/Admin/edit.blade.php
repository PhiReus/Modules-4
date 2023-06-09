<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <form action="{{ route('users.update',[$users->id]) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="exampleInputEmail1">TEN</label>
          <input type="text" class="form-control" value="{{ $users->username }}" name="username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">EMAIL</label>
          <input type="text" class="form-control" value="{{ $users->email }}" name="email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="text" class="form-control" value="{{ $users->password }}" name="password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">NGAY THEM MOI</label>
          <input type="text" class="form-control" value="{{ $users->created_at }}" name="created_at">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">NGAY CAP NHAT</label>
          <input type="text" class="form-control" value="{{ $users->updated_at }}" name="updated_at">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Quay lại</a>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>