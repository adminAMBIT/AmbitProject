<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>404 Not Found</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #3498db;
            color: #fff;
        }

        .container {
            text-align: center;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .animated {
            animation: shake 0.5s ease-in-out infinite;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        button {
            background-color: #2980b9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2c3e50;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(-10px);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="animated">404 Not Found</h1>
        <p>Oops! The page you are looking for might be in another galaxy.</p>
        <button onclick="goBack()">Go Back</button>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>