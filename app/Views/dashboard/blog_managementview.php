<?= $this->extend('layouts/dash_base') ?> 
<?= $this->section('dash_content') ?>

<div class="container">
        <section class="blog-management">
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
            <textarea id="content" name="content" class="form-control" rows="6" required></textarea>
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
                                <th>ID</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Blog Post A</td>
                                <td>
                                    <button>Edit</button>
                                    <button>Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Blog Post B</td>
                                <td>
                                    <button>Edit</button>
                                    <button>Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
<?= $this->endSection() ?>