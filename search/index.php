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
                '<link href="/css/dark-theme.css" rel="stylesheet" onload="document.documentElement.style.display=\'\'" />'
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
    <meta property="og:url" content="https://tsad.miniternet.eu/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="TSAD - Votre centre de téléchargement d'assets TSC">
    <meta property="og:description" content="Grâce à TSAD, retrouvez vos assets pour Train Simulator Classic regroupé en un endroit. En quelques clics, téléchargez vos fichiers et vous êtes prêt à jouer !">
    <meta property="og:image" content="https://tsad.miniternet.eu/img/thumb.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="">
    <meta property="twitter:url" content="https://tsad.miniternet.eu/">
    <meta name="twitter:title" content="TSAD - Votre centre de téléchargement d'assets TSC">
    <meta name="twitter:description" content="Grâce à TSAD, retrouvez vos assets pour Train Simulator Classic regroupé en un endroit. En quelques clics, téléchargez vos fichiers et vous êtes prêt à jouer !">
    <meta name="twitter:image" content="https://tsad.miniternet.eu/img/thumb.png">

    <!-- Meta Tags Generated via https://www.opengraph.xyz -->
        
    
</head>
<body>
    <div id="page-containercus">
        <div id="content-wrap">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #C61010">
                <div class="container-fluid">
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

        <!-- body-->
        <div class="asearch_page2" style="position: relative; left: 0px; width: 75%; max-width: 1024px; min-width: 128px">
            <br>
                    
            <form action="/search/index.php" method="get">
                <div class="input-group flex-nowrap" id="searchbar">
                    &nbsp;&nbsp;<h2 class="impact">TSAD</h1>&nbsp;&nbsp;
                    <input type="text" class="form-control rounded-pill typeahead" placeholder="Que recherchez vous ?" aria-label="Username" aria-describedby="addon-wrapping button-search" name="search" value="<?php if( isset($_GET['search']) ){echo htmlspecialchars($_GET['search']);} ?>"></input>  
                    <input type="submit" value="" style="visibility: hidden">
                </div>
            </form>
        </div>
		<hr></hr>
       <?php

function read_more($string)
    {
      // strip tags to avoid breaking any html
        $maxlenght = 360;
        $string = strip_tags($string);
        if (strlen($string) > $maxlenght) {
		
            // truncate string
            $stringCut = substr($string, 0, $maxlenght);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        return $string;
    }



if( isset($_GET['search']) ){
	$search = htmlspecialchars($_GET['search']);
		
	$servername = "localhost";
	$username = "TSAD";
	$password = "0]3(Hlxr1t9Z(teu";
	$db = "tsad";

	$conn = new mysqli($servername, $username, $password, $db);

	if ($conn->connect_error){
		die("Connection failed: ". $conn->connect_error);
	}

	$sql = "select * from assets where title like '%$search%' or tags like '%$search%';";

	$result = $conn->query($sql);

	if ($result->num_rows > 0){
	while($row = $result->fetch_assoc() ){
        $string_description = read_more($row["description"]);
        echo '<a href="/assets/index.php?id='.$row['id'].'">';
		echo '<div class="card" style="width: calc(100% - 30px);">';
		echo	'<div class="card-body">';
		echo		'<h5 class="card-title">'. $row["title"]. '</h5>';
		echo		'<h6 class="card-subtitle mb-2 text-muted">'. $row["subtitle"] .'</h6>';
		echo		"<p class='card-text'>". $string_description ."</p>";
		echo	'</div>';
		echo '</div>';
        echo '</a>';
	}
	} else {
		echo "<h3> Aucun résultat, essayez avec d'autres mots clefs.</h3>";
	}
	$conn->close();
} else {
	echo "<h3> Aucun résultat, essayez avec d'autres mots clefs.</h3>";
}

?>
        

    </div>
    </div>
    

    <!-- Footer -->
    
    <footer class="text-center text-lg-start text-muted">
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="https://tsad.miniternet.eu/">TSAD</a>
        <p>
        Ce site permet de réferencer les différents assets nécessaire pour TSC, pour publier un asset, vous devez en être le propriétaire ou être en accord avec le propriétaire. Le site "TSAD" est un site web non libre de droit soumit à la loi francaise n° 92-597 du 1er juillet 1992 relative au code de la propriété intellectuelle. Les assets proposée par le site "http://tsad.miniternet.eu" n'appartiennent en aucun cas au projet "Miniternet" ou "TSAD" et appartiennent à leurs auteurs respectifs.
        </p>
        <hr>
        <p>Ce site web est issue d'une initiative de Max1116 et est développé par Rexracer.
        <br>
        Nous remercions Geoff Garritey, sans qui, le site n'aurai jamais vu le jour.</p>
    </div>
    </footer>



</body>

