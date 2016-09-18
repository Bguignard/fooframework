<?php

class Connexion {

    private static $pdo; //PDO object encapsulated
    private static $maConnexion = NULL; //Singleton flag
    private static $req = ''; //Query to execute
    private static $jeu = NULL; //Set of data returned by query()

    //DB connexion informations
    private $address = NULL; //host address + db name
    private $userName = NULL; //user name
    private $password = NULL; //user password


    private function __construct()
    {
        //local connexion
        if ($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "127.0.0.1")
        {
            $this->address = 'mysql:host=localhost;dbname='.Conf::$dbName;
            $this->userName = "root";
            $this->password = "";
        }

        //remote connexion
        else
        {
            $this->address = 'mysql:host='.Conf::$dbHost.';dbname='.Conf::$dbName;
            $this->userName = Conf::$dbUserName;
            $this->password = Conf::$dbPassword;
        }

        try
        {
            //connecting
            Connexion::$pdo = new PDO($this->address, $this->userName,$this->password);

            //UTF8 encoding
            Connexion::$req="SET NAMES utf8";
            $this->xeq();
            Connexion::$req="SET CHARACTER SET utf8";
            $this->xeq();

            //setting universal time of the server
            Connexion::$req="SET time_zone='+0:00'";
            $this->xeq();
        }
        catch ( Exception $e )
        {
            echo "Unable to connect to MySQL : ", $e->getMessage();
            die();
        }
    }

    //destructor
    public function _destruct(){
        Connexion::$pdo = null;
    }
    
    //Return PDO object using constructor - checking Singleton flag
    public static function getPdo()
    {
        if(Connexion::$maConnexion==NULL)
        {
            Connexion::$maConnexion = new Connexion();
        }
        return Connexion::$maConnexion;
    }

    //Execute a INSERT, DELETE, UPDATE db request, returns the number of rows affected
    public function xeq()
    {
        $nb = Connexion::$pdo->exec(Connexion::$req);
        if($nb===false)
        {
            echo'<p>Erreur : requête incorrecte</p>';
            exit;
        }
        Connexion::$req='';
        return $nb;
    }

    //Execute a SELECT db request, returns PDO object
    public function query()
    {
        Connexion::$jeu = Connexion::$pdo->query(Connexion::$req);
        if(Connexion::$jeu===false)
        {
            echo"<p>Erreur : requête incorrecte</p>";
            exit;
        }
        Connexion::$req='';
        return $this;
    }

    //Combinated with query, returns an array of rows returned by the SELECT request ex : (array(Class))fooArray = (Connexion)$connexion->query()->tab(Class);
    public function tab($class='stdClass')
    {
        Connexion::$jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        return Connexion::$jeu->fetchAll();
    }

    //Combinated with query, returns the first row returned by the SELECT request ex : (Class)class = (Connexion)$connexion->query()->first(Class);
    public function first($class='stdClass')
    {
        Connexion::$jeu->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        return Connexion::$jeu->fetch();
    }

    //Returns true if SELECT query returns something, false otherwise : ex : (Bool)test = (Connexion)$connexion->query()->ins();
    public function ins($instance=null)
    {
        Connexion::$jeu->setFetchMode(PDO::FETCH_INTO, $instance);
        return (bool)(Connexion::$jeu->fetch());
    }

    //Returns the "protected" string to avoid SQL injections
    public function safeChars($mot){
        $se = array('\'',';');
        $re = array('\'\'','');
        return str_replace($se, $re, $mot);
    }

    //Getters and Setters

    /**
     * @return string
     */
    public function getReq()
    {
        return Connexion::$req;
    }

    /**
     * @param string $req
     */
    public function setReq($req)
    {
        Connexion::$req = $req;
    }

    /**
     * @return null
     */
    public function getJeu()
    {
        return Connexion::$jeu;
    }

    /**
     * @param null $jeu
     */
    public function setJeu($jeu)
    {
        Connexion::$jeu = $jeu;
    }

}


