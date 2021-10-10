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
    <style>
        .seat {
            height: 20px;
            width: 20px;
            border: 1px solid black;
            margin: 1px;
        }

        #seats {
            height: 440px;
            width: 330px;
        }
    </style>
</head>

<body>
    <?php require "./components/header.php"; ?>
    <section class="max-w-6xl mx-auto px-4 py-4 flex flex-col items-center justify-center">
        <h2 class="text-lg">Wybierz miejsca:</h2>
        <div id="seats" class="flex flex-wrap">

        </div>
        <button id="rsv-btn" class="bg-blue-600 text-white p-3 rounded-md mt-5">Rezerwuj</button>
    </section>
    <script id="reserve" src="./js/reserve.js" movie_id="<?php echo $_GET['id'] ?>" user_id="<?php echo $_SESSION['username']; ?>"></script>
    <?php require "./components/footer.php"; ?>
</body>

</html>