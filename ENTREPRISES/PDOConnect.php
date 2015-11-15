<?php


//use Symfony\Component\HttpFoundation\Request;
namespace Core\RequestBundle\Request;


class PDOConnect
{
    private $server;
    private $host;
    private $db;
    private $user;
    private $pass;
    private $dsn;

    private $req;
    private $idPDO = null;
    private $prepare;

    private $state = 0;

    private function connexion(){
        $server = $this->server;
        $host = $this->host;
        $db = $this->db;

        $user = $this->user;
        $pass = $this->pass;

        $this->dsn = "$server:host=$host;dbname=$db;charset=utf8";

        try {
            $this->idPDO = new \PDO($this->dsn,$user, $pass);
        } catch(PDOException $erreur) {
            $this->idPDO = null;
            die("Echec de la connexion à la base de données.");
        }

    }

    public function __construct($host, $user, $pass, $db=null, $server='mysql'){
        $this->host($host); $this->user($user); $this->pass($pass); $this->db($db); $this->server($server);
        $this->connexion();
        $this->state = 1;
    }


    public function server($server=null){
        if($server){
            $this->server = $server;
            if ($this->state) { $this->connexion(); }
        }
        return $this->server;
    }
    public function host($host=null){
        if($host){
            $this->host = $host;
            if ($this->state) { $this->connexion(); }
        }
        return $this->host;
    }
    public function db($db=null){
        if($db){
            $this->db = $db;
            if ($this->state) { $this->connexion(); }
        }
        return $this->db;
    }

    public function user($user=null){
        if($user){
            $this->user = $user;
            if ($this->state) { $this->connexion(); }
        }
        return $this->user;
    }
    public function pass($pass=null){
        if($pass){
            $this->pass = $pass;
            if ($this->state) { $this->connexion(); }
        }
        return $this->pass;
    }


    public function request($req=null){
        if($req && $this->idPDO){
            $this->req = $req;
            $this->prepare = $this->idPDO->prepare($req);
        }
        return $this->req;
    }


    public function execute(Array $values=null, $obj=null){
        if ($values) {
            foreach ($values as $i => $v) {
                if(is_string($i)){$this->prepare->bindValue(":".$i,$v,\PDO::PARAM_STR);}
                if(is_int($i)){$this->prepare->bindValue($i+1,$v,\PDO::PARAM_INT);}
            }
        }
        $this->prepare->execute();
        if(!$obj){
            $res = $this->prepare->fetchAll(\PDO::FETCH_ASSOC);
        }else{
            $res = $this->prepare->fetchAll(\PDO::FETCH_CLASS);
        }
        $this->prepare->closeCursor();
        return $res;
    }

}