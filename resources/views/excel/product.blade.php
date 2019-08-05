<table>
    <tr>
        <th>#</th>
        <th>Kategori</th>
        <th>Nama Produk</th>
        <th>Harga</th
    </tr>
    @foreach($product as $c)
    <tr>
        <td>{{ $loop->index + 1}}</td>
        <td>{{optional($c->category)->name}}</td>
        <td>{{$c->name}}</td>
        <td>Rp. {{number_format($c->price, 0, ',', '.')}}</td>
    </tr>
    @endforeach
</table>