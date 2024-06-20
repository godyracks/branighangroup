<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<main class="main-content">
<div class="container">
    <div class="left-part">
        <nav class="house-nav">
            <a href="<?= base_url('/') ?>">Home</a> &gt; <a href="<?= base_url('houses') ?>">Houses in Kenya</a> &gt; <span>Available</span>
        </nav>
        <h2>Search</h2>
        <p>Simply write the description of the house</p>
        <div class="search-input3">
            <input type="text" id="search" placeholder="1 bedroom cabin">
            <i class="material-icons">search</i>
            <div id="search-results" class="search-results"></div>
        </div>
        <form id="filterForm" action="<?= base_url('filter') ?>" method="get">
            <h3>Categories</h3>
            <div class="categories">
                <?php foreach ($categories as $category) : ?>
                    <button type="submit" name="category" value="<?= $category['id'] ?>"><?= $category['name'] ?></button>
                <?php endforeach; ?>
            </div>
            <h3>Filter by budget</h3>
            <div class="budget-filters2">
                <button type="submit" name="budget" value="0-500k">0-500k</button>
                <button type="submit" name="budget" value="500k-1m">500k-1m</button>
                <button type="submit" name="budget" value="1m-2m">1m-2m</button>
                <button type="submit" name="budget" value="2m-3m">2m-3m</button>
                <button type="submit" name="budget" value="3m-5m">3m-5m</button>
                <button type="submit" name="budget" value="5m-10m">5m-10m</button>
                <button type="submit" name="budget" value="Above 10m">Above 10m</button>
            </div>
        </form>
    </div>
    <div class="right-part">
        <?php if (!empty($message)): ?>
            <div class="message">
                <p><?= $message ?></p>
            </div>
        <?php endif; ?>
        <div class="cards">
            <?php if (!empty($houses)) : ?>
                <?php foreach ($houses as $house) : ?>
                <div class="card">
                    <a href="<?= site_url('show/' . $house['id'] . '/' . url_title($house['name'], '-', TRUE)) ?>">
                        <img src="<?= base_url('/public/') . $house['image1_url'] ?>" alt="<?= $house['name'] ?>">
                        <div class="card-info">
                            <h4><?= $house['name'] ?></h4>
                             <?php
                                    // Limit description to 20 words
                                    $description = $house['description'];
                                    $descriptionWords = explode(' ', $description);
                                    $limitedDescription = implode(' ', array_slice($descriptionWords, 0, 18));
                                    echo "<p>{$limitedDescription}...</p>";
                                    ?>
                            <div class="card-footer">
                                <span class="price">KES <?= number_format($house['price'], 2) ?></span>
                                <button class="buy-button">Buy</button>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="no-houses">
                    <p>No houses available for the selected criteria.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="pagination-container">
    <div class="pagination">
        <?php if ($currentPage > 1) : ?>
            <div class="page">
                <a href="<?= base_url('houses?page=' . ($currentPage - 1)) ?>"><i class="material-icons">arrow_back</i></a>
            </div>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <div class="page <?= ($i == $currentPage) ? 'active' : '' ?>">
                <a href="<?= base_url('houses?page=' . $i) ?>"><?= $i ?></a>
            </div>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages) : ?>
            <div class="page">
                <a href="<?= base_url('houses?page=' . ($currentPage + 1)) ?>"><i class="material-icons">arrow_forward</i></a>
            </div>
        <?php endif; ?>
    </div>
</div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryButtons = document.querySelectorAll('.categories button');
    const searchInput = document.getElementById('search');
    const searchResults = document.getElementById('search-results');

   
    categoryButtons.forEach(button => {
        button.addEventListener('click', function(event) {
         
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            
           
            event.currentTarget.classList.add('active');
        });
    });

   
    searchInput.addEventListener('keyup', function() {
        const query = searchInput.value;

        if (query.length > 2) { 
            fetch(`<?= base_url('search') ?>?query=${query}`)
                .then(response => response.json())
                .then(houses => {
                    searchResults.innerHTML = ''; 

                    if (houses.length > 0) {
                        houses.forEach(house => {
                            const houseElement = document.createElement('div');
                            houseElement.classList.add('search-result-item');

                            
                            const formatter = new Intl.NumberFormat('en-US', {
                                style: 'currency',
                                currency: 'KES',
                                minimumFractionDigits: 0
                            });
                            const formattedPrice = formatter.format(house.price);

                            houseElement.innerHTML = `
                                <img src="<?= base_url('/public/') ?>${house.image_url}" alt="${house.name}">
                                <div class="result-info">
                                    <h4>${house.name}</h4>
                                    <p>${house.description}</p>
                                    <span class="price">${formattedPrice}</span>
                                </div>
                            `;

                            searchResults.appendChild(houseElement);
                        });
                    } else {
                        searchResults.innerHTML = '<p>No houses found</p>';
                    }
                })
                .catch(error => console.error('Error fetching search results:', error));
        } else {
            searchResults.innerHTML = ''; 
        }
    });
});
</script>
<?= $this->endSection() ?>
