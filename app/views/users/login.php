<?php require APPROOT . '/views/inc/header.php' ?>
<div class="row">
   <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
         <h2>Login</h2>
         <p>Please fill in your credentials to access your account</p>
         <form action="<?php echo URLROOT ?>/users/login" method="post">
            <div class="mb-3">
               <label for="name">Email: <sup>*</sup></label>
               <input type="email" name="email" class="form-control form-control-lg <?php echo (empty($data['email_err'])) ? '' : 'is-invalid' ?> " value="<?php echo $data['email'] ?>">
               <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
            </div>
            <div class="mb-3">
               <label for="name">Password: <sup>*</sup></label>
               <input type="password" name="password_err" class="form-control form-control-lg <?php echo (empty($data['password_err'])) ? '' : 'is-invalid' ?> " value="<?php echo $data['password'] ?>">
               <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
            </div>

            <div class="row">
               <div class="col mt-auto">
                  <input type="submit" class="btn btn-success btn-block w-100">
               </div>
               <div class="col">
                  <div class="text-center">Don't have an acount? </div>
                  <a href="<?php echo URLROOT ?>/users/signup" class="btn btn-light btn-block w-100">Sign up!</a>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>