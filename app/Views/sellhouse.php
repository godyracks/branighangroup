<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<main class="main-content">
    <div class="form-container">
        <div class="sell-house-form">
            <h2>Sell Your House</h2>
            <form action="<?= base_url('/sellhouse') ?>" method="post" enctype="multipart/form-data" id="sell-house-form">
                <div class="form-step" id="step-1">
                    <div class="form-group">
                        <label for="name">House Name:</label>
                        <input type="text" id="name" name="name" placeholder="Enter house name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" placeholder="Enter house description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price (KES):</label>
                        <input type="number" id="price" name="price" placeholder="Enter price" required>
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
                        <label for="bedrooms">Bedrooms:</label>
                        <input type="number" id="bedrooms" name="bedrooms" placeholder="Enter number of bedrooms" required>
                    </div>
                    <div class="form-group">
                        <label for="bathrooms">Bathrooms:</label>
                        <input type="number" id="bathrooms" name="bathrooms" placeholder="Enter number of bathrooms" required>
                    </div>
                    <div class="form-group">
                        <label for="square_footage">Square Footage:</label>
                        <input type="number" id="square_footage" name="square_footage" placeholder="Enter square footage" required>
                    </div>
                </div>
                <div class="form-step" id="step-2" style="display: none;">
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" placeholder="Enter address" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" placeholder="Enter city" required>
                    </div>
                    <div class="form-group">
                        <label for="state">State:</label>
                        <input type="text" id="state" name="state" placeholder="Enter state" required>
                    </div>
                    <div class="form-group">
                        <label for="zip_code">Zip Code:</label>
                        <input type="text" id="zip_code" name="zip_code" placeholder="Enter zip code" required>
                    </div>
                    <div class="form-group">
                        <label for="year_built">Year Built:</label>
                        <input type="number" id="year_built" name="year_built" placeholder="Enter year built" required>
                    </div>
                    <div class="form-group">
                        <label for="lot_size">Lot Size (in acres):</label>
                        <input type="number" id="lot_size" name="lot_size" placeholder="Enter lot size" required>
                    </div>
                    <div class="form-group">
                        <label for="garage_spaces">Garage Spaces:</label>
                        <input type="number" id="garage_spaces" name="garage_spaces" placeholder="Enter number of garage spaces" required>
                    </div>
                    <div class="form-group">
                        <label for="amenities">Amenities:</label>
                        <input type="text" id="amenities" name="amenities" placeholder="Enter amenities" required>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude:</label>
                        <input type="text" id="latitude" name="latitude" placeholder="Enter latitude" required>
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude:</label>
                        <input type="text" id="longitude" name="longitude" placeholder="Enter longitude" required>
                    </div>
                </div>
                <div class="form-step" id="step-3" style="display: none;">
                    <div class="form-group">
                        <label for="images">Upload Images (4 to 8 images):</label>
                        <input type="file" id="images" name="images[]" multiple accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <div id="image-preview" class="image-preview"></div>
                    </div>
                </div>
                <div class="form-group" id="button-group">
                    <button type="button" class="prev-button" onclick="prevStep()">Previous</button>
                    <button type="button" class="next-button" onclick="nextStep()">Next</button>
                    <button type="submit" class="submit-button" style="display: none;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    document.getElementById('images').addEventListener('change', function(event) {
        const imagePreview = document.getElementById('image-preview');
        const files = event.target.files;

        // Clear existing images
        imagePreview.innerHTML = '';

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

    let currentStep = 1;
    const totalSteps = 3;

    function showStep(step) {
        for (let i = 1; i <= totalSteps; i++) {
            document.getElementById('step-' + i).style.display = 'none';
        }
        document.getElementById('step-' + step).style.display = 'block';

        if (step === 1) {
            document.querySelector('.prev-button').style.display = 'none';
        } else {
            document.querySelector('.prev-button').style.display = 'inline-block';
        }

        if (step === totalSteps) {
            document.querySelector('.next-button').style.display = 'none';
            document.querySelector('.submit-button').style.display = 'inline-block';
        } else {
            document.querySelector('.next-button').style.display = 'inline-block';
            document.querySelector('.submit-button').style.display = 'none';
        }
    }

    function validateStep(step) {
        const inputs = document.querySelectorAll(`#step-${step} [required]`);
        for (let input of inputs) {
            if (!input.value) {
                return false;
            }
        }
        return true;
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }

    function nextStep() {
        if (validateStep(currentStep)) {
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        } else {
            alert('Please fill out all required fields.');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        showStep(currentStep);
    });
</script>

<style>
      .form-container{
        max-width: 800px;
        margin: 0 auto;
    }
    .sell-house-form {
        margin: 0 auto;
        padding: 20px;
        /* background-color: #f9f9f9; */
        /*border-radius: 8px;*/
        /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
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
        font-weight: bold;
        margin-bottom: 5px;
    }
    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group textarea,
    .form-group select,
    .form-group input[type="file"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }
    .image-preview {
        display: flex;
        gap: 10px;
        overflow-x: auto;
        padding-bottom: 10px;
    }
    .preview-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .submit-button {
        width: 100%;
        padding: 15px;
        background-color: #28a745;
        color: white;
        font-size: 18px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .submit-button:hover {
        background-color: #218838;
    }
    #button-group {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
    .prev-button, .next-button, .submit-button {
        padding: 15px;
        font-size: 18px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .prev-button {
        background-color: #6c757d;
        color: white;
    }
    .prev-button:hover {
        background-color: #5a6268;
    }
    .next-button {
        background-color: #007bff;
        color: white;
    }
    .next-button:hover {
        background-color: #0069d9;
    }
    .submit-button {
        background-color: #28a745;
        color: white;
    }
    .submit-button:hover {
        background-color: #218838;
    }
</style>
<?= $this->endSection() ?>
