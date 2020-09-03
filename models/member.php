<?php

class users{
    public $id = 0;
    /**
     * Nom de l'utilisateur
     *
     * @var string
     */
    public $username = '';
    public $password = '';
    public $mail = '';
    private $db = null;
    /**
     * Nom de la table avec le préfix
     *
     * @var string
     */
    private $table = SQL_PREFIX . 'users`';
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
 * Méthode permettant d'enregistrer un utilisateur
 * @return boolean
 */
    public function addUser(){
        $addUser = $this->db->prepare('
            INSERT INTO ' . $this->table . '
            (`username`, `mail`, `password`)
            VALUES (:username, :mail, :password)
        ');
        $addUser->bindValue(':username',$this->username,PDO::PARAM_STR);
        $addUser->bindValue(':mail',$this->mail,PDO::PARAM_STR);
        $addUser->bindValue(':password',$this->password,PDO::PARAM_STR);
        return $addUser->execute();
    }

    /**
     * Méthode permettant de savoir une valeur d'un champ est déjà prise    
     * Valeur de retour :
     *  - True : la valeur est déjà prise
     *  - False : la valeur est disponible
     * @param array $field
     * @return boolean
     */
    public function checkUserUnavailabilityByFieldName($field){
        $whereArray = [];
        foreach($field as $fieldName ){
            $whereArray[] = '`' . $fieldName . '` = :' . $fieldName;
        }
        $where = ' WHERE ' . implode(' AND ', $whereArray);
        $checkUserUnavailabilityByFieldName = $this->db->prepare('
            SELECT COUNT(`id`) as `isUnavailable`
            FROM ' . $this->table 
            . $where
        ); 
        foreach($field as $fieldName ){
            $checkUserUnavailabilityByFieldName->bindValue(':'.$fieldName,$this->$fieldName,PDO::PARAM_STR);
        }
        $checkUserUnavailabilityByFieldName->execute();
        return $checkUserUnavailabilityByFieldName->fetch(PDO::FETCH_OBJ)->isUnavailable;
    }

    /**
     * Méthode permettant de récupérer le hash du mot de passe de l'utilisateur
     *
     * @return void
     */
    public function getUserPasswordHash(){
        $getUserPasswordHash = $this->db->prepare(
            'SELECT `password` 
            FROM ' . $this->table 
            . ' WHERE `mail` = :mail'
        );
        $getUserPasswordHash->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $getUserPasswordHash->execute();
        $response = $getUserPasswordHash->fetch(PDO::FETCH_OBJ);
        if(is_object($response)){
            return $response->password;
        }else{
            return '';
        }
    }
/**
 * Méthode permettant de récupérer les différentes infos d'un utilisateur
 * 
 * @return object
 */
    public function getUserProfile(){
        $getUserProfile = $this->db->prepare(
            'SELECT `id`, `username`
            FROM ' . $this->table 
            . ' WHERE `mail` = :mail'
        );
        $getUserProfile->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $getUserProfile->execute();
        return $getUserProfile->fetch(PDO::FETCH_OBJ);
    }

}