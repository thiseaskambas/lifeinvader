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
