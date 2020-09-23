<?php

class message
{
  public $id = 0;
  public $message = '';
  public $author = '';
  public $idResident = 0;
  public $idEhpad = 0;
  public $date = '';
  private $db = null;
  private $table = SQL_PREFIX . 'message';
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
   * Méthode permettant d'enregistrer une message
   * @return boolean
   */
  public function addMessage()
  {
    $addMessage = $this->db->prepare('
      INSERT INTO ' . $this->table . '
      (`message`, `author`, `date`, `id_resident`)
      VALUES (:message, :author, :date, :idResident)

    ');
    $addMessage->bindValue(':message', $this->message, PDO::PARAM_STR);
    $addMessage->bindValue(':author', $this->author, PDO::PARAM_STR);
    $addMessage->bindValue(':date', $this->date, PDO::PARAM_STR);
    $addMessage->bindValue(':idResident', $this->idResident, PDO::PARAM_INT);
    return $addMessage->execute();
  }

  /**
   * Méthode permettant de récupérer tous les messages d'une Ehpad
   */
  public function getAllMessages()
  {
    // Requète pour récupérer tous les messages et résident destinataire
    $getAllMessages = $this->db->prepare('
      SELECT t1.id, t1.message, t1.author, t1.date, t2.first_name, t2.last_name
      FROM dp2020mns_message as t1
      LEFT JOIN dp2020mns_ehpad_resident as t2 ON t1.id_resident = t2.id
      WHERE t2.id_ehpad = 1
      ORDER by t1.date
    ');
    $getAllMessages->bindValue(':idEhpad', $this->idEhpad, PDO::PARAM_INT);
    $getAllMessages->execute();
    return $getAllMessages->fetchAll(PDO::FETCH_OBJ);
}
public function updateMessage()
{
  $updatemessage = $this->db->prepare('
    UPDATE ' . $this->table . '
    SET `message`=:message, `author`=:author, 
    WHERE id = :id
  ');
  $updatemessage->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
  $updatemessage->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
  
  $updatemessage->bindValue(':id', $this->id, PDO::PARAM_INT);
  return $updatemessage->execute();
}

  public function deleteMessages(){
    $deleteMessage = $this->db->prepare(
    'DELETE FROM '.$this->table.'
    WHERE `id` = :id');
    $deleteMessage->bindValue(':id', $this->id, PDO::PARAM_INT);
    return  $deleteMessage->execute();
   }
  }
  
