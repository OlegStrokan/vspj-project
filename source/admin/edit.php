
<?php 
require("session.php");
$sql = "SELECT userid, username, jmeno, prijmeni, email, role.nazev FROM users INNER JOIN role ON users.role = role.id_role WHERE userid = '".$_GET['id']."'";
$result = mysqli_query($connection, $sql);
$r = mysqli_fetch_assoc($result);

$sql_role = "SELECT * FROM role";
$result_role = mysqli_query($connection, $sql_role);

if(isset($_POST['userid'])){
$sql_update = "UPDATE users SET username = '".$_POST['username']."', jmeno = '".$_POST['jmeno']."', prijmeni = '".$_POST['prijmeni']."', email = '".$_POST['email']."', role = '".$_POST['select_role']."' WHERE userid = '".$_POST['userid']."' ";
$result_update = mysqli_query($connection, $sql_update);

echo("<meta http-equiv='refresh' content='1'>");    
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
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
        <h2>Úprava profilu</h2>

        <form method="post" action="" enctype="multipart/form-data">
            <label>ID</label>
            <br>
            <input class="form-group form-control" type="text" name="userid" value="<?php echo $r['userid'];?>" readonly="true" />
            <br>
            <label>Jméno</label>
            <br>
            <input class="form-group form-control" type="text" name="jmeno" value="<?php echo $r['jmeno']; ?>" />
            <br>
            <label>Příjmení</label>
            <br>
            <input class="form-group form-control" type="text" name="prijmeni" value="<?php echo $r['prijmeni'];?>" />
            <br>
            <label>Username</label>
            <br>
            <input class="form-group form-control" type="text" name="username" value="<?php echo $r['username'];?>" />
            <br>
            <label>E-mail</label>
            <br>
            <input class="form-group form-control" type="text" name="email" value="<?php echo $r['email'];?>" />
            <br>
            
            
            <label>Role</label>
            <br>
            
             <select class="form-group form-control" name="select_role" style="width: 15%; margin-left: 5%;">
                <?php while($r = mysqli_fetch_assoc($result_role)){?>
                <option value="<?php echo $r['id_role'];?> "> <?php echo $r['nazev']; ?></option>    
                <?php } ?>
            </select>
            
            <br>
           <button class="btn btn-danger" type="submit">Úpravit</button>
        </form>
    </div>
</div>
</body>

</html>
