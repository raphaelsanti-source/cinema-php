<?php
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
    <section class="max-w-6xl mx-auto px-4 py-4">
        <?php
        require './config/config.php';
        $sql = 'SELECT movies.id, movies.title, movies.director, movies.description, movies.image, generes.name as "genere" FROM movies INNER JOIN generes ON movies.genere = generes.id;';
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="flex flex-row mb-5">
                    <img class="h-96 w-60" src="' . $row['image'] . '" alt="' . $row['title'] . '">
                    <div class="ml-5 p-5">
                        <h2 class="text-2xl mb-4">' . $row['title'] . '</h2>
                        <h3 class="mb-2">' . $row['genere'] . '</h3>
                        <p class="mb-2">' . $row['description'] . '</p>
                        <a href="/kino/reserve.php?id=' . $row['id'] . '" class="p-3 bg-blue-600 text-white rounded-md">Rezerwuj</a>
                    </div>
                </div>';
        }
        ?>
    </section>
    <?php require "./components/footer.php"; ?>
</body>

</html>