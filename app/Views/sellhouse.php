<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main class="main-content">
    <div class="form-container">
        <div class="sell-house-form">
            <h2>Sell Your House</h2>
            <form action="<?= base_url('/sellhouse') ?>" method="post" enctype="multipart/form-data" id="sell-house-form">
                <div class="form-group">
                    <label for="name">House Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter house name" required style=" padding: 20px 40px; border-radius: 14px;">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" placeholder="Enter house description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price (KES):</label>
                    <input type="number" id="price" name="price" placeholder="Enter price" required style=" padding: 20px 40px; border-radius: 14px;">
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select id="category_id" name="category_id" required>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <label for="images">Upload Images (4 to 8 images):</label>
                    <input type="file" id="images" name="images[]" multiple="multiple" accept="image/*" required>
                </div>
                <div class="form-group">
                    <div id="image-preview" class="image-preview"></div>
                </div>
                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('images');
        const imagePreview = document.getElementById('image-preview');

        imageInput.addEventListener('change', function(event) {
            const files = event.target.files;

            imagePreview.innerHTML = ''; // Clear existing images

            // Ensure number of files selected is between 4 and 8
            if (files.length < 4 || files.length > 8) {
                alert('Please select between 4 and 8 images.');
                event.target.value = ''; // Clear the input
                return;
            }

            for (const file of files) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('preview-image');
                    imagePreview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });

        // Apply styles to preview images
        imagePreview.style.display = 'flex';
        imagePreview.style.gap = '10px';
        imagePreview.style.overflowX = 'auto';
        imagePreview.style.paddingBottom = '10px';

        const style = document.createElement('style');
        style.innerHTML = `
            .preview-image {
                width: 100px;
                height: 100px;
                object-fit: cover;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            .form-container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: transparent;
                border-radius: 8px;
               
            }
            .sell-house-form {
                display: flex;
                flex-direction: column;
            }
            .sell-house-form h2 {
                text-align: center;
                margin-bottom: 20px;
            }
            .form-group {
                margin-bottom: 15px;
            }
            .form-group label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            .form-group input,
            .form-group textarea,
            .form-group select {
                width: 100%;
                padding: 20px 40px;
                border: 1px solid #ccc;
                border-radius: 14px;
                box-sizing: border-box;
            }
            .submit-button {
                padding: 25px 50px;
                background-color: #e0a300;
                color: white;
                border: none;
                border-radius: 14px;
                cursor: pointer;
                font-size: 16px;
                margin-top: 10px;
                 margin-left: 0;
            }
            .submit-button:hover {
                background-color: #c38e00;
            }
        `;
        document.head.appendChild(style);
    });
</script>
<?= $this->endSection() ?>
