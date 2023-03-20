<?php
class Posts extends Controller
{
   public $postModel;
   public $userModel;
   public function __construct()
   {
      if (!isLoggedIn()) {
         reditrect('users/login');
      }
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
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
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         //sanitize input
         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
         $data = [
            'title' => trim($_POST['title']),
            'body' => trim($_POST['body']),
            'user_id' => $_SESSION['user_id'],
            'title_err' => '',
            'body_err' => ''
         ];

         //validate data 
         if (empty($data['title'])) {
            $data['title_err'] = 'Please entrer a title to your post';
         }

         if (empty($data['body'])) {
            $data['body_err'] = 'Please add a body to your post';
         }

         //check for errors
         if (empty($data['title_err']) && empty($data['body_err'])) {
            if ($this->postModel->addPost($data)) {
               notify('post_message', 'Your post was succesfully shared');
            }
            reditrect('posts');
         } else {
            //load view with the errors
            $this->view('posts/create', $data);
         }
      } else {
         $data = [
            'title' => '',
            'body' => '',
         ];
         $this->view('posts/create', $data);
      }
   }
   public function edit($id)
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         //sanitize input
         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
         $data = [
            'title' => trim($_POST['title']),
            'body' => trim($_POST['body']),
            'user_id' => $_SESSION['user_id'],
            'id' => $id,
            'title_err' => '',
            'body_err' => ''
         ];

         //validate data 
         if (empty($data['title'])) {
            $data['title_err'] = 'Please entrer a title to your post';
         }

         if (empty($data['body'])) {
            $data['body_err'] = 'Please add a body to your post';
         }

         //check for errors
         if (empty($data['title_err']) && empty($data['body_err'])) {
            if ($this->postModel->updatePost($data)) {
               notify('post_message', 'Your post was succesfully edited');
            }
            reditrect('posts');
         } else {
            //load view with the errors
            $this->view('posts/edit', $data);
         }
      } else {
         //get existing post
         $post = $this->postModel->getPostById($id);
         //authorisation 
         if ($post->user_id !== $_SESSION['user_id']) {
            reditrect('posts');
         }
         $data = [
            'id' => $id,
            'title' => $post->title,
            'body' => $post->body,
         ];
         $this->view('posts/edit', $data);
      }
   }

   public function showPost($id)
   {
      $post = $this->postModel->getPostById($id);
      $user = $this->userModel->findUserById($post->user_id);
      $data = [
         'post' => $post,
         'user' => $user
      ];
      $this->view('posts/showpost', $data);
   }

   public function delete($id)
   {

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         //get existing post
         $post = $this->postModel->getPostById($id);
         //authorisation 
         if ($post->user_id !== $_SESSION['user_id']) {
            reditrect('posts');
         }
         notify('post_message', 'Post deleted.');
         if ($this->postModel->deletePost($id)) {
            reditrect('posts/index');
         } else {
            die('❌ Whops, something went terribly wrong');
         }
      } else {
         reditrect('posts/index');
      }
   }
}
