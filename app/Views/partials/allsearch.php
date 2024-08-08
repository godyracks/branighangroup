<style>


  .filter-item {
    margin: 0 15px;
    padding: 10px 20px;
    cursor: pointer;
    font-weight: 700;
    transition: color .3s, font-size .3s, border .3s, background-color .3s;
    border-radius: 20px;
    text-align: center
  }

  .property-type-cards-container {
    display: flex;
    justify-content: center;
    max-width: 600px;
    margin: 0 auto
  }

  .property-type-cards {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    width: 100%
  }

  #filter-by-property-type {
    text-align: center
  }

  .filter-list {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px
  }

  .filter-title {
    text-align: center;
    margin-top: 20px;
    margin-bottom: 20px
  }

  .home-results {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap
  }

  .property {
    display: flex;
    align-items: center;
    padding: 10px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    max-width: 400px;
    text-decoration: none;
    color: #333
  }

  .property img {
    width: 100px;
    height: auto;
    margin-right: 20px
  }

  .property-details {
    flex-grow: 1
  }

  .property-details h3 {
    margin: 0;
    font-size: 16px;
    font-weight: 700
  }

  .property-details p {
    margin: 5px 0;
    font-size: 14px
  }

  .price {
    font-weight: 700;
    color: #007bff
  }

  .search-section {
    display: none;
    padding: 5px 20px
  }

  .search-section.active {
    display: block
  }

  .search-input-container {
    position: relative
  }

  .search-input {
    padding: 15px 45px;
    border: 1px solid #ccc;
    border-radius: 20px;
    font-size: 16px;
    width: 100%;
    max-width: 600px;
    box-sizing: border-box;
    height: 70px;
    transition: padding-left .3s
  }

  .search-input:focus {
    outline: 0;
    border-color: #007bff;
    padding-left: 55px
  }

  .search-input::placeholder {
    color: #aaa;
    transition: margin-left .3s
  }

  .search-clear-icon,
  .search-icon {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #f58220
  }

  .search-icon {
    left: 20px;
    top: 40%
  }

  .search-clear-icon {
    right: 20px;
    display: none
  }

  .search-input:focus+.search-icon,
  .search-input:not(:placeholder-shown)+.search-clear-icon,
  .search-results:not(:empty)+.search-clear-icon,
  .search-results:not(:empty)+.search-icon {
    display: inline-block
  }

  @media (max-width:768px) {
    .property {
      flex-direction: column;
      align-items: flex-start
    }

    .property img {
      margin-bottom: 10px
    }
.find-home-title{
    font-size: 24px;
}
.find-home-text{
    font-size: 11px;
    padding-left: 20px;
    padding-right: 20px;

}
.search-filters{
    margin-top: 30px;
}
.search-filters .filter-item{
    font-size: 10px;
    padding: 5px 3px;
    margin: 1px;
}
.search-property-headline{
    font-size: 12px;
    text-align: center;
}
.search-property-description{
    font-size: 11px;
}
    .search-input {
      border: 1px solid #ccc;
      border-radius: 20px;
      font-size: 16px;
      width: 100%;
      max-width: 600px;
      box-sizing: border-box;
      height: 50px
    }

    .search-section{
      max-width: auto;
      margin-top: 3px;
    }
    .search-section h2{
      font-size: 12px;
      margin-top: 3px;
    }

    .amenities-cards {
      display: grid
    }

    .search-icon {
      left: 20px;
      top: 30%
    }

    .search-property {
      padding: 0
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
    <div class="search-property-description">Simply enter the property location and press the search results (e.g.'Nakuru', 'Nairobi').</div>
    <div class="search-input-container">
      <input type="text" class="search-input" placeholder="Search property location">
      <span class="material-icons search-icon">search</span>
      <span class="material-icons search-clear-icon" id="clear-search">clear</span>
      <div class="search-results" id="search-results"></div>
    </div>
  </section>
</section>
<section class="search-section" id="filter-by-property-type">
  <h2 class="filter-title">Select Property Type</h2>
  <div class="property-type-cards-container">
    <div class="property-type-cards"> <?php foreach ($categories as $category) : ?> <a href="
					<?= base_url('filter?category=' . $category['id']) ?>" class="property-card"> <?= $category['name'] ?> </a> <?php endforeach; ?> </div>
  </div>
</section>
<section class="search-section" id="filter-by-features">
  <h2 class="filter-title">Filter by Amenities</h2>
  <div class="filter-list">
    <div class="amenities-cards">
      <div class="amenity-card">
        <span class="material-icons amenities-ic">directions_car</span>
        <p>Garage</p>
      </div>
      <div class="amenity-card amenities-ic">
        <span class="material-icons">pool</span>
        <p>Swimming Pool</p>
      </div>
      <div class="amenity-card amenities-ic">
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
        fetch(`https://branighangroup.com/homesearch?location=${encodeURIComponent(query)}`).then(response => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        }).then(data => {
          searchResults.innerHTML = ""; // Clear previous results
          if (!data || data.length === 0) {
            searchResults.innerHTML = " < p > No results found < /p>";
            return;
          }
          const resultList = document.createElement("ul");
          resultList.classList.add("search-results-list");
          data.forEach(property => {
            const listItem = document.createElement("li");
            listItem.classList.add("search-result-item");
            const propertyLink = document.createElement("a");
            propertyLink.href = `
		<?= base_url('/property/') ?>${property.id}/${encodeURIComponent(property.name)}`;
            propertyLink.classList.add("property");
            propertyLink.innerHTML = `
                                
		<img src="https://branighangroup.com/public${property.image1_url}" alt="${property.name}" />
		<div class="property-details">
			<h3>${property.name}</h3>
			<p class="price">Price: ${new Intl.NumberFormat("en-US", { style: "currency", currency: "KES" }).format(property.price)}</p>
		</div>
                            `;
            listItem.appendChild(propertyLink);
            resultList.appendChild(listItem);
          });
          searchResults.appendChild(resultList);
        }).catch(error => console.error("Error fetching data:", error.message));
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