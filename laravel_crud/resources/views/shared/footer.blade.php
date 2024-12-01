<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        footer {
            background-color: #000;
            color: white;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 15px 0;
            border-top: 1px solid #ccc;
        }

        .footer-content p {
            margin: 0;
        }
    </style>
</head>
<body>
    <footer>
        <div class="footer-content">
            <p class="col-md-4 mb-0 text-center">&copy; UT Training 2024</p>
        </div>
    </footer>
</body>
</html>
