<?php require APPROOT . '/views/inc/header.php' ?>
<div class="p-5 mb-4 bg-light rounded-3 text-center">
   <div class="container-fluid py-5">
      <h1 class="display-3 fw-bold"><?php echo $data['title']; ?></h1>
      <p class="col-md-8 fs-4 mx-auto"><?php echo $data['subtitle']; ?></p>
      <hr class="my-4">
      <p class="col-md-8 fs-5 mx-auto fst-italic"><?php echo $data['description']; ?></p>
   </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>