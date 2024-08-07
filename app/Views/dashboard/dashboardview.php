<?= $this->extend('layouts/dash_base') ?>
<?= $this->section('dash_content') ?>
<style>
  
  

  
    </style>
<div class="container">
    <section class="tabs">
        <div class="tab-header">
            <button class="tab-link active" data-tab="overview">Overview</button>
            <button class="tab-link" data-tab="properties">Properties Management</button>
            <button class="tab-link" data-tab="designs">Design Management</button>
        </div>
        <div class="tab-content active" id="overview">
            <h2>Overview</h2>
            <div class="summary-cards">
 <div class="card card-active">
    <div class="card-header">
        <h3 class="card-title">Total Houses</h3>
    </div>
  
        <p><?php echo count($houses); ?></p>
    
</div>
                  <div class="card card-sold">
    <div class="card-header">
        <h3 class="card-title">Total Designs</h3>
    </div>
 
        <p><?php echo count($designs); ?></p>
  
</div>
                 <div class="card card-listing">
                    <h3>Active Listings</h3>
                    <p>**</p>
                </div>
                <div class="card">
                    <h3>New Inquiries</h3>
                      <p style="color: rgb(106, 187, 237);">**</p>
                </div>
            </div>
            <div class="recent-activities">
                <h2>Recent Activities</h2>
                <ul class="timeline">
                    <li>
                        <span class="date">June 24, 2024</span>
                        <span class="activity">Property #123 added to active listings.</span>
                    </li>
                    <li>
                        <span class="date">June 23, 2024</span>
                        <span class="activity">New inquiry from Eng Dev</span>
                    </li>
                    <li>
                        <span class="date">June 22, 2024</span>
                        <span class="activity">Property #101 sold.</span>
                    </li>
                    <li>
                        <span class="date">June 21, 2024</span>
                        <span class="activity">Design #45 uploaded.</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="properties">
            <h2>Properties Management</h2>
            <div class="crud-operations">
                <button class="btn" onclick="showForm('add-property-form')">Create New Property</button>
                <div id="add-property-form" class="form-container">
                    <h3>Add New Property</h3>
                    <form action="<?= base_url('/posthouse') ?>" method="post" enctype="multipart/form-data" id="sell-house-form">
                        <div class="form-step" id="step-1">
                            <div class="form-group">
                                <label for="name">House Name:</label>
                                <input type="text" id="name" name="name" placeholder="Enter house name" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" placeholder="Enter house description"  id="description"class="form-control"></textarea>
                            </div>
                             <div class="flex-group">
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
                              </div>
                        </div>
                        <div class="form-step" id="step-2" style="display: none;">
                              <div class="flex-group">
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
                                <label for="latitude">Latitude:</label>
                                <input type="text" id="latitude" name="latitude" placeholder="Enter latitude" required>
                            </div>
                            <div class="form-group">
                                <label for="longitude">Longitude:</label>
                                <input type="text" id="longitude" name="longitude" placeholder="Enter longitude" required>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="amenities">Amenities:</label>
                                <input type="text" id="amenities" name="amenities" placeholder="Enter amenities" required>
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
 <div class="property-list">
    <h3>View Properties</h3>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($houses as $house): ?>
            <tr>
                <td><img src="<?= base_url('public/' . $house['image1_url']) ?>" alt="<?= $house['name'] ?>" width="100"></td>
                <td><?= $house['name'] ?></td>
                <td><?= $house['price'] ?></td>
                <td>
                    <a href="<?= base_url('/dashboard/edithouse/' . $house['id']) ?>" style="color:white"><span class="material-icons">edit</span></a><br><br>
                  <form action="<?= base_url('/dashboard/houses/delete/' . $house['id']); ?>" method="post" id="deleteHouseForm<?= $house['id']; ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" onclick="confirmDeleteHouse(<?= $house['id']; ?>)" style="color:red"><span class="material-icons">delete</span></button>
        </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


        </div>
        <div class="tab-content" id="designs">
            <h2>Design Management</h2>
            <div class="crud-operations">
                <button class="btn" onclick="showForm('add-design-form')">Add New Design</button>
                <div id="add-design-form" class="form-container">
                    <h3>Add New Design</h3>
                    <form action="<?= base_url('/postdesign') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" class="form-control" rows="16" d></textarea>
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
                        <div class="form-group">
                            <div id="image-preview" class="image-preview"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Design</button>
                    </form>
                </div>
            </div>
            <div class="design-list">
    <h3>View Designs</h3>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($designs as $design): ?>
            <tr>
                <td><img src="<?= base_url('public/' . $design['image1_url']) ?>" alt="<?= $design['name'] ?>" width="100"></td>
                <td><?= $design['name'] ?></td>
                <td><?= $design['price'] ?></td>
                <td>
                    <a href="<?= base_url('/dashboard/editdesign/' . $design['id']) ?>" style="color:white"><span class="material-icons">edit</span></a><br><br>
                    <form action="<?= base_url('/dashboard/designs/delete/' . $design['id']); ?>" method="post" id="deleteForm<?= $design['id']; ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" onclick="confirmDelete(<?= $design['id']; ?>)"><span class="material-icons">delete</span></button>
        </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

        </div>
    </section>
</div>
<script>
    // Form and Image Preview Scripts
    function setupImagePreview(inputElement, previewElement) {
        inputElement.addEventListener('change', function(event) {
            const imagePreview = previewElement;
            const files = event.target.files;

            imagePreview.innerHTML = '';

            if (files.length < 4 || files.length > 8) {
                alert('Please select between 4 and 8 images.');
                event.target.value = '';
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

    const housesImagesInput = document.getElementById('houses-images');
    const housesImagePreview = document.getElementById('houses-image-preview');
    if (housesImagesInput && housesImagePreview) {
        setupImagePreview(housesImagesInput, housesImagePreview);
    }

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
    
     function confirmDelete(designId) {
        if (confirm('Are you sure you want to delete this design?')) {
            document.getElementById('deleteForm' + designId).submit();
        }
    }
    
      function confirmDeleteHouse(houseId) {
        if (confirm('Are you sure you want to delete this house?')) {
            document.getElementById('deleteHouseForm' + houseId).submit();
        }
    }
</script>
<?= $this->endSection() ?>
