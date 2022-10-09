<?php
$servername = "localhost";
$username = "TSAD";
$password = "0]3(Hlxr1t9Z(teu";
$dbname = "tsad";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$idtofind = $_GET['id'];
//if ($idtofind === NULL){
//    header("Location: /");
//    die();
//}
$sql = "SELECT * FROM assets WHERE id = $idtofind";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $title = $row["title"];
    $subtitle = $row["subtitle"];
    $description = $row["description"];
    $createur = $row["createur"];
    $provider = $row["provider"];
    $tags = $row["tags"];
    $matroulant = $row["materiel roulant"];
    $file = $row["lien du fichier"];
  }
} else {
  echo "0 results";
}
$conn->close();
?> 




<!DOCTYPE HTML>
<head>
    <!-- Script and CSS-->
    <script src="/js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="/js/typeahead.bundle.js">
    <script src="/js/switch.js"></script>
    <script src="/js/tsad.js"></script>
    <script>
        // Fall back if the browser doesn't support prefers-color-scheme
        if (window.matchMedia('(prefers-color-scheme: dark)').media === 'not all') {
            // Hide content until CSS loads to prevent show unstyled code.
            document.documentElement.style.display = 'none';

            // Insert stylesheet with onload event to show page content.
            document.head.insertAdjacentHTML(
                'beforeend',
                '<link href="css/dark-theme.css" rel="stylesheet" onload="document.documentElement.style.display=\'\'" />'
            );
        }
    </script>
    <link href="/css/bootstrap.css" rel="stylesheet" media="(prefers-color-scheme: light)" />
    <link href="/css/dark-theme.css" rel="stylesheet" media="(prefers-color-scheme: dark)" />
    <link href="/css/tsad.css" rel="stylesheet">
    <!-- Metadata-->

    <!-- HTML Meta Tags -->
    <title>TSAD - Votre centre de téléchargement d'assets TSC</title>
    <meta name="description" content="Grâce à TSAD, retrouvez vos assets pour Train Simulator Classic regroupé en un endroit. En quelques clics, téléchargez vos fichiers et vous êtes prêt à jouer !">
	<meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Facebook Meta Tags -->
    <meta name="theme-color" content="#C61010">
    <meta property="og:site_name" content="TSAD">
    <meta property="og:url" content="https://tsad.miniternet.eu/">
    <meta property="og:type" content="article">
    <meta property="og:article:author" content="<?php echo $createur?>">
    <meta property="og:article:tag" content="<?php echo $tags?>">
    <meta property="og:title" content="<?php echo $title?>">
    <meta property="og:description" content="<?php echo $subtitle?>">
    <meta property="og:image" content="http://tsad.miniternet.eu/img/thumb.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://tsad.miniternet.eu/">
    <meta property="twitter:url" content="https://tsad.miniternet.eu/">
    <meta name="twitter:title" content="<?php echo $title?>">
    <meta name="twitter:description" content="<?php echo $subtitle?>">
    <meta name="twitter:image" content="https://tsad.miniternet.eu/img/thumb.png">

    <!-- Meta Tags Generated via https://www.opengraph.xyz -->
        
<script type="text/javascript">
function chimes(){
            var audio = new Audio('/media/chimes.wav');
                audio.volume = 0.2;
                audio.play();
        };
</script>
</head>
<body>
    <div id="page-containercus">
        <div id="content-wrap">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #C61010">
                <div class="container-fluid">
                <a class="nav-link impact menu-impact"  href="/">TSAD</a>
                    <a class="navbar-brand" href="#"><!-- name--></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                    
                    <ul class="navbar-nav mr-auto ">
                            
                        <li class="nav-item">
                            <a class="nav-link"  href="/">Accueil</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link"  href="#">Objet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Objet étirable</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item" style="right: 0px; margin: auto">
                        <a class="nav-link" href="#">Se connecter / S'inscrire</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="pageleft">
            <!-- body-->
            <br>
            <h1>
                <span id="title"><?php echo $title;?></span>
            </h1>
            <h2>
                <span id="subtititle"><?php echo $subtitle;?></span>
            </h2>
            <div class="description">
                <span id="description"><?php echo $description;?></span>
            </h2>
        </div>

    </div>

    <div class="leftcard ">
        <div class="card" style="width: 18rem; border-radius: 0px;">
            <div class="card-body">
                <h5 class="card-title">Informations sur le fichier:</h5>
                <hr>
                <p class="card-text">Matériel Roulant: <?php echo $matroulant;?></p>
                <p class="card-text">Créateur: <?php echo $createur;?></p>
                <p class="card-text">Provider: <?php echo $provider;?></p>
                <p class="card-text">Tags: <?php echo $tags;?> </p>
            </div>
            <a onclick="chimes()" href="<?php echo $file;?>" class="btn btn-primary"><i class="bi bi-download"></i>&nbsp;Accéder à la page de téléchargement</a>
        </div>
    </div>

  


</body>