<?php require APPROOT . '/views/inc/header.php' ?>
<div class="row my-4">
   <?php notify('post_added') ?>
   <div class="col-md-6">
      <h1>Posts</h1>
   </div>
   <div class="col-md-6">
      <a href="<?php echo URLROOT ?>/posts/create" class="btn btn-primary pull-right">
         <i class="fa fa-pencil"></i> Create a post
      </a>
   </div>
</div>
<?php foreach ($data['posts'] as $post) : ?>
   <div class="card card-body mb-3">
      <h4 class="title"><?php echo $post->title ?></h4>
      <div class="bg-light p-2 mb-3">
         shared by <?php echo $post->name; ?> on <?php echo $post->postCreated ?>
      </div>
      <div class="card-text mb-3"><?php echo $post->body ?></div>
      <a href="<?php echo URLROOT ?>/posts/showpost/<?php echo $post->postId ?>" class="btn btn-dark mx-auto px-4">More</a>
   </div>
<?php endforeach ?>
<?php require APPROOT . '/views/inc/footer.php' ?>