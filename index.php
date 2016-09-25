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
        <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/fct.js"></script>

    <!--    Styles-->
        <!-- Latest compiled and minified bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!--        Optionnal css-->
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <!--    Icons-->
    <script type="text/javascript" src="https://use.fontawesome.com/bd1130bfda.js"></script>



    <!--    Titre-->
    <title>
    <?php echo $page->getTitle()?>
    </title>
    <link rel="shortcut icon" href="/favicon.ico" />
</head>

<!--body-->
<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <!--Header-->
<?php include("view/v_header.php");?>
    <!--    Content-->
    <div id="contenu" class="container">
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
    <!--    Footer-->
    <footer id="footer" class="container">
        <?php
        include("view/v_footer.php");
        ?>
    </footer>
</body>
</html>