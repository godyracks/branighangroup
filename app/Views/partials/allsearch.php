<style>
    /* Existing styles */

    .search-filters {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }
    .filter-item {
        margin: 0 15px;
        padding: 10px 20px;
        cursor: pointer;
        font-weight: 700;
        transition: color .3s, font-size .3s, border .3s, background-color .3s;
        border-radius: 20px;
        text-align: center; /* Center the text */
    }

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
        gap: 20px;
        width: 100%;
    }

    #filter-by-property-type {
        text-align: center;
    }
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
        transition: background-color .3s, color .3s;
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
        font-weight: 700;
    }
    .property-details p {
        margin: 5px 0;
        font-size: 14px;
    }
    .price {
        font-weight: 700;
        color: #007bff;
    }

    /* Adjusted styles for search section */
    .search-section {
        display: none;
        padding: 20px; /* Add padding to separate sections */
    }
    .search-section.active {
        display: block;
    }
    .search-input-container {
        display: flex;
        align-items: center;
    }
    .search-input-wrapper {
        position: relative;
        flex: 1;
    }
    .search-results {
        width: 100%;
        margin-top: 20px;
    }
    .search-icon,
    .search-clear-icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        display: none; /* Hide by default */
        color: #f58220; /* Orange color */
    }
    .search-icon {
        left: 10px;
    }
    .search-clear-icon {
        right: 10px;
    }

    .search-input:focus + .search-icon,
    .search-results:not(:empty) + .search-icon,
    .search-input:focus + .search-clear-icon,
    .search-results:not(:empty) + .search-clear-icon {
        display: inline-block; /* Show when input is focused or results are present */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .property {
            flex-direction: column;
            align-items: flex-start;
        }
        .property img {
            margin-bottom: 10px;
        }
    }
</style>


<section class="find-home" id="find-home">
    <h1 class="find-home-title">Find Your Dream Home</h1>
    <p class="find-home-text">We help you find a house that fits your lifestyle, dreams, and budget!</p>
</section>

<section class="search-filters" id="search-filters">
    <div class="filter-item active" data-tab="search-by-location">Search by Location</div>
    <div class="filter-item" data-tab="filter-by-property-type">Filter by Property Type</div>
    <div class="filter-item" data-tab="filter-by-features">Filter by Amenities</div>
</section>

<section class="search-section" id="search-by-location">
    <section class="search-property">
        <div class="search-property-headline">Search Property Location</div>
        <div class="search-property-description">Simply enter the property location to get real-time results (e.g., 'Nairobi').</div>
        <div class="search-input-container">
            <div class="search-input-wrapper">
                <i class="material-icons search-icon">search</i>
                <input type="text" class="search-input" placeholder="Search property location">
                <span class="material-icons search-clear-icon" id="clear-search">clear</span>
                <div class="search-results" id="search-results"></div>
            </div>
        </div>
       
    </section>
</section>

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

<section class="search-section" id="filter-by-features">
    <h2 class="filter-title">Filter by Amenities</h2>
    <div class="filter-list">
        <div class="amenities-cards">
            <div class="amenity-card">
                <span class="material-icons">directions_car</span>
                <p>Garage</p>
            </div>
            <div class="amenity-card">
                <span class="material-icons">pool</span>
                <p>Swimming Pool</p>
            </div>
            <div class="amenity-card">
                <span class="material-icons">hot_tub</span>
                <p>Jacuzzi</p>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const filterItems = document.querySelectorAll(".filter-item");
        const searchSections = document.querySelectorAll(".search-section");
        const searchInput = document.querySelector(".search-input");
        const searchResults = document.getElementById("search-results");
        const clearSearch = document.getElementById("clear-search");

        // Function to toggle active state of filter items and search sections
        filterItems.forEach(item => {
            item.addEventListener("click", () => {
                filterItems.forEach(filter => filter.classList.remove("active"));
                item.classList.add("active");

                // Hide all search sections
                searchSections.forEach(section => section.classList.remove("active"));

                // Show the corresponding search section
                const tabId = item.getAttribute("data-tab");
                document.getElementById(tabId).classList.add("active");
            });
        });

        // Initially activate the first filter item
        document.querySelector(".filter-item.active").click();

        // Function to fetch search results based on input value
        const fetchSearchResults = () => {
            const query = searchInput.value.trim();
            if (query !== "") {
                fetch(`http://localhost/bg/homesearch?location=${encodeURIComponent(query)}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Network response was not ok");
                        }
                        return response.json();
                    })
                    .then(data => {
                        searchResults.innerHTML = ""; // Clear previous results
                        if (!data || data.length === 0) {
                            searchResults.innerHTML = "<p>No results found</p>";
                            return;
                        }
                        const resultList = document.createElement("ul");
                        resultList.classList.add("search-results-list");
                        data.forEach(property => {
                            const listItem = document.createElement("li");
                            listItem.classList.add("search-result-item");
                            const propertyLink = document.createElement("a");
                            propertyLink.href = `<?= base_url('/show/') ?>${property.id}/${encodeURIComponent(property.name)}`;
                            propertyLink.classList.add("property");
                            propertyLink.innerHTML = `
                                <img src="http://localhost/bg/public${property.image1_url}" alt="${property.name}" />
                                <div class="property-details">
                                    <h3>${property.name}</h3>
                                    <p class="price">Price: ${new Intl.NumberFormat("en-US", { style: "currency", currency: "KES" }).format(property.price)}</p>
                                </div>
                            `;
                            listItem.appendChild(propertyLink);
                            resultList.appendChild(listItem);
                        });
                        searchResults.appendChild(resultList);
                    })
                    .catch(error => console.error("Error fetching data:", error.message));
            } else {
                searchResults.innerHTML = ""; // Clear results if query is empty
            }
        };

        // Event listener for input change
        searchInput.addEventListener("input", fetchSearchResults);

        // Event listener for clearing search
        clearSearch.addEventListener("click", () => {
            searchInput.value = ""; // Clear input field
            searchResults.innerHTML = ""; // Clear search results
        });

        // Event listener to show/hide clear icon based on input focus
        searchInput.addEventListener("input", () => {
            clearSearch.style.display = searchInput.value.trim() !== "" ? "inline-block" : "none";
        });
    });
</script>
