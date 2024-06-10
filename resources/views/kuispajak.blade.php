
<head>
<title>Kuis</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
		.quiz-container {
    max-width: 600px;
    margin: 0 auto;
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

.quiz-container {
    max-width: 600px;
    margin: 10% auto;
    padding: 20px;
}

    </style>
	
</head>

@include ('layout.navbar4')

<body>
    
    <div class="quiz-container">
        <h1>Selamat Datang</h1>
		<p>Selamat mengerjakan, jangan lupa berdoa dulu.</p>
        <form id="quiz-form" action="submit_quiz.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required pattern="[A-Za-z\s]+" title="Nama harus terdiri dari huruf saja" />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
            </div>
            <!-- Tambahkan pertanyaan-pertanyaan kuis di sini -->
            <button type="submit">Submit</button>
        </form>
    </div>
    
    @include('layout.footer')
