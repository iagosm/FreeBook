<?php


class Book extends Connection {
  
  public function getAllBook() {
    
    $sql = "SELECT * FROM book";
    $sql = $this->conn->query();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getBook($idbook) {
    $sql = "SELECT * FROM book WHERE idbook = $idbook";
    $sql = $this->conn->query();
    return $sql->fetch(PDO::FETCH_ASSOC);
  }

  public function add($dados) {

    $sql = "INSERT INTO book (name_book, img_book, author, publisher, date_release, date_post, category, note, created_user, updated_user) VALUES (:name_book, :img_book, :author, :publisher, :date_release, :date_post, :category, :note, :created_user, :updated_user)";
    $sql = $this->conn->prepare($sql);
    $sql->bindValue(':name_book', $dados['name']);
    $sql->bindValue(':img_book', $dados['login_user']);
    $sql->bindValue(':author', $dados['password']);
    $sql->bindValue(':publisher', $dados['email']);
    $sql->bindValue(':date_release', $dados['img_profile']);
    $sql->bindValue(':date_post', $dados['img_profile']);
    $sql->bindValue(':category', $dados['img_profile']);
    $sql->bindValue(':note', $dados['img_profile']);
    $sql->bindValue(':created_user', date('Y-m-d H:i:s'));
    $sql->bindValue(':updated_user', date('Y-m-d H:i:s'));
    $sql->execute();

    if($sql->rowCount() > 0) {
      $id = $this->conn->lastInsertId();
      return $id;
    }
    return 0;
  }

  public function update($dados) {
    $sql = "UPDATE book SET name_book = :name_book, img_book = :img_book, author = :author, date_release = :date_release, date_post = :date_post, category = :category, note = :note, updated_user = :updated_user WHERE idbook = :idbook";
    $sql = $this->conn->prepare($sql);
    $sql->bindValue(':name_book', $dados['name']);
    $sql->bindValue(':img_book', $dados['login_user']);
    $sql->bindValue(':author', $dados['password']);
    $sql->bindValue(':publisher', $dados['email']);
    $sql->bindValue(':date_release', $dados['img_profile']);
    $sql->bindValue(':date_post', $dados['img_profile']);
    $sql->bindValue(':category', $dados['img_profile']);
    $sql->bindValue(':note', $dados['img_profile']);
    $sql->bindValue(':created_user', date('Y-m-d H:i:s'));
    $sql->bindValue(':updated_user', date('Y-m-d H:i:s'));
    $sql->execute();

    if($sql->rowCount() > 0) {
      $id = $this->conn->lastInsertId();
      return $id;
    }
    return 0;
  }

  public function delete($idbook) {
    
    $sql = "DELETE FROM book WHERE idbook = $idbook";
    $sql = $this->conn->query($sql);

    if($sql->rowCount() > 0) {
      return true;
    }
    return false;
  }
}