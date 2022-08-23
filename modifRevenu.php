<?php

include('database.php');

if (isset($_GET['edite'])) {

    $id = $_GET['edite'];

    $req = $connexion->query("SELECT * FROM revenus Where id_revenus = '$id'");
    $var = $req->fetchAll();
    foreach ($var as $key => $value) {
        $id = $value['id_revenus'];
        $intitule = $value['intitule'];
        $montant = $value['montant'];
    }
}

if (isset($_POST['modif'])) {
    $id = $_GET['edite'];
    $req = $connexion->prepare("UPDATE revenus SET intitule=:intitule, montant=:montant WHERE id_revenus = $id LIMIT 1");

    $req->bindValue(':intitule', $_POST['intitule'], PDO::PARAM_STR);
    $req->bindValue(':montant', $_POST['montant'], PDO::PARAM_STR);
    $executeIsOk = $req->execute();
    if ($executeIsOk) {
        echo '<script language="javascript">';
        echo 'alert("Depense modifiée avec succès")';
        echo '</script>';

        header('location:index.php');
    } else {
        echo '<script language="javascript">';
        echo 'alert("Erreur lors de la modification")';
        echo '</script>';
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

        <section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                        </div>
                        <div class="row gx-5 justify-content-center  ">
                            <div class="col-lg-8 col-xl-6 ">
                                <div class="dropdown row gx-5 justify-content-center">


                                    <form method="POST">
                                        <!-- Name input-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="hidden" value="<?php echo $id;  ?>" name="idRev" placeholder="Enter your name..." required />
                                            <label for="name"></label>

                                        </div>


                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" value="<?php echo ($intitule);  ?>" name="intitule" placeholder="Enter your name..." required />
                                            <label for="name">Intitule</label>

                                        </div>
                                        <!-- Montant input-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" value="<?php echo ($montant); ?>" name="montant" placeholder="Entrer l'intitule..." required />


                                            <label for="name">Montant</label>
                                        </div>



                                        <!-- Submit Button-->
                                        
                                        <div class="d-grid"><button class="btn btn-warning btn-lg " name="modif" type="submit">Modifier revenu</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>