<h1>Tambah Produk Seafood</h1>

<form action="{{ route('products.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <!-- Nama Produk -->
    <label for="name">
        Nama Produk
    </label>

    <input type="text"
           id="name"
           name="name"
           placeholder="Contoh: Udang Vaname Segar">


    <!-- Deskripsi Produk -->
    <label for="description">
        Deskripsi Produk
    </label>

    <textarea id="description"
              name="description"
              placeholder="Jelaskan detail produk seafood seperti kualitas, ukuran, kondisi, atau informasi tambahan lainnya"></textarea>


    <!-- Harga Produk -->
    <label for="price">
        Harga Produk
    </label>

    <input type="number"
           id="price"
           name="price"
           placeholder="Contoh: 50000">


    <!-- Stok Produk -->
    <label for="stock">
        Jumlah Stok
    </label>

    <input type="number"
           id="stock"
           name="stock"
           placeholder="Contoh: 20">


    <!-- Asal Daerah Produk -->
    <label for="origin_region">
        Asal Daerah
    </label>

    <input type="text"
           id="origin_region"
           name="origin_region"
           placeholder="Contoh: Banyuwangi">


    <!-- Kategori Produk -->
    <label for="category_id">
        Kategori Produk
    </label>

    <select id="category_id"
            name="category_id">

        @foreach($categories as $category)

            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>

        @endforeach

    </select>


    <!-- Upload Gambar -->
    <label for="image">
        Gambar Produk
    </label>

    <input type="file"
           id="image"
           name="image">


    <!-- Tombol Submit -->
    <button type="submit">
        Simpan Produk
    </button>

</form>