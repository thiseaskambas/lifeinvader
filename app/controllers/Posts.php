<?php
class Posts extends Controller
{
   public $postModel;
   public function __construct()
   {
      if (!isLoggedIn()) {
         reditrect('users/login');
      }
      $this->postModel = $this->model('Post');
   }

   public function index()
   {
      $posts = $this->postModel->getPosts();
      $data = [
         'posts' => $posts
      ];
      $this->view('posts/index', $data);
   }

   public function create()
   {
      $data = [
         'title' => '',
         'body' => '',
         'title_err' => '',
         'body_err' => ''
      ];
      $this->view('posts/create', $data);
   }
}
