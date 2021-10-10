<?php
require './config/config.php';

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    $password_confim = md5($_POST['password_confirmation']);
    $phone = $_POST['phone'];
    $sql = "SELECT * FROM users WHERE name='$login'";
    $login_result = mysqli_query($link, $sql);
    $sql = "SELECT * FROM users WHERE name='$phone'";
    $tel_result = mysqli_query($link, $sql);
    if ($password == $password_confim && $login_result == 0 && $tel_result == 0) {
        $sql = "INSERT INTO `users` (`name`, `password`, `phone`) VALUES ('$login', '$password', '$phone');";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo "<script>alert('Coś poszło źle.')</script>";
        } else {
            echo "<script>alert('Zarejestrowano.')</script>";
        }
    } else {
        echo "<script>alert('Hasła nie są identyczne, albo podane dane juz istnieją w bazie.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./tailwind.css" rel="stylesheet" />
</head>

<body>
    <?php require "./components/header.php"; ?>
    <section style="background-image: url('./assets/cinema.png')" class="bg-no-repeat bg-center h-screen w-full flex justify-center items-center bg-cover">
        <div class="bg-white rounded-md p-10">
            <h1 class="text-3xl">Rejestracja</h1>
            <p>Wypełnij ten formularz aby się zarejestrować</p>
            <form method="POST" class="flex flex-col justify-center mt-3">
                <label for="login" class="text-lg">Login</label>
                <input type="text" name="login" class="rounded-md border-solid border-2 border-grey-200 p-2" />
                <label for="password" class="text-lg">Hasło</label>
                <input type="password" name="password" class="rounded-md border-solid border-2 border-grey-200 p-2" />
                <label for="password_confirmation" class="text-lg">Potwierdź hasło</label>
                <input type="password" name="password_confirmation" class="rounded-md border-solid border-2 border-grey-200 p-2" />
                <label for="phone" class="text-lg">Telefon</label>
                <input type="tel" name="phone" class="rounded-md border-solid border-2 border-grey-200 p-2" />
                <input name="submit" type="submit" class="rounded-md w-24 p-3 bg-blue-600 text-white mt-3" />
            </form>
            <p class="mt-3">Masz już konto? <a href="/kino/login.php" class="text-blue-600">Zaloguj się</a></p>
        </div>
    </section>
    <?php require "./components/footer.php"; ?>
</body>

</html>