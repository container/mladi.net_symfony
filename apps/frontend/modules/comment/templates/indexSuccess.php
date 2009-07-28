<h1>Comment List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Blog post</th>
      <th>Author</th>
      <th>Email</th>
      <th>Body</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($blog_comment_list as $blog_comment): ?>
    <tr>
      <td><a href="<?php echo url_for('comment/edit?id='.$blog_comment->getId()) ?>"><?php echo $blog_comment->getId() ?></a></td>
      <td><?php echo $blog_comment->getBlogPostId() ?></td>
      <td><?php echo $blog_comment->getAuthor() ?></td>
      <td><?php echo $blog_comment->getEmail() ?></td>
      <td><?php echo $blog_comment->getBody() ?></td>
      <td><?php echo $blog_comment->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('comment/new') ?>">New</a>
