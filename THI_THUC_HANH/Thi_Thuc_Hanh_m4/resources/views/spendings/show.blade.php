<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

<!-- Hiển thị chi tiết cầu thủ hiện tại -->
<table class="table" border="1">
    <thead class="thead-dark">
        <tr>
            <th scope="col" class='w-5'>ID</th>
            <th scope="col">category</th>
            <th scope="col">DATE</th>
            <th scope="col">PRICE</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $spending->id }}</th>
            <td>{{ $spending->category }}</td>
            <td>{{ $spending->date }}</td>
            <td>{{ str_replace(',', '.', number_format(floatval($spending->price))) . ' VND' }}</td>

        </tr>
    </tbody>
</table>
<button class="btn btn-dark" onclick="window.history.back()">
    <i class="fa fa-arrow-left mr-2"></i> Back
</button>
