<?php 
    $username = "";
    $email    = "";
    $errors = array(); 
    $db = mysqli_connect('sql310.epizy.com','epiz_27143130','dtt5x2mqJpnFg','epiz_27143130_logospolytechnikos');


    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        if ($password_1 != $password_2) {
            array_push($errors, "Hesla se neshoduji");
        }

        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
  
        if ($user) {
            if ($user['username'] === $username) {
            array_push($errors, "Uživatelské jméno již existuje");
            }

            if ($user['email'] === $email) {
            array_push($errors, "Email již existuje");
            }
        }

        if (count($errors) == 0) {
            $jmeno = $_POST['jmeno'];
            $prijmeni = $_POST['prijmeni'];
            $password = password_hash($password_1, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username, jmeno, prijmeni, password, email) VALUES('$username', '$jmeno', '$prijmeni','$password', '$email')";
            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Nyni jste prihlaseni";
            header('location: ../index.php');
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registrace Uzivatele</title>
  <link rel="stylesheet" href="./style/style.css">
  <link rel="shortcut icon" href="../images/favicon.ico" type="image/ico">
</head>
<body>
  <div class="header">
  	<h2>Registrace</h2>
  </div>
	
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  	<div class="input-group">
  	  <label>Login</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>" required>
  	</div>

    <div class="input-group">
  	  <label>Jmeno</label>
  	 <input type="text" name="jmeno" value="<?php echo $jmeno; ?>" required>
  	</div>

    <div class="input-group">
  	  <label>Přijmení</label>
  	  <input type="text" name="prijmeni" value="<?php echo $prijmeni; ?>" required>
  	</div>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>" required>
  	</div>

  	<div class="input-group">
  	  <label>Heslo</label>
  	  <input type="password" name="password_1" required>
  	</div>

  	<div class="input-group">
  	  <label>Opakujte heslo</label>
  	  <input type="password" name="password_2" required>
  	</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Registrovat</button>
  	</div>

      <div class="input-group">
  	  <a href="../index.php"><button type="button" class="btn" name="zpet">Zpět</button></a>
  	</div>
  </form>
    <br>
<?php  if (count($errors) > 0) : ?>
    <div class="error">
        <?php foreach ($errors as $error) : ?>
        <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php  endif ?>
</body>
</html>
