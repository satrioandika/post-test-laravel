<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px;
            font-family: 'Montserrat', 'Poppins', sans-serif;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navbar-nav {
            margin-left: auto;
            margin-right: 80px;
            padding-right: 10px;
        }

        .nav-link {
            color: #fff;
        }

        .nav-item {
            flex: end;
        }

        .nav-link:hover {
            color: wheat;
        }

        @media (min-width: 768px) {
            body {
                padding-top: 70px;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">UT Training - Laravel PHP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/tasks/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tasks">Data Tugas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tasks">Siswa</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
