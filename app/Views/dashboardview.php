<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<h1 class="dash-greet">Welcome to the Dashboard</h1>
    <!-- Display user's name or any other relevant information -->
    <p>Hello, <?= session('userData')['username'] ?>!</p>

   <ul id="dashboard-tabs">
    <li><a href="#" data-tab="add-house">Add House</a></li>
    <li><a href="#" data-tab="add-design">Add Design</a></li>
    <li><a href="#" data-tab="create-blog">Create Blog</a></li>
    <li><a href="#" data-tab="list-houses">Lists</a></li>
   
</ul>
    
  <div id="add-house" class="tab-content"> <h2>Add a New House</h2>
     <div class="form-container">
  <form action="<?= base_url('/posthouse') ?>" method="post" enctype="multipart/form-data" id="sell-house-form">
                <div class="form-step" id="step-1">
                    <div class="form-group">
                        <label for="name">House Name:</label>
                        <input type="text" id="name" name="name" placeholder="Enter house name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea  name="description" placeholder="Enter house description" required id="description"></textarea>
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
                    <!--<div class="form-group">-->
                    <!--    <label for="square_footage">Square Footage:</label>-->
                    <!--    <input type="number" id="square_footage" name="square_footage" placeholder="Enter square footage" required>-->
                    <!--</div>-->
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
          
<div id="add-design" class="tab-content" style="display: none;">
    <h2>Add a New Design</h2>
    <form action="<?= base_url('/postdesign') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" class="form-control" required>
                <option value="">Select Category</option>
                <?php foreach ($designCategories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
        <label for="images">Upload Images:</label>
        <input type="file" id="images" name="images[]" class="form-control-file" multiple accept="image/*">
        <small class="form-text text-muted">Max 8 images, up to 2MB each (jpg, jpeg, png)</small>
    </div>
    <div id="image-preview" class="image-preview"></div>
        <button type="submit" class="btn btn-primary">Add Design</button>
    </form>
</div>


<div id="create-blog" class="tab-content" style="display: none;">
    <!-- Form for creating a new blog post -->
    <h2>Create a New Blog Post</h2>
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
            <label for="published_date">Published Date:</label>
            <input type="date" id="published_date" name="published_date" class="form-control" required>
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

<div id="list-houses" class="tab-content" style="display: none;">
    <h2>List of Houses</h2>
    <!-- Placeholder for listing houses -->
</div>


 <script>
 document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('#dashboard-tabs a');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function(event) {
                event.preventDefault();

                tabContents.forEach(content => {
                    content.style.display = 'none';
                });

                const tabId = this.getAttribute('data-tab');
                const tabContent = document.getElementById(tabId);
                if (tabContent) {
                    tabContent.style.display = 'block';
                }

                tabs.forEach(tab => tab.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Set the default active tab
        if (tabs.length > 0) {
            tabs[0].click();
        }
    });
    
    //form
   function setupImagePreview(inputElement, previewElement) {
    inputElement.addEventListener('change', function(event) {
        const imagePreview = previewElement;
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
}

// Usage for Houses Image Upload Form
const housesImagesInput = document.getElementById('houses-images');
const housesImagePreview = document.getElementById('houses-image-preview');
if (housesImagesInput && housesImagePreview) {
    setupImagePreview(housesImagesInput, housesImagePreview);
}

// Usage for Designs Image Upload Form
const designsImagesInput = document.getElementById('images');
const designsImagePreview = document.getElementById('image-preview');
if (designsImagesInput && designsImagePreview) {
    setupImagePreview(designsImagesInput, designsImagePreview);
}

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


 
      
   
<?= $this->endSection() ?>