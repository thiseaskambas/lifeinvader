<?php
class User
{
   private $db;
   public function __construct()
   {
      $this->db = new Database();
   }
   //Find users by email
   public function findUserByEmail($email)
   {
      $query = 'SELECT * FROM users WHERE email = :email';
      $this->db->query($query);
      $this->db->bind(':email', $email);
      $row = $this->db->singleFetch();
      if ($this->db->rowCount() > 0) {
         return true;
      }
      return false;
   }

   public function signup($data)
   {
      $query = 'INSERT INTO users (name, email, password) VALUES(:name, :email, :password)';

      $this->db->query($query);

      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      //execture
      if ($this->db->execute()) {
         return true;
      }
      return false;
   }

   public function login($email, $password)
   {
      $query = 'SELECT * FROM users WHERE email =:email';
      $this->db->query($query);
      $this->db->bind(':email', $email);
      $row =  $row = $this->db->singleFetch();
      $hashedPassword = $row->password;
      if (password_verify($password, $hashedPassword)) {
         return $row;
      }
      return false;
   }
}
