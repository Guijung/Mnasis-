<?php

class ehpad{
    public $id = 0;
    public $email = '';
    public $password = '';
    public $city = '';
    private $db = null;
    private $table = SQL_PREFIX . 'ehpad';
//methode magique :Crée une instance PDO qui représente une connexion à la base
//le constructeur initialise des propriétés à l'objet.
    public function __construct()
    {
      //connexion à la base de donnée
        try{
            $this->db = new PDO('mysql:host='. SQL_HOST .';dbname='. SQL_DBNAME .';charset=utf8', SQL_USER , SQL_PWD);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
/**
 * Méthode permettant d'enregistrer une ehpad
 * @return boolean
 */
    public function addEhpad(){
        $addEhpad = $this->db->prepare('
            INSERT INTO ' . $this->table . '
            (`email`, `password`, `name`, `city`)
            VALUES (:email, :password, :name, :city)
        ');
        $addEhpad->bindValue(':email',$this->email,PDO::PARAM_STR);
        $addEhpad->bindValue(':password',$this->password,PDO::PARAM_STR);
        $addEhpad->bindValue(':name',$this->name,PDO::PARAM_STR);
        $addEhpad->bindValue(':city',$this->city,PDO::PARAM_STR);
        return $addEhpad->execute();
    }

    /**
     * Méthode permettant de savoir une valeur d'un champ est déjà prise
     * Valeur de retour :
     *  - True : la valeur est déjà prise
     *  - False : la valeur est disponible
     * @param array $field
     * @return boolean
     */
    public function checkEhpadUnavailabilityByFieldName($field){
        $whereArray = [];
        foreach($field as $fieldName ){
            $whereArray[] = '`' . $fieldName . '` = :' . $fieldName;
        }
        $where = ' WHERE ' . implode(' AND ', $whereArray);
        $checkEhpadUnavailabilityByFieldName = $this->db->prepare('
            SELECT COUNT(`id`) as `isUnavailable`
            FROM ' . $this->table
            . $where
        );
        foreach($field as $fieldName ){
            $checkEhpadUnavailabilityByFieldName->bindValue(':'.$fieldName,$this->$fieldName,PDO::PARAM_STR);
        }
        $checkEhpadUnavailabilityByFieldName->execute();
        return $checkEhpadUnavailabilityByFieldName->fetch(PDO::FETCH_OBJ)->isUnavailable;
    }

    /**
     * Méthode permettant de récupérer le hash du mot de passe de l'ehpad
     *
     * @return void
     */
    public function getEhpadPasswordHash(){
        $getEhpadPasswordHash = $this->db->prepare(
            'SELECT `password` FROM ' . $this->table
            . ' WHERE `email` = :email'
        );
        $getEhpadPasswordHash->bindValue(':email', $this->email, PDO::PARAM_STR);
        $getEhpadPasswordHash->execute();
        $response = $getEhpadPasswordHash->fetch(PDO::FETCH_OBJ);
        if(is_object($response)){
            return $response->password;
        }else{
            return '';
        }
    }
/**
 * Méthode permettant de récupérer les différentes infos d'une ehpad
 *
 * @return object
 */
    public function getEhpadProfile(){
        $getEhpadProfile = $this->db->prepare(
            'SELECT *
            FROM ' . $this->table
            . ' WHERE `email` = :email'
        );
        $getEhpadProfile->bindValue(':email', $this->email, PDO::PARAM_STR);
        $getEhpadProfile->execute();
        return $getEhpadProfile->fetch(PDO::FETCH_OBJ);
    }

}
