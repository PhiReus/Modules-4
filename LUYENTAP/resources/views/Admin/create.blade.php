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
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="inputEmail3">TEN</label>
            <input type="text" class="form-control" name="username">
          </div>
          <div class="form-group">
            <label for="inputPassword3">EMAIL</label>
            <input type="email" class="form-control" name="email">
          </div>
          <div class="form-group">
            <label for="inputPassword3">MK</label>
            <input type="text" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label for="inputPassword3">NGAY THEM</label>
            <input type="text" class="form-control" name="created_at">
          </div>
          <div class="form-group">
            <label for="inputPassword3">NGAY SUA</label>
            <input type="text" class="form-control" name="updated_at">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Sign in</button>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Quay lại</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
