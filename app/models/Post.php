<?php
class Post
{
   private $db;
   public function __construct()
   {
      $this->db = new Database();
   }

   public function getPosts()
   {
      $query = 'SELECT *,
               posts.id as postId,
               users.id as userId,
               posts.created_at as postCreated,
               users.created_at as userCreated
               FROM posts
               INNER JOIN users
               ON posts.user_id = users.id
               ORDER BY posts.created_at DESC
               ';
      $this->db->query($query);
      $results = $this->db->resultSet();
      return $results;
   }

   public function addPost($data)
   {
      $query = 'INSERT INTO posts (title, user_id, body) VALUES(:title, :user_id, :body)';

      $this->db->query($query);

      $this->db->bind(':title', $data['title']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      //execture
      if ($this->db->execute()) {
         return true;
      }
      return false;
   }

   public function getPostById($id)
   {
      $query = 'SELECT * FROM posts WHERE id = :id';
      $this->db->query($query);
      $this->db->bind(':id', $id);
      $row = $this->db->singleFetch();
      return $row;
   }

   public function updatePost($data)
   {
      $query = 'UPDATE posts SET title = :title, body = :body WHERE id = :id';
      $this->db->query($query);
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
      //execture
      if ($this->db->execute()) {
         return true;
      }
      return false;
   }

   public function deletePost($id)
   {
      $query = 'DELETE FROM posts  WHERE id = :id';
      $this->db->query($query);
      $this->db->bind(':id', $id);

      //execture
      if ($this->db->execute()) {
         return true;
      }
      return false;
   }
}
