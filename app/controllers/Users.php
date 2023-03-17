<?php
class Users extends Controller
{
   public function __construct()
   {
   }

   public function signup()
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         //process form

         //Sanitize data
         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

         $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'password_conf' => trim($_POST['password_conf']),
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'password_conf_err' => '',
         ];

         if (empty($data['name'])) {
            $data['name_err'] = 'Please fill in your name';
         }
         if (empty($data['email'])) {
            $data['email_err'] = 'Please fill in your email';
         }
         if (empty($data['password'])) {
            $data['password_err'] = 'Please fill in a password';
         } else if (strlen($data['password']) < 6) {
            $data['password_err'] = 'Password must have at least 6 chatacters';
         }
         if (empty($data['password_conf'])) {
            $data['password_conf_err'] = 'Please confirm your password';
         } else if ($data['password_conf'] !== $data['password']) {
            $data['password_conf_err'] = 'Passwords do not match';
         }

         if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['password_conf_err'])) {
            die('✅');
         } else {
            $this->view('users/signup', $data);
         }
      } else {
         $data = [
            'name' => '',
            'email' => '',
            'password' => '',
            'password_conf' => '',
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'password_conf_err' => '',
         ];
         $this->view('users/signup', $data);
      }
   }

   public function login()
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         //process form
         //Sanitize data
         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

         $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'email_err' => '',
            'password_err' => '',
         ];

         if (empty($data['email'])) {
            $data['email_err'] = 'Please fill in your email';
         }
         if (empty($data['password'])) {
            $data['password_err'] = 'Please fill in a password';
         }

         $this->view('users/login', $data);
      } else {
         $data = [
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => '',
         ];
         $this->view('users/login', $data);
      }
   }
}
