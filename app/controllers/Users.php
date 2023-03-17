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
