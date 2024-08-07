<?= $this->extend('layouts/dash_base') ?>
<?= $this->section('dash_content') ?>
<div class="container" style="max-width:800px;">
    <h1>Edit House</h1>
    <?php if (session()->has('errors')): ?>
        <div>
            <?php foreach (session('errors') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('/dashboard/updatehouse/' . $house['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?= esc($house['name']) ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required><?= esc($house['description']) ?></textarea>
        </div>
        <div class="flex-group">
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" value="<?= esc($house['price']) ?>" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>" <?= $category['id'] == $house['category_id'] ? 'selected' : '' ?>><?= esc($category['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="bedrooms">Bedrooms:</label>
            <input type="text" name="bedrooms" value="<?= esc($house['bedrooms']) ?>" required>
        </div>

        <div class="form-group">
            <label for="bathrooms">Bathrooms:</label>
            <input type="text" name="bathrooms" value="<?= esc($house['bathrooms']) ?>" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" value="<?= esc($house['address']) ?>" required>
        </div>

        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" value="<?= esc($house['city']) ?>" required>
        </div>

        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" name="state" value="<?= esc($house['state']) ?>" required>
        </div>

        <div class="form-group">
            <label for="zip_code">Zip Code:</label>
            <input type="text" name="zip_code" value="<?= esc($house['zip_code']) ?>" required>
        </div>

        <div class="form-group">
            <label for="year_built">Year Built:</label>
            <input type="text" name="year_built" value="<?= esc($house['year_built']) ?>" required>
        </div>

        <div class="form-group">
            <label for="lot_size">Lot Size:</label>
            <input type="text" name="lot_size" value="<?= esc($house['lot_size']) ?>" required>
        </div>

        <div class="form-group">
            <label for="garage_spaces">Garage Spaces:</label>
            <input type="text" name="garage_spaces" value="<?= esc($house['garage_spaces']) ?>" required>
        </div>
         <div class="form-group">
            <label for="latitude">Latitude:</label>
            <input type="text" name="latitude" value="<?= esc($house['latitude']) ?>" required>
        </div>

        <div class="form-group">
            <label for="longitude">Longitude:</label>
            <input type="text" name="longitude" value="<?= esc($house['longitude']) ?>" required>
        </div>
        </div>
        <div class="form-group">
            <label for="amenities">Amenities:</label>
            <input type="text" name="amenities" value="<?= esc($house['amenities']) ?>" required>
        </div>

       

        <div class="form-group">
            <label for="images">Images (upload to replace existing / Highly Optional):</label>
            <input type="file" name="images[]" multiple>
        </div>

        <button type="submit" class="submit-button">Update House</button>
    </form>
</div>
<style>
     .submit-button{
    width: 160px;
    height: 40px;
    margin-top: 20px;
    margin: 0 auto;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 18px;
    
    background-color: rgb(227, 157, 8);
}
</style>
<?= $this->endSection() ?>
