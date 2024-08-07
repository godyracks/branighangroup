<?= $this->extend('layouts/dash_base') ?>
<?= $this->section('dash_content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Edit Design</h2>
            <form action="<?= base_url('/dashboard/updateDesign/' . $design['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= old('name', $design['name']) ?>">
                    <!-- Display validation error if exists -->
                    <small class="text-danger"><?= session('errors.name') ?></small>
                </div>

               <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control"><?= old('description', $design['description']) ?></textarea>
                    <!-- Display validation error if exists -->
                    <small class="text-danger"><?= session('errors.description') ?></small>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>" <?= old('category_id', $design['category_id']) == $category['id'] ? 'selected' : '' ?>>
                                <?= $category['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <!-- Display validation error if exists -->
                    <small class="text-danger"><?= session('errors.category_id') ?></small>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" class="form-control" value="<?= old('price', $design['price']) ?>">
                    <!-- Display validation error if exists -->
                    <small class="text-danger"><?= session('errors.price') ?></small>
                </div>

                <!-- File input for images -->
                <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" name="images[]" id="images" class="form-control-file" multiple>
                    <!-- Display validation error if exists -->
                    <small class="text-danger"><?= session('errors.images') ?></small>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Design</button>
                    <a href="<?= base_url('/dashboard') ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
