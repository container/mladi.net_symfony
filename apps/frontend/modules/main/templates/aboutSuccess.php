<div id="left">
    <?php foreach ($blog_post_list as $blog_post): ?>
    
      <a href="<?php echo url_for('post/show?id='.$blog_post->getId()) ?>"><h2><?php echo $blog_post->getTitle() ?></h2></a>
      
      <?php echo $blog_post->getExcerpt() ?>
      <a href="<?php echo url_for('post/show?id='.$blog_post->getId()) ?>">more...</a>
      <?php echo $blog_post->getCreatedAt() ?>
      <hr />
    
    <?php endforeach; ?>
</div>   
<div id="right">
    
<?php include_partial('main/tagcloud', array('tags' => $tags)) ?>
<?php include_partial('main/cats', array('cats' => $cats)) ?>
</div>