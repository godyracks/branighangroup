<?= $this->extend('layouts/dash_base') ?> 
<?= $this->section('dash_content') ?>

<div class="container" style="max-width:800px;">
    <section class="edit-blog">
        <h2>Edit Blog Post</h2>
        <div class="crud-operations">
        <form action="<?= base_url('/dashboard/update_blog/' . $blog['blog_id']) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="author_name">Author Name:</label>
                <input type="text" id="author_name" name="author_name" class="form-control" value="<?= $blog['author_name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" value="<?= $blog['title'] ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="description" name="description" class="form-control"><?= $blog['content'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="article_image">Article Image:</label>
                <input type="file" id="article_image" name="article_image" class="form-control-file" accept="image/*">
                <small class="form-text text-muted">Leave blank to keep current image. Max 2MB (jpg, jpeg, png)</small>
            </div>
            <div class="form-group">
                <label for="tags">Tags:</label>
                <input type="text" id="tags" name="tags" class="form-control" value="<?= $blog['tags'] ?>">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" class="form-control" value="<?= $blog['category'] ?>">
            </div>
            
                <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Blog</button>
            </div>
        </form>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
