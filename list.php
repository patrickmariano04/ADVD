<!-- PATRICK JANUEL MARIANO
    ALEXANDRA KYLE SERRANO
    WD - 302 -->
<!DOCTYPE html>
<html lang="en">
<?php


require_once "config.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <title>Restaurants</title>
    <link rel="icon" type="image/x-icon" href="assets/3448609.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
       
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="home.php">Restaurants</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-tarpo$_POST="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="list.php">List of Restaurants</a></li>
                </ul>
            </div>

        </div>

        </div>
    </nav>

    <header class="py-5">
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xxl-6">
                    <div class="text-center my-5">
                        <h1 class="fw-bolder mb-3">Check Some Restaurants</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="wrap">
        <form action="<?php $_PHP_SELF ?>" id="search" method="POST">
            <input id="search" name="search" type="text" placeholder="What're we looking for ?"><input name="search_submit" value="Rechercher" type="submit">
        </form>
    </div>

    <form class="box" method="POST">
        <button type="submit" name='button1' class="btn btn-outline-secondary">Brooklyn</button>
        <button type="submit" name='button2' class="btn btn-outline-secondary">Queens</button></a>
        <button type="submit" name='button3' class="btn btn-outline-secondary">Manhattan</button>
        <button type="submit" name='button4' class="btn btn-outline-secondary">Bronx</button>
        <button type="submit" name='button5' class="btn btn-outline-secondary">Staten Island</button>
        <button type="submit" name='button6' class="btn btn-outline-secondary">Best Quality</button>
    </form>


    <table class="table table-hover mt-50">

        <tr class="header">
            <th>Name</th>
            <th>Borough</th>
            <th>Cuisine</th>
            <th>Address</th>
            <th>Grades</th>
        </tr>

        <?php

        $cursor = $collection->find();
        // [], ["limit" => 10]

        if (isset($_POST['search'])) {
            $cursor = $collection->find(['$or' => [['name' => $_POST['search']], ['cuisine' => $_POST['search']]]]);
        }



        ?>
        <?php


        if (array_key_exists('button1', $_POST)) {
            $cursor = $collection->find(['borough' => 'Brooklyn']);
        }

        if (array_key_exists('button2', $_POST)) {
            $cursor = $collection->find(['borough' => 'Queens']);
        }

        if (array_key_exists('button3', $_POST)) {
            $cursor = $collection->find(['borough' => 'Manhattan']);
        }

        if (array_key_exists('button4', $_POST)) {
            $cursor = $collection->find(['borough' => 'Bronx']);
        }

        if (array_key_exists('button5', $_POST)) {
            $cursor = $collection->find(['borough' => 'Staten Island']);
        }

        if (array_key_exists('button6', $_POST)) {
            $cursor = $collection->find(['grades.score' => ['$gt' => 90]]);
        }




        ?>

        <?php foreach ($cursor as $document) { ?>


            <tr>
                <td><?php echo $document['name']; ?></td>
                <td><?php echo $document['borough']; ?></td>
                <td><?php echo $document['cuisine']; ?></td>




                <td class="add">

                    <p><?php echo $document['address']['building']; ?></p>
                    <p><?php echo $document['address']['street']; ?></p>
                    <p><?php echo $document['address']['zipcode']; ?></p>

                </td>


                <td class="gra">
                    </p>
                    <?php echo $document['grades'][0]['date'];  ?>
                    </p>
                    <p>
                        <?php echo $document['grades'][0]['grade']; ?>
                    </p>
                    <p>
                        <?php echo $document['grades'][0]['score']; ?>
                    </p>
                </td>
            </tr>

        <?php } ?>

    </table>

    </main>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>