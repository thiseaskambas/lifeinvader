<?php
class Users extends Controller
{
   public $userModel;
   public function __construct()
   {
      $this->userModel = $this->model('User');
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
            //else check that email is not in db already
         } else if ($this->userModel->findUserByEmail($data['email'])) {
            $data['email_err'] = 'Email is already taken!';
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

         //if no errors
         if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['password_conf_err'])) {
            //hash password 
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            //user signup
            if ($this->userModel->signup($data)) {
               notify('signup_success', 'You are now signed-up and can log-in!');
               reditrect('users/login');
            } else {
               die('❌ something went wrong while loging in');
            }
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
            $data['password_err'] = 'Please fill in your password';
         }


         if ($this->userModel->findUserByEmail($data['email'])) {
         } else {
            $data['email_err'] = 'Wrong password or email';
            $data['password_err'] = 'Wrong password or email';
         }

         if (empty($data['email_err']) && empty($data['password_err'])) {
            //check and set logged in user
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
            if ($loggedInUser) {
               die('🚀');
            } else {
               $data['email_err'] = 'Wrong password or email';
               $data['password_err'] = 'Wrong password or email';
               $this->view('users/login', $data);
            }
         } else {
            $this->view('users/login', $data);
         }
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
