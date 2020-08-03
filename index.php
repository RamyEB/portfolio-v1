<!DOCTYPE html>
<html>

<head>
    <title>El behedy Ramy | Curriculum vitæ </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- jQuery -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- CSS & JS -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="0">
    <nav class="navbar navbar-default navbar-expand-sm navbar-dark bg-light fixed-top">
        <div class="container-fluid ">
            <div class="navbar-header ml-auto">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavBar">
                    <span class="navbar-light navbar-toggler-icon "></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavBar">
                <ul class="nav navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">Moi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Compétences informatiques</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#education">Diplômes et Formations</a></li>
                    <li class="nav-item"><a class="nav-link" href="#experience">Expériences</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>

            </div>
        </div>
    </nav>


    <section id="about" class="container-fluid">
        <div class="col-xs-8 col-md-4 profile-picture">
        <div class="heading ">
            <h1 class="reveal-2" >Hello, moi c'est Ramy !</h1>
        </div>


            <img class="rounded-circle reveal-1" src="images/profile.jpg" alt="profile pic" width="300">
        </div>
        <div class="heading ">
            <h3 class="reveal-2">Étudiant en informatique</h3>
            <h5 class="reveal-3">Actuellement à la recherche d'un contrat d'apprentissage d'une durée allant de 2 à 3 ans dans le domaine de l'informatique</h5>            
            <a href="docs/CV novembre Alternance.pdf" class="button1 reveal-3">Télécharger CV</a>
        </div>

    </section>

    <section id="skills">
        <div class="red-divider"></div>
        <div class="heading">
            <h2>Compétences informatiques</h2>
        </div>
        <div class="container">
            <div class="row reveal-1">
                
                <div class="skillsCard col-md-6 col-xl-4">
                    <div class="card">
                        <h5 class="card-header bg-dark text-white">Front-End</h5>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Language</h5> -->
                            <p class="card-text">HTML, CSS, SASS</p>
                            <p class="card-text">JavaScript, jQuery</p>
                            <!-- <h5 class="card-title">Framework</h5> -->
                            <p class="card-text">ReactJS</p>
                            <p class="card-text">MaterialUi, Bootstrap</p>
                        </div>
                    </div>
                </div>


                <div class="skillsCard col-md-6 col-xl-4">
                    <div class="card">
                        <h5 class="card-header bg-dark text-white">Soft skills</h5>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Language</h5> -->
                            <p class="card-text">Curiosité<br>
                            Esprit d'équipe<br>
                            Sensibilité au design<br>
                            Rigeur<br>
                            Polyvalence<br>
                            Communication<br>
                            Adaptation</p>
                        </div>
                    </div>
                </div>

                <div class="skillsCard col-md-6 col-xl-4">
                    <div class="card">
                        <h5 class="card-header bg-dark text-white">Back-End</h5>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Language</h5> -->
                            <p class="card-text">PHP, C/C++, Shell, Python, Java, Bash, C#, ASP.NET</p>
                            <!-- <h5 class="card-title">Framework</h5> -->
                            <p class="card-text">Laravel, MVC</p>
                        </div>
                    </div>
                </div>

                
                <div class="skillsCard col-md-6 col-xl-4">
                    <div class="card">
                        <h5 class="card-header bg-dark text-white">Gestion de projet</h5>
                        <div class="card-body">
                            <h5 class="card-title">Versioning</h5>
                            <p class="card-text">Gitlab, GitHub, Bitbucket</p>
                            <h5 class="card-title">Communication et gestion de taches</h5>
                            <p class="card-text">Slack, JIRA, Trello</p>
                            <h5 class="card-title">Methode agile</h5>
                            <p class="card-text">UML, SCRUM</p>
                        </div>
                    </div>
                </div>

                <div class="skillsCard col-md-6 col-xl-4">
                    <div class="card">
                        <h5 class="card-header bg-dark text-white">Base de données</h5>
                        <div class="card-body">
                            <p class="card-text">MySQL, PostgreSQL</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="portfolio">
        <div class="white-divider"></div>
        <div class="heading">
            <h2>Portfolio</h2>
        </div>
        <div class="container-fluid reveal-1">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4">
                                    <a href="travel-agency/index.html" target="_blank">
                                        <img class="img-thumbnail" src="images/projects/travel.png">
                                        <div class='titleProject'>
                                            <h3><small>Front page agence de voyage</small></h3>
                                            <p>HTML - CSS</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <a href="/snake/index.html" target="_blank">
                                        <img class="img-thumbnail" src="images/projects/snake.png">
                                        <div class='titleProject'>
                                            <h3><small>Snake</small></h3>
                                            <p>JavaScript</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <a href="/top5actrices/index.html" target="_blank">
                                        <img class="img-thumbnail" src="images/projects/actrices.png">
                                        <div class='titleProject'>
                                            <h3><small>5 Actrices</small></h3>
                                            <p>HTML - CSS - jQuery</p>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4">
                                    <a href="https://github.com/RamyEB/matlab-histogramme-rgb" target="_blank">
                                        <img class="img-thumbnail" src="images/projects/matlab.png">
                                        <div class='titleProject'>
                                            <h3><small>Histogramme RGB</small></h3>
                                            <p>MATLAB</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <a href="aerow/index.php" target="_blank">
                                        <img class="img-thumbnail" src="images/projects/aerow.png">
                                        <div class='titleProject'>
                                            <h3><small>AEROW interface et BD</small></h3>
                                            <p>Site de gestion aéroportuaire</p>
                                            <p>HTML - CSS - PHP - SQL</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <a href="https://github.com/RamyEB/aerow-reseau" target="_blank">
                                        <img class="img-thumbnail" src="images/projects/aerow-reseau.png">
                                        <div class='titleProject'>
                                            <h3><small>AEROW réseau</small></h3>
                                            <p>Communication réseau entre tour de contrôle et avion</p>
                                            <p>C - SQL</p>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4">
                                    <a href="#portfolio" >
                                        <img class="img-thumbnail" src="images/projects/leaflet.png">
                                        <div class='titleProject'>
                                            <p>Projet en cours</p>
                                            <h3><small>Application web de tourisme</small></h3>
                                            <p>SASS - Bootstrap - Javascript - jQuery - AJAX - JSON - Leaflet - PHP - Laravel - SQL</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <a href="#portfolio" > 
                                        <img class="img-thumbnail" src="images/projects/java.png">
                                        <div class='titleProject'>
                                            <p>Projet en cours</p>
                                            <h3><small>Gestion projet informatique</small></h3>
                                            <p>Java - JUnit - Swing</p>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </section>


    <section id="education">
        <div class="red-divider"></div>

        <div class="heading">
            <h2>Diplômes et Formations</h2>
        </div>
        <div class="container">
            <div class="row reveal-1">
                <div class="col-sm-6 col-lg-4">
                    <div class="education-block">
                        <h5>2019-2020</h5>
                        <h4 class="bg-warning">En préparation</h4>
                        <img src="images/cap.png" width="50px">
                        <h3>Université de Cergy-Pontoise</h3>
                        <h4>Licence informatique</h4>
                        <div class="red-divider-inside"></div>
                        <p>Stage de 4 mois</p>
                        <p>Semestre 6 : Python, Gestion de projet</p>
                        <p>Semestre 5 : Infographie, Traitement Image</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="education-block">
                        <h5>Décembre 2019</h5>
                        <img src="images/diploma.png" width="50px">
                        <h3>Udemy</h3>
                        <h4>Formation Complète Développeur Web</h4>
                        <div class="red-divider-inside"></div>
                        <p>HTML, CSS, WordPress</p>
                        <p>JavaScript, jQuery, Bootstrap</p>
                        <p>PHP, MySQL</p>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="education-block">
                        <h5>2016-2018</h5>
                        <img src="images/cap.png" width="50px">
                        <h3>IUT de Villetaneuse <br> Université Sorbonne-Paris-Cité</h3>
                        <h4>DUT informatique</h4>
                        <div class="red-divider-inside"></div>
                        <h3>Cégép de Saint-Jean-Sur-Richelieu, Canada</h3>
                        <h4>Semestre 4 du DUT</h4>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="education-block">
                        <h5>Novembre 2017</h5>
                        <img src="images/diploma.png" width="50px">
                        <h3>IUT de Villetaneuse <br> Université Sorbonne-Paris-Cité</h3>
                        <h4>Certificat de compétences en langues de l'enseignement supérieur en anglais <br>(CLES)</h4>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="education-block">
                        <h5>2013-2016</h5>
                        <img src="images/cap.png" width="50px">
                        <h3>Lycée Georges Braque Argenteuil</h3>
                        <h4>Baccalauréat général Scientifique</h4>
                        <div class="red-divider-inside"></div>
                        <p>Spécialisation : ISN <br>(Informatique et sciences du numérique)</p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    
    <section id="experience">
        <div class="container">
            <div class="white-divider"></div>
            <div class="heading">
                <h2>Expérience professionelle</h2>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-timeline">

                        <div class="timeline reveal-1">
                            <div href="#" class="timeline-content">
                                <div class="timeline-year">
                                    <span>2020</span>
                                </div>
                                <div class="timeline-icon">
                                    <img class="rounded-circle" src="images/unlatch.png">
                                </div>
                                <div class="inner-content">
                                    <h3 class="title">Prévu : Unlatch</h3>
                                    <h3 class="title2">Stage : développeur Full Stack</h3>
                                    <h3 class="dateAndLocation">Paris | Mai à Août 2020</h3>
                                </div>
                            </div>
                        </div>

                        <div class="timeline reveal-1">
                            <div href="#" class="timeline-content">
                                <div class="timeline-year">
                                    <span>2019</span>
                                </div>
                                <div class="timeline-icon">
                                    <img class="rounded-circle" src="images/canada.png">
                                </div>
                                <div class="inner-content">
                                    <h3 class="title">IHR Télécom</h3>
                                    <h3 class="title2">Stage : développeur Full Stack</h3>
                                    <h3 class="dateAndLocation">Saint-Jean-Sur-Richelieu, Canada | Mars à Mai 2019</h3>
                                    <ul class="ulDescritpion">
                                        <li>
                                            <p class="description">
                                                Développement d'un logiciel ERP maison.
                                            </p>
                                        </li>
                                        <li>
                                            <p class="description">
                                                Familiarisation avec Laravel et ReactJS. </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="timeline reveal-1">
                            <div href="#" class="timeline-content">
                                <div class="timeline-year">
                                    <span>2018</span>
                                </div>
                                <div class="timeline-icon">
                                    <img class="rounded-circle" src="images/logo-fnac.jpg">
                                </div>
                                <div class="inner-content">
                                    <h3 class="title">FNAC</h3>
                                    <h3 class="title2">Vendeur</h3>
                                    <h3 class="dateAndLocation">Gennevilliers | Août 2018 à Janvier 2019 </h3>
                                    <ul class="ulDescritpion">
                                        <li>
                                            <p class="description">
                                                Vente de services et de produits techniques
                                            </p>
                                        </li>
                                        <li>
                                            <p class="description">
                                                Mise en place des opérations commerciales
                                            </p>
                                        </li>
                                        <li>
                                            <p class="description">
                                                Conseil adapté aux besoins du client
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="timeline reveal-1">
                            <div href="#" class="timeline-content">
                                <div class="timeline-year">
                                    <span>2017</span>
                                </div>
                                <div class="timeline-icon">
                                    <img class="rounded-circle" src="images/Lidl_Logo.png">
                                </div>
                                <div class="inner-content">
                                    <h3 class="title">Lidl</h3>
                                    <h3 class="title2">Employé Libre Service</h3>
                                    <h3 class="dateAndLocation">Montesson | Mai 2017 à Juillet 2018</h3>
                                    <ul class="ulDescritpion">
                                        <li>
                                            <p class="description">
                                                Boulangerie
                                            </p>
                                        </li>
                                        <li>
                                            <p class="description">
                                                Caisse
                                            </p>
                                        </li>
                                        <li>
                                            <p class="description">
                                                Logistique
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="timeline reveal-1">
                            <div href="#" class="timeline-content">
                                <div class="timeline-year">
                                    <span>2016</span>
                                </div>
                                <div class="timeline-icon">
                                    <img class="rounded-circle" src="images/diaphragm.png">
                                </div>
                                <div class="inner-content">
                                    <h3 class="title">Event Sport Solidarity</h3>
                                    <h3 class="title2">Photographe</h3>
                                    <h3 class="dateAndLocation">Juin 2016 à Viroflay</h3>
                                    <ul class="ulDescritpion">
                                        <li>
                                            <p class="description">
                                                Prise de clichés photographique
                                            </p>
                                        </li>
                                        <li>
                                            <p class="description">
                                                Traitement post-production
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </section>


    <section id="contact">
        <div class="container">
            <div class="red-divider"></div>
            <div class="heading">
                <h2>Contact</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto col-lg-offset-1 reveal-1">
                    <form id="contact-form" method="post" action="" role="form">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstname">Prénom<span class="red"> *</span></label>
                                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="">
                                <p class="comments"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Nom<span class="red"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" value="">
                                <p class="comments"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email<span class="red"> *</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" value="">
                                <p class="comments"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Téléphone</label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre numéro de téléphone" value="">
                                <p class="comments"></p>
                            </div>
                            <div class="col-md-12">
                                <label for="message">Ne soyez pas timide :<span class="red"> *</span></label>
                                <textarea type="text" id="message" name="message" class="form-control" placeholder="Votre message" rows="5"></textarea>
                                <p class="comments"></p>
                            </div>

                            <div class="col-md-12">
                                <p class="red"><small>* Ces informations sont requises.</small></p>
                            </div>

                            <div class="col-md-12">
                                <input type="submit" class="button2" value="Envoyer">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center">
        <a href="#about">
            <img src="images/arrow-up.png" width="50px"> </a>
        <h5><small>Droits d'auteur © 2019. Tous droits réservés. <br>El behedy Ramy </small></h5>

    </footer>





</body>

</html>