<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $blog_post->getId() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $blog_post->getTitle() ?></td>
    </tr>
    <tr>
      <th>Excerpt:</th>
      <td><?php echo $blog_post->getExcerpt() ?></td>
    </tr>
    <tr>
      <th>Body:</th>
      <td><?php echo $blog_post->getBody() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $blog_post->getCreatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('post/edit?id='.$blog_post->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('post/index') ?>">List</a>

<?php use_helper('Text', 'Date') ?>
 
<hr />
<?php if ($comments) : ?>
  <p><?php echo count($comments) ?> comments to this post.</p>
  <?php foreach ($comments as $comment): ?>
    <p><em>posted by <?php echo $comment->getAuthor() ?> on <?php echo format_date($comment->getCreatedAt()) ?></em></p>
    <div class="comment" style="margin-bottom:10px;">
      <?php echo simple_format_text($comment->getBody()) ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<?php echo link_to('Add a comment', 'comment/new?post_id='.$blog_post->getId()) ?>