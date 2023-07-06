<main class="page-content">
    <div class="container">
        <a href="{{ route('spendings.create') }}" class="btn btn-primary">Add new</a>
        <form action="{{ route('spendings.search') }}" method="GET"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    name="search" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm">Search</i>
                    </button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class='w-5'>ID</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">DATE</th>
                    <th scope="col">PRICE</th>
                    <th adta-breakpoints="xs">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp

                @foreach ($spendings as $key => $spending)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $spending->category }}</td>
                        <td>{{ $spending->date }}</td>
                        <td>{{ str_replace(',', '.', number_format(floatval($spending->price))) . ' VND' }}</td>
                        <td>
                            <form action="{{ route('spendings.destroy', $spending->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('spendings.edit', $spending->id) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('spendings.show', $spending->id) }}"
                                    class="btn btn-info btn-sm">See</a>
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có muốn xóa ?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $total += floatval(str_replace(',', '.', $spending->price));
                    @endphp
                @endforeach
                <tr>
                    <th colspan="3" class="text-right"><strong><em>Tổng tiền đã chi tiêu:</em></strong></th>
                    <td><strong><em>{{ str_replace(',', '.', number_format(floatval($total))) . ' VND' }}</em></strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="card-footer">
            <nav class="float-right">
                {{ $spendings->appends(request()->query())->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    </div>
</main>

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
