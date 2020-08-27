<?php

require "../database.php";
require "../src/PostRepository.php";

$result = new PostRepository($pdo);
$results = $result->searchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Simple Blog with PHP</title>
</head>

<body>

    <header class="container-xl mt-3 banner"></header>
    <h1 class="container-xl mt-3 p-2 main">Administrative page</h1>


    <nav class="container-xl mt-3 p-2 main navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="nav navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
        </ul>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
            </li>

        </ul>
    </nav>

    <div class="container-xl d-flex justify-content-center mt-2 ">
        <button class="btn btn-success">Add article</button>
    </div>

    <?php foreach ($results as $result) : ?>
        <div class="container-xl mt-3 title-post-admin">
            <a href="#"><?php echo $result['name_title']; ?></a>
            <div class="d-flex justify-content-center">
                <a class="btn btn-info m-2" href="edit.php?id=<?php echo $result['id']; ?>"> Edit </a>
                <a class="btn btn-danger m-2" href="delete.php?id=<?php echo $result['id']; ?>"> Delete </a>
            </div>
        </div>
    <?php endforeach; ?>


    <footer class="container-xl mt-3">Copyright 2020 Simple Blog with PHP</footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>