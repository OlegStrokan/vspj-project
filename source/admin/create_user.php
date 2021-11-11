
<?php 
require("session.php");

$sql1 = "SELECT id_role, nazev FROM role";
$result1 = mysqli_query($connection, $sql1);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $jmeno = $_POST['jmeno'];
    $prijmeni = $_POST['prijmeni'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql2 = "INSERT INTO users(username, jmeno, prijmeni, password, email, role) VALUES ('$username', '$jmeno', '$prijmeni', '$password', '$email', '$role')";
    $result2 = mysqli_query($connection, $sql2);
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
 <title>Administrator</title>
  <link rel="shortcut icon" href="../images/favicon.ico" type="image/ico">
</head>
    
<body>
<div class="container">
    <div><a href="http://logos-polytechnikos.great-site.net/index.php"><img src="../images/logo.png" alt="LOGOS POLYTECHNIKOS"></a></div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./index.php">ADMIN</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="users.php">Uživatelé</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profil
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item disabled" href="#"><strong>Užívatel: </strong>
                                    <?php echo $_SESSION['login_user']; ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Odhlásit se</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
    
    <div class="nahled">
        <h2>Vytvořit uživatele</h2>
        
        <form method="POST" action="" enctype="multipart/form-data">
                <label>Jméno</label>
                <input class="form-group form-control" type="text" class="form-group" name="jmeno" required>
                <label>Příjmení</label>
                <input class="form-group form-control" type="text" class="form-group" name="prijmeni" required>
                <label>Uživatelské jméno</label>
                <input class="form-group form-control" type="text" class="form-group" name="username" required>
                <label>Heslo</label>
                <input class="form-group form-control" type="password" class="form-group" name="password" required>
                <label>E-mail</label>
                <input class="form-group form-control" type="email" class="form-group" name="email" required>
                <label>Role</label>
                <select class="form-group form-control" name="role">
                    <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
                    <option value=" <?php echo $row['id_role'];?> ">
                    <?php echo $row['nazev']; ?>
                    </option>
                    <?php } ?>
                </select>
                <button type="submit" name="submit" class="btn btn-danger" value="submit">Vytvořit</button>
        </form>
    </div>
</div>
</body>
