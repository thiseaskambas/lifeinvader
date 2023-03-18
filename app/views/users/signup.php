<?php require APPROOT . '/views/inc/header.php' ?>
<div class="row">
   <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
         <h2>Create an account</h2>
         <p>Please fill out this form to register</p>
         <form action="<?php echo URLROOT ?>/users/signup" method="post">
            <div class="mb-3">
               <label for="name">Name: <sup>*</sup></label>
               <input type="text" name="name" class="form-control form-control-lg <?php echo (empty($data['name_err'])) ? '' : 'is-invalid' ?> " value="<?php echo $data['name'] ?>">
               <span class="invalid-feedback"><?php echo $data['name_err'] ?></span>
            </div>
            <div class="mb-3">
               <label for="email">Email: <sup>*</sup></label>
               <input type="email" name="email" class="form-control form-control-lg <?php echo (empty($data['email_err'])) ? '' : 'is-invalid' ?> " value="<?php echo $data['email'] ?>">
               <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
            </div>
            <div class="mb-3">
               <label for="password">Password: <sup>*</sup></label>
               <input type="password" name="password" class="form-control form-control-lg <?php echo (empty($data['password_err'])) ? '' : 'is-invalid' ?> " value="<?php echo $data['password'] ?>">
               <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
            </div>
            <div class="mb-3">
               <label for="password_conf">Password confirmation: <sup>*</sup></label>
               <input type="password" name="password_conf" class="form-control form-control-lg <?php echo (empty($data['password_conf_err'])) ? '' : 'is-invalid' ?> " value="<?php echo $data['password_conf'] ?>">
               <span class="invalid-feedback"><?php echo $data['password_conf_err'] ?></span>
            </div>
            <div class="row">
               <div class="col mt-auto">
                  <input type="submit" class="btn btn-success btn-block w-100">
               </div>
               <div class="col">
                  <div class="text-center">Already have an acount? </div>
                  <a href="<?php echo URLROOT ?>/users/login" class="btn btn-light btn-block w-100">Login!</a>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>