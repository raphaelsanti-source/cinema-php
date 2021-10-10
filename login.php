<?php
require './config/config.php';

session_start();

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    // var_dump($password);
    $sql = "SELECT * FROM users WHERE name='$login' AND password='$password' ";
    $result = mysqli_query($link, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        header("Location: profile.php");
    } else {
        echo "<script>alert('Nieprawidłowe hasło lub login.')</script>";
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
            <h1 class="text-3xl">Logowanie</h1>
            <p>Wypełnij ten formularz aby się zalogować.</p>
            <form method="POST" class="flex flex-col justify-center mt-3">
                <label for="login" class="text-lg">Login</label>
                <input type="text" name="login" class="rounded-md border-solid border-2 border-grey-200 p-2" />
                <label for="password" class="text-lg">Hasło</label>
                <input type="password" name="password" class="rounded-md border-solid border-2 border-grey-200 p-2" />
                <input name="submit" type="submit" class="rounded-md w-24 p-3 bg-blue-600 text-white mt-3" />
            </form>
            <p class="mt-3">Nie masz jeszcze konta? <a href="/kino/register.php" class="text-blue-600">Zarejestruj się</a></p>
        </div>
    </section>
    <?php require "./components/footer.php"; ?>
</body>

</html>