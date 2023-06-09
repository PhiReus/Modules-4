<form action="{{ route('customers.store') }}" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Teen</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">sdt</label>
    <input type="text" class="form-control" name="sdt">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">email</label>
    <input type="text" class="form-control" name="email">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>