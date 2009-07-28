<h1>Post List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Excerpt</th>
      <th>Body</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($blog_post_list as $blog_post): ?>
    <tr>
      <td><a href="<?php echo url_for('post/show?id='.$blog_post->getId()) ?>"><?php echo $blog_post->getId() ?></a></td>
      <td><?php echo link_to($blog_post->getTitle(), '@post?title='.$blog_post->getStrippedTitle()) ?></td>
      <td><?php echo $blog_post->getExcerpt() ?></td>
      <td><?php echo $blog_post->getBody() ?></td>
      <td><?php echo $blog_post->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php print_r($this);?>
  <a href="<?php echo url_for('post/new') ?>">New</a>
