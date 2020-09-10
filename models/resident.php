<?php

class resident
{
  public $id = 0;
  public $firstName = '';
  public $lastName = '';
  public $yearOfBirth = '';
  public $description = '';
  public $idIpad = '';
  private $db = null;
  private $table = SQL_PREFIX . 'ehpad_resident';
  private $tableEhpad = SQL_PREFIX . 'ehpad';
  //methode magique :Crée une instance PDO qui représente une connexion à la base
  //le constructeur initialise des propriétés à l'objet.
  public function __construct()
  {
    //connexion à la base de donnée
    try {
      $this->db = new PDO('mysql:host=' . SQL_HOST . ';dbname=' . SQL_DBNAME . ';charset=utf8', SQL_USER, SQL_PWD);
      // Permet d'afficher les erreurs de la base de données
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
  /**
   * Méthode permettant d'enregistrer une resident
   * @return boolean
   */
  public function addResident()
  {
    $addResident = $this->db->prepare('
      INSERT INTO ' . $this->table . '
      (`first_name`, `last_name`, `year_of_birth`, `description`, `id_ehpad`)
      VALUES (:firstName, :lastName, :yearOfBirth, :description, :idEhpad)

    ');
    $addResident->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
    $addResident->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
    $addResident->bindValue(':yearOfBirth', $this->yearOfBirth, PDO::PARAM_INT);
    $addResident->bindValue(':description', $this->description, PDO::PARAM_STR);
    $addResident->bindValue(':idEhpad', $this->idEhpad, PDO::PARAM_INT);
    return $addResident->execute();
  }

  /**
   * Méthode permettant de tirer au hasard un résident
   */
  public function getRandomResident()
  {
    // Age est calculé dans la requête / on soustrait la date actuel à la date indiquée dans la base de donnée
    $getRandomResident = $this->db->prepare(
      'SELECT t1.*,  YEAR(CURRENT_TIMESTAMP) - year_of_birth as age, t2.name, t2.city
        FROM ' . $this->table . ' as t1, ' . $this->tableEhpad .  ' as t2
        WHERE t1.id_ehpad = t2.id'
    );
    $getRandomResident->execute();
    // Renvoie un tableau contenant tous les résidents
    $result = $getRandomResident->fetchAll();


    if (count($result) === 0) {
      return false;
    } else {
      // Sélectionne un résident au hasard
      $randomIndex = array_rand($result);
      return $result[$randomIndex];
    }
  }

  /**
   * Méthode permettant de récupérer tous les résidents d'une Ehpad
   */
  public function getAllResidentsByEhpad($idEhpad)
  {
    // Requète pour récupérer tous résident par ordre aplhabétiques
    $getAllResidents = $this->db->prepare(
      'SELECT *,  YEAR(CURRENT_TIMESTAMP) - year_of_birth as age
     FROM ' . $this->table .
        ' WHERE id_ehpad = :idEhpad  ORDER BY LAST_NAME'
    );

    $getAllResidents->bindValue(':idEhpad', $idEhpad, PDO::PARAM_INT);
    $getAllResidents->execute();
    return $getAllResidents->fetchAll();
  }
}
