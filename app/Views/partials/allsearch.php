<style>
  /* General Styling for Filters */
/* General Styling for Filters */
.search-filters {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.filter-item {
    margin: 0 15px;
    padding: 10px 20px; /* Add padding for better spacing */
    cursor: pointer;
    font-weight: bold;
    transition: color 0.3s, font-size 0.3s, border 0.3s, background-color 0.3s; /* Smooth transitions */
    border-radius: 20px; /* Rounded corners */
}

.filter-item.active {
    color: white;
     background-color: rgba(253, 161, 114, 0.5);
    border: none;
    text-decoration: none;
    font-size: 12px;
}


/* Property Type Cards */
.property-type-cards-container {
    display: flex;
    justify-content: center;
    max-width: 600px;
    margin: 0 auto;
}
.property-type-cards {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px; /* Evenly space the cards */
    width: 100%; /* Ensure the cards take full width within the max-width constraint */
}


#filter-by-property-type {
    text-align: center;
}




/* Amenity Cards */
.filter-list {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
}

.amenity-card {
    text-decoration: none;
    background-color: #f8f8f8;
    color: #333;
    padding: 10px 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
    text-align: center;
}

.amenity-card:hover {
    background-color: #007bff;
    color: #fff;
}


.filter-title {
    text-align: center;
    margin-top: 20px;
    margin-bottom: 20px;
}


.home-results {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    
}

/* Property Cards */
.property {
    display: flex;
    align-items: center;
    padding: 10px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    max-width: 400px;
    text-decoration: none;
    color: #333;
}

.property img {
    width: 100px;
    height: auto;
    margin-right: 20px;
}

.property-details {
    flex-grow: 1;
}

.property-details h3 {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
}

.property-details p {
    margin: 5px 0;
    font-size: 14px;
}

.price {
    font-weight: bold;
    color: #007bff;
}

/* Style for Amenities Section */
.amenities-cards {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.amenity-card {
    width: 150px;
    height: 150px;
    background-color: #f0f0f0; /* Light gray background */
    margin: 10px;
    padding: 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.amenity-card i {
    font-size: 36px; /* Icon size */
    margin-bottom: 10px;
}

.amenity-card p {
    margin: 0;
    font-size: 14px;
    font-weight: bold;
}


</style>

<section class="find-home" id="find-home">
    <h1 class="find-home-title">Find Your Dream Home</h1>
    <p class="find-home-text">We help you find a house that fits your lifestyle, dreams, and budget!</p>
</section>

<!-- Search Filters Section -->
<section class="search-filters" id="search-filters">
    <div class="filter-item active" data-tab="search-by-location">Search by Location</div>
    <div class="filter-item" data-tab="filter-by-property-type">Filter by Property Type</div>
    <div class="filter-item" data-tab="filter-by-features">Filter by Amenities</div>
</section>


<section class="search-section active" id="search-by-location">
    <section class="search-property">
        <div class="search-property-headline">Search Property Location</div>
        <div class="search-property-description">
            Simply enter the property location and press the search button (e.g., 'Nairobi').
        </div>
       <div class="search-input-container">
            <div class="search-input-wrapper">
                <i class="material-icons search-icon">search</i>
                <input type="text" class="search-input" placeholder="Search property location">
            </div>
            <button class="search-button">Search</button>
        </div>

    </section>

  
    <section class="home-results" id="home-results">
      
    </section>
</section>

<!-- Filter by Property Type Section -->
<section class="search-section" id="filter-by-property-type">
    <h2 class="filter-title">Select Property Type</h2>
    <div class="property-type-cards-container">
    <div class="property-type-cards">

        <?php foreach ($categories as $category) : ?>
            <a href="<?= base_url('filter?category=' . $category['id']) ?>" class="property-card"><?= $category['name'] ?></a>
        <?php endforeach; ?>
    </div>
    </div>
</section>


<section class="search-section" id="filter-by-amenities">
    <h2 class="filter-title">Filter by Amenities</h2>
    
    <div class="filter-list">
    <div class="amenities-cards">
        <!-- Amenity Cards -->
        <div class="amenity-card">
            <i class="fas fa-car"></i>
            <p>Garage</p>
        </div>
        <div class="amenity-card">
            <i class="fas fa-swimmer"></i>
            <p>Swimming Pool</p>
        </div>
        <div class="amenity-card">
            <i class="fas fa-hot-tub"></i>
            <p>Jacuzzi</p>
        </div>
    </div>
</section>




<script>
document.addEventListener('DOMContentLoaded', () => {
    const filterItems = document.querySelectorAll('.filter-item');
    const sections = document.querySelectorAll('.search-section');
    const searchInput = document.querySelector('.search-input');
    const searchButton = document.querySelector('.search-button');
    const searchResultsContainer = document.getElementById('home-results');

    const formatPrice = (price) => {
        // Format the price using Intl.NumberFormat
        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'KES',
        });
        return formatter.format(price);
    };

    filterItems.forEach(item => {
        item.addEventListener('click', () => {
            filterItems.forEach(el => el.classList.remove('active'));
            item.classList.add('active');

            sections.forEach(section => section.classList.remove('active'));
            document.getElementById(item.getAttribute('data-tab')).classList.add('active');
        });
    });

    document.querySelector('.filter-item.active').click();

    const performSearch = () => {
        const query = searchInput.value.trim(); // Trim whitespace

        if (query === '') {
            // If query is empty, clear search results and return
            searchResultsContainer.innerHTML = '';
            return;
        }

        const location = query; // Assuming the location is the input value

        fetch(`https://branighangroup.com/homesearch?location=${encodeURIComponent(location)}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                searchResultsContainer.innerHTML = '';

                if (!data || data.length === 0) {
                    searchResultsContainer.innerHTML = '<p>No results found</p>';
                    return;
                }

                data.forEach(property => {
                    const propertyElement = document.createElement('a');
                    propertyElement.href = `<?= base_url('/show/') ?>${property.id}/${encodeURIComponent(property.name)}`;
                    propertyElement.classList.add('property');

                    propertyElement.innerHTML = `
                        <img src="https://branighangroup.com/public${property.image1_url}" alt="${property.name}" />
                        <div class="property-details">
                            <h3>${property.name}</h3>
                            <p class="price">Price: ${formatPrice(property.price)}</p>
                        </div>
                    `;
                    searchResultsContainer.appendChild(propertyElement);
                });

                // Update the URL
                const queryParams = new URLSearchParams({ location: query });
                history.pushState({}, '', window.location.pathname + '?' + queryParams.toString());
            })
            .catch(error => console.error('Error fetching data:', error.message));
    };

    // Perform search when the search button is clicked
    searchButton.addEventListener('click', event => {
        event.preventDefault(); // Prevent form submission
        performSearch();
    });

    // Perform search when Enter key is pressed in the search input
    searchInput.addEventListener('keyup', event => {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent form submission
            performSearch();
        }
    });
});

</script>
