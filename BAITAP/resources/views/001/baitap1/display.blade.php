<form method="post" action="">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Product Description</label>
        <input type="text" class="form-control" name="productDescription" >
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">List Price</label>
        <input type="text" class="form-control" name="price">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Discount Percent</label>
        <input type="text" class="form-control" name="discountPercent" >
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>