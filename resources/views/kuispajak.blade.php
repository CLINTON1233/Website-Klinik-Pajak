<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #fff;
        }

        .quiz-container {
            max-width: 600px;
            margin: 10% auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #289C5E;
            color: #fff;
            padding: 10px 20px;
            margin: 15px 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #4FA2DE;
        }
    </style>
</head>

<body>
    @include('layout.navbar4')
    <div class="quiz-container">
        <div class="card"><br>
            <h3 class="text-center">Selamat Datang</h3>
            <p class="text-center">Selamat mengerjakan, jangan lupa berdoa dulu.</p>
            <form id="quiz-form" action="{{ route('quiz.page') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required pattern="[A-Za-z\s]+" title="Nama harus terdiri dari huruf saja" />
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required />
                </div>
                <div class="d-flex justify-content-center">
                    <button class="text-center" type="submit">Mulai</button>
                </div>
            </form>
        </div>
    </div>
    @include('layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qm1uZY5ZsDJPXyMN1Xy2PyoEzNLC6rZ2y5+KZ8+FfqM7LTzh8DP4I4BYIkQ1L/s" crossorigin="anonymous"></script>
</body>

</html>