<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
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
        <h1><b>Edit Tugas</b></h1>
        <form action="{{ route('tasks.update', ['id' => $tugas->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul_tugas">Judul Tugas:</label>
                <input type="text" id="judul_tugas" name="judul_tugas" value="{{ $tugas->judul_tugas }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" required>{{ $tugas->deskripsi }}</textarea>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ $tugas->tanggal }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="">Pilih Status</option>
                    <option value="tunda">tunda</option>
                    <option value="progress">progress</option>
                    <option value="selesai">selesai</option>
                </select>
            </div>

            <div class="form-group">
                <label for="user_id">ID User:</label>
                <input type="number" id="user_id" name="user_id" value="{{ $tugas->user_id }}" class="form-control" required>
            </div>

            <button class="btn btn-primary" type="submit" style="align-items: center;">Simpan</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary" style="text-align: center;">Kembali</a>
        </form>
    </div>
</body>
</html>
