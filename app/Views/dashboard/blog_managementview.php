<?= $this->extend('layouts/dash_base') ?> 
<?= $this->section('dash_content') ?>

<div class="container" style="max-width:800px;">
        <section class="blog-management" >
            <h2>Blog Management</h2>
            <div class="crud-operations">
                <button class="btn" onclick="showForm('add-blog-form')">Create New Blog Post</button>
                <div id="add-blog-form" class="form-container">
                    <h3>Add New Blog Post</h3>
                    <form action="<?= base_url('/postblog') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="author_name">Author Name:</label>
            <input type="text" id="author_name" name="author_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="description" name="description" class="form-control"  ></textarea>
        </div>
        <div class="form-group">
            <label for="article_image">Article Image:</label>
            <input type="file" id="article_image" name="article_image" class="form-control-file" accept="image/*" required>
            <small class="form-text text-muted">Max 2MB (jpg, jpeg, png)</small>
        </div>
        <div class="form-group">
            <label for="tags">Tags:</label>
            <input type="text" id="tags" name="tags" class="form-control">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Blog</button>
    </form>
                </div>
                <div class="blog-list">
                    <h3>View All Posts</h3>
                    <table>
                        <thead>
                                                   <tr>
                           
                            <th>Image</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>

                        </thead>
                         <tbody>
                        <?php foreach ($blogs as $blog): ?>
                        <tr>
                           
                            <td><img src="<?= base_url('public/'.$blog['article_image']) ?>" alt="<?= $blog['title'] ?>" style="width: 100px; height: auto;"></td>
                            <td><?= $blog['title'] ?></td>
                            <td>
                                <a href="<?= base_url('/dashboard/edit_blog/' . $blog['blog_id']) ?>" style="color:white"><span class="material-icons">edit</span></a><br/><br />
                                <a href="<?= base_url('/dashboard/blog/delete/' . $blog['blog_id']) ?>" onclick="return confirm('Are you sure you want to delete this post?');" style="color:red"><span class="material-icons">delete</span></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: none;
        border-bottom: 1px solid #000;
        padding: 8px;
        text-align: left;
    }

    th {
        border-bottom: 2px solid #000;
    }

    tr:last-child td {
        border-bottom: none;
    }

    img {
        max-width: 100px;
        height: auto;
    }
</style>
<?= $this->endSection() ?>