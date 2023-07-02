<?php

class User extends Connection{
  
  public function getUser($id) {
    intval($id);
    $sql = "SELECT * FROM user WHERE iduser = $id";
    $sql = $this->conn->query($sql);
    return $sql->fetch(PDO::FETCH_ASSOC);
  }

  public function add ($dados) {

    $senha = password_hash($dados['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (name, login_user, password, email, img_profile, created_user, updated_user) VALUES (:name, :login_user, :password, :email, :img_profile, :created_user, :updated_user)";
    $sql = $this->conn->prepare($sql);
    $sql->bindValue(':name', $dados['name']);
    $sql->bindValue(':login_user', $dados['login_user']);
    $sql->bindValue(':password', $dados['password']);
    $sql->bindValue(':email', $dados['email']);
    $sql->bindValue(':img_profile', $dados['img_profile']);
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

    $sql = "UPDATE user SET name = :name, login_user = :login_user, password = :password, email = :email, img_profile = :img_profile, updated_user = :updated_user";
    $sql = $this->conn->prepare($sql);
    $sql->bindValue(':name', $dados['name']);
    $sql->bindValue(':login_user', $dados['login_user']);
    $sql->bindValue(':password', $dados['password']);
    $sql->bindValue(':email', $dados['email']);
    $sql->bindValue(':img_profile', $dados['img_profile']);
    $sql->bindValue(':updated_user', date('Y-m-d H:i:s'));
    $sql->execute();

    if($sql->rowCount() > 0) {
      return true;
    }
    return false;
  }

  public function delete($iduser) {

    $sql = "DELETE FROM user WHERE iduser = $iduser"; 
    $sql = $this->conn->query($sql);

    if($sql->rowCount() > 0 ) {
      return true;
    }
    return false;
  }

}