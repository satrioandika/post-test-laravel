<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .form-container {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #007bff;
        }

        h1 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="form-container mt-5">
        <h1><b>Edit Produk</b></h1>
        <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode">Kode Produk:</label>
                <input type="text" id="kode" name="kode" value="{{ $product->kode }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="name">Nama Produk:</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="stock">Stok:</label>
                <input type="number" id="stock" name="stock" value="{{ $product->stock }}" class="form-control" required>
            </div>

            <button class="btn btn-primary" type="submit" style="align-items: center;">Simpan</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary" style="text-align: center;">Kembali</a>
        </form>
    </div>
</body>
</html>
