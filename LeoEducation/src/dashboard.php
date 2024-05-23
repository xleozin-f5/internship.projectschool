<?php
session_start();

if (!isset($_SESSION["role"])) {
    header("Location: ./public/login.php");
    exit();
}

$role = $_SESSION["role"];
$name = isset($_SESSION["name"]) ? $_SESSION["name"] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Incluindo Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css">
</head>
<body>
    <div class="container">
        <h2>Welcome <?php echo ucfirst($role); ?> <?php echo $name; ?></h2>
        <p>Welcome back to your dashboard.</p>

        <!-- Navbar usando Bootstrap -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Menu</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <?php if ($role == 'admin'): ?>
                        <li class="nav-item"><a class="nav-link" href="#">Gerenciamento de Usuários</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Relatórios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Configurações da Escola</a></li>
                    <?php elseif ($role == 'teacher'): ?>
                        <li class="nav-item"><a class="nav-link" href="#">Gerenciamento de Turmas</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Upload de Notas</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Recursos Educacionais</a></li>
                    <?php elseif ($role == 'student'): ?>
                        <li class="nav-item"><a class="nav-link" href="#">Visualizar Notas</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Recursos de Estudo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Horário de Aulas</a></li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link text-danger" href="../public/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Incluindo Bootstrap JS e dependências -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
