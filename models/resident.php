<?php

class resident
{
  public $id = 0;
  public $firstName = '';
  public $lastName = '';
  public $yearOfBirth = '';
  public $description = '';
  public $idIpad = 0;
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
   * Méthode permettant de récupérer les différentes infos d'un resident
   *
   * @return object
   */
  public function getResidentProfile()
  {
    $getResidentProfile = $this->db->prepare(
      'SELECT *
      FROM ' . $this->table
        . ' WHERE `id` = :id'
    );
    $getResidentProfile->bindValue(':id', $this->id, PDO::PARAM_INT);
    $getResidentProfile->execute();
    return $getResidentProfile->fetch(PDO::FETCH_OBJ);
  }

  /**
   * Méthode permettant de modifier les infos d'une ehpad
   *
   * @return boolean
   */
  public function updateResident()
  {
    $updateResident = $this->db->prepare('
      UPDATE ' . $this->table . '
      SET `first_name`=:firstName, `last_name`=:lastName, `year_of_birth` =:yearOfBirth, `description`=:description
      WHERE id = :id
    ');
    $updateResident->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
    $updateResident->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
    $updateResident->bindValue(':yearOfBirth', $this->yearOfBirth, PDO::PARAM_INT);
    $updateResident->bindValue(':description', $this->description, PDO::PARAM_STR);
    $updateResident->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $updateResident->execute();
  }

  /**
   * Méthode permettant de tirer au hasard un résident
   */
  public function getRandomResident()
  {
    // Age est calculé dans la requête / on soustrait la date actuel à la date indiquée dans la base de donnée
    $getRandomResident = $this->db->prepare(
      'SELECT t1.*,  YEAR(CURRENT_TIMESTAMP) - year_of_birth AS age, t2.name, t2.city
        FROM ' . $this->table . ' AS t1, ' . $this->tableEhpad . ' AS t2
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
  public function getAllResidents()
  {
    // Requète pour récupérer tous résident par ordre aplhabétique
    $getAllResidents = $this->db->prepare(
      'SELECT *,  YEAR(CURRENT_TIMESTAMP) - year_of_birth AS age
     FROM ' . $this->table .
        ' WHERE id_ehpad = :idEhpad  ORDER BY LAST_NAME'
    );

    $getAllResidents->bindValue(':idEhpad', $this->idEhpad, PDO::PARAM_INT);
    $getAllResidents->execute();
    return $getAllResidents->fetchAll(PDO::FETCH_OBJ);
  }
  /**
   * Méthode permettant de suprimer un résident
   */
  public function deleteResident()
  {
    $deleteResidentQuery = $this->db->prepare(
      'DELETE FROM ' . $this->table . '
      WHERE `id` = :id'
    );
    $deleteResidentQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
    return  $deleteResidentQuery->execute();
  }
}
