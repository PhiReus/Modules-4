<form action="{{ route('spendings.update', $spending->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="category">CATEGORY</label>
        <select class="form-control" name="category" id="category">
            <option value="Du lịch" @if ($spending->category == 'Du lịch') selected @endif>Du lịch</option>
            <option value="Shopping" @if ($spending->category == 'Shopping') selected @endif>Shopping</option>
            <option value="Ăn uống" @if ($spending->category == 'Ăn uống') selected @endif>Ăn uống</option>
            <option value="Xem phim" @if ($spending->category == 'Xem phim') selected @endif>Xem phim</option>
            <option value="Phone" @if ($spending->category == 'Phone') selected @endif>Phone</option>
        </select>
        @error('category')
            <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">DATE</label>
        <input type="date" class="form-control" placeholder="date" value="{{ $spending->date }}" name="date" max="{{ date('Y-m-d') }}">
        @error('date')
            <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">PRICE</label>
        <input type="text" class="form-control" placeholder="price" value="{{ $spending->price }}" name="price" pattern="^[0-9]+$">
        @error('price')
            <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('spendings.index') }}" class="btn btn-primary">Back</a>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
