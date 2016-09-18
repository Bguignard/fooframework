<?php
ob_start ('ob_gzhandler');
session_start();
setlocale (LC_ALL, 'fr_FR');
include_once("./conf/Conf.php");
include_once("./includes/class/Connexion.php");
include_once("./includes/class/Page.php");
include_once("./includes/init.php");
$pageName = isset($_GET['page']) ? $_GET['page'] : "";
$page = new Page();
?>

<!doctype html>
<html lang="fr">

<!--head-->
<head>

    <!--    Encodage-->
    <meta charset="UTF-8" />

    <!--    bootstrap-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--    Balises meta-->
    <meta name="keywords" content="<?php echo Conf::$keywords?>" />
    <meta name="description" content="<?php echo Conf::$description?>" />
    <meta name="author" content="<?php echo Conf::$author?>" />
    <meta name="robots" content="NOODP" />
    <meta name="googlebot" content="NOODP" />

    <!--    Scripts-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/fct.js"></script>

    <!--    Styles-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <!--    Titre-->
    <title>

    </title>
    <link rel="shortcut icon" href="/favicon.ico" />
</head>

<!--body-->
<body>



<span id="include"></span>
<?php include("view/v_header.php");?>
    <div class="container">
        <div id="contenu">
            <?php
            //                contenu
            switch($page)
            {
                case "accueil" : include_once("./view/v_accueil.html");
                    break;

                default : include_once("./view/v_accueil.html");
                    break;
            }
            ?>
        </div>
        <footer class="bluePanel">
            <?php
            include("view/v_footer.php");
            ?>
        </footer>
    </div>
</body>
</html>