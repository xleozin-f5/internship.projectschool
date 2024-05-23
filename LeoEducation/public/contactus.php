<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - LeoEducation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/contactus.css"> 
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../public/aboutus.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../public/contactus.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contact Us Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2>Contact Us</h2>
                    <form id="contactForm" method="post">
                        <div class="form-group">
                            <label for="reason">Reason for Report:</label>
                            <input type="text" class="form-control" id="reason" name="reason" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <?php
                    // Inclua o arquivo de conexão com o banco de dados
                    include '../inc/conectdb.php';

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Receber os dados do formulário
                        $reason = $_POST['reason'];
                        $date = date("Y-m-d"); // Obter data atual

                        // Inserir os dados na base de dados
                        $sql = "INSERT INTO Reports (date, reason) VALUES ('$date', '$reason')";

                        if ($conn->query($sql) === TRUE) {
                            $response_message = "<div class='alert alert-success mt-3' role='alert'>Report submitted successfully!</div>";
                        } else {
                            $response_message = "<div class='alert alert-danger mt-3' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                        }

                        // Fechar a conexão com o banco de dados
                        $conn->close();

                        echo $response_message; // Exibir a mensagem de resposta
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/contactus.js"></script>
</body>
</html>
