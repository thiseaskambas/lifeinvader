<?php
class Pages extends Controller
{


   public function __construct()
   {
   }
   public function index()
   {

      $data = [
         'title' => 'LifeInvader',
         'subtitle' => 'Join our community of millions of users who love sharing every little detail of their lives.',
         'description' => ' * Just kidding, this is a simple social network built on a custom MVC framework with PHP.'
      ];

      $this->view("pages/index", $data);
   }
   public function about()
   {
      $data = [
         'title' => 'About',
         'subtitle' => 'Sign up now and let the invasion begin!',
         'description' => "Welcome to Life Invader, the social network that's so addictive, you'll forget about the rest of your life! Join our community of millions of users who love sharing every little detail of their lives, from their favorite pizza toppings to their morning bathroom routine. Plus, with our state-of-the-art stalking technology, you can keep tabs on all your friends (and enemies) 24/7, so you never miss a beat. So why waste your time with real-life social interactions when you can join the ultimate online time-suck?"
      ];
      $this->view("pages/about", $data);
   }
}
