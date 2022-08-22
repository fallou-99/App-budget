<?php

//connexion à la base de donnée//
include('database.php');

//verification de l'envoie du formulaire//

if (isset($_POST['submitDepense'])) {

    $intitule = $_POST['intitule'];
    $montant = $_POST['montant'];


    // Insertion depenses //


    $req = $connexion->prepare('INSERT INTO depenses(intitule, montant) VALUES (:intitule, :montant)');
    $req->bindvalue(':intitule', $intitule);
    $req->bindvalue(':montant', $montant);

    $resultat = $req->execute();

    if ($resultat) {
        echo '<script language="javascript">';
        echo 'alert("Dépense ajoutée avec succès")';
        echo '</script>';
    } else {
        echo "Erreur lors de l'insertion";
    }
}



//verification de l'envoie du formulaire//

if (isset($_POST['submitRevenu'])) {

    $intitule = $_POST['intitule'];
    $montant = $_POST['montant'];


    // Insertion depenses //


    $req = $connexion->prepare('INSERT INTO revenus(intitule, montant) VALUES (:intitule, :montant)');
    $req->bindvalue(':intitule', $intitule);
    $req->bindvalue(':montant', $montant);

    $resultat = $req->execute();

    if ($resultat) {
        echo '<script language="javascript">';
        echo 'alert("Revenu ajouté avec succès")';
        echo '</script>';
    } else {
        echo "Erreur lors de l'insertion";
    }
}













?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Yaxanale</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html">Yaxanale</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.html">Depenses</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">Revenus</a></li>

                    </ul>
                    </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->


        <!-- Formulaire-->
        <section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <?php
                            $req = $connexion->query('SELECT SUM(montant) AS montant FROM depenses ');

                            while ($depenses = $req->fetch()) {
                            ?>
                                <?php
                                $req1 = $connexion->query('SELECT SUM(montant) AS montant FROM revenus ');

                                while ($revenus = $req1->fetch()) {
                                ?>


                                    <div><button type="button" class="btn btn-primary"><?php echo ($depenses['montant']); ?></button>
                                        <button type="button" class="btn btn-dark"><?php   ?></button> <button type="button" class="btn btn-warning"><?php echo ($revenus['montant']); ?></button>
                                    </div>


                                <?php
                                }
                                ?>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="row gx-5 justify-content-center  ">
                            <div class="col-lg-8 col-xl-6 ">
                                <div class="dropdown row gx-5 justify-content-center">
                                    <button type="button" class="btn btn-primary dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                        Ajouter depenses ou revenus
                                    </button>

                                    <!-- * * * * * * * * * * * * * * *-->
                                    <!-- * * SB Forms Contact Form * *-->
                                    <!-- * * * * * * * * * * * * * * *-->
                                    <!-- This form is pre-integrated with SB Forms.-->
                                    <!-- To make this form functional, sign up at-->
                                    <!-- https://startbootstrap.com/solution/contact-forms-->
                                    <!-- to get an API token!-->


                                    <form method="POST" class="dropdown-menu p-4">
                                        <!-- Name input-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="intitule" placeholder="Enter your name..." required />
                                            <label for="name">Intitule</label>

                                        </div>
                                        <!-- Montant input-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="montant" placeholder="Entrer l'intitule..." required />


                                            <label for="name">Montant</label>
                                        </div>



                                        <!-- Submit Button-->
                                        <div class="d-grid"><button class="btn btn-primary btn-lg " name="submitDepense" type="submit">Ajouter depense</button></div> <br>
                                        <div class="d-grid"><button class="btn btn-warning btn-lg " name="submitRevenu" type="submit">Ajouter revenu</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial section-->

        <!-- Blog preview section-->
        <section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">

                            <h1 class="fw-bolder">Liste des depenses </h1>
                            <p class="lead fw-normal text-muted mb-0">Lister vos depenses en temps réels</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <table class="table table-bordered   table-borderless ">


                                    <thead>
                                        <tr class="text-center">

                                            <th class="bg-primary" scope="col">Intitule</th>
                                            <th class="bg-primary" scope="col">Montant</th>
                                            <th scope="col" class="bg-primary">Action</th>

                                        </tr>
                                    </thead>


                                    <tbody>

                                        <?php

                                        $req = $connexion->query('SELECT * FROM depenses ORDER BY id DESC LIMIT 5');

                                        while ($depenses = $req->fetch()) {





                                        ?>
                                            <tr class="text-center">




                                                <td><?php echo ($depenses['intitule']); ?></td>
                                                <td><?php echo ($depenses['montant']); ?></td>





                                                <td>
                                                    <a href="supDepenses.php?id=<?php echo ($depenses['id']); ?>"><button href name="supprimer" type="button" class="btn btn-danger"> Supprimer</button></a>
                                                    <button name="modifier" type="button" class="btn btn-info">Modifier</button>
                                                </td>








                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

        </section>
        <section class="py-5 " id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">


                            <h1 class="fw-bolder">Liste des Revenus </h1>
                            <p class="lead fw-normal text-muted mb-0">Lister vos revenus en temps réels</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <table class="table table-bordered   table-borderless ">


                                    <thead>
                                        <tr class="text-center">

                                            <th class="bg-warning" scope="col">Intitule</th>
                                            <th class="bg-warning" scope="col">Montant</th>
                                            <th scope="col" class="bg-warning">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $req = $connexion->query('SELECT * FROM revenus ORDER BY id_revenus DESC LIMIT 5');

                                        while ($revenus = $req->fetch()) {
                                        ?>
                                            <tr class="text-center">

                                                <td><?php echo ($revenus['intitule']); ?></td>
                                                <td><?php echo ($revenus['montant']); ?></td>

                                                <td>
                                                    <a href="supRevenus.php?id=<?php echo ($revenus['id_revenus']); ?>"><button name="supprimer" type="button" class="btn btn-danger">Supprimer</button></a>
                                                        <button name="modifier" type="button" class="btn btn-info">Modifier</button>
                                                </td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Sen@ Dev 2022</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>