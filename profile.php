<?php
require './config/config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
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
    <section class="max-w-6xl mx-auto px-4 h-screen py-4">
        <h1 class="text-xl mb-5"><?php echo 'Witaj, ' . $_SESSION['name']; ?></h1>
        <h2>Twoje rezerwacje</h2>
        <table>
            <thead>
                <tr>
                    <th>Film</th>
                    <th>Miejsce</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $urs_id = $_SESSION['username'];
                $sql = "SELECT tickets.seat, movies.title AS 'movie' FROM tickets INNER JOIN movies ON tickets.movie = movies.id WHERE tickets.user='$urs_id';";
                $result = mysqli_query($link, $sql);
                //var_dump($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                            <td>' . $row['movie'] . '</td>
                            <td>' . $row['seat'] . '</td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>
    </section>
    <?php require "./components/footer.php"; ?>
</body>

</html>