<style>
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
}
        .amenities-cards {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .amenity-card {
            width: 150px;
            height: 150px;
            background-color: #f0f0f0;
            margin: 10px;
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        }
        .amenity-card span {
            font-size: 36px;
            margin-bottom: 10px;
        }
        .amenity-card p {
            margin: 0;
            font-size: 14px;
            font-weight: 700;
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
<section class="search-section active" id="search-by-location">
    <section class="search-property">
        <div class="search-property-headline">Search Property Location</div>
        <div class="search-property-description">Simply enter the property location and press the search button (e.g., 'Nairobi').</div>
        <div class="search-input-container">
            <div class="search-input-wrapper"><i class="material-icons search-icon">search</i><input type="text" class="search-input" placeholder="Search property location"></div><button class="search-button">Search</button>
        </div>
    </section>
    <section class="home-results" id="home-results"></section>
</section>
<section class="search-section" id="filter-by-property-type">
    <h2 class="filter-title">Select Property Type</h2>
    <div class="property-type-cards-container">
        <div class="property-type-cards"> <?php foreach ($categories as $category) : ?> <a href="<?= base_url('filter?category=' . $category['id']) ?>" class="property-card"><?= $category['name'] ?></a> <?php endforeach; ?> </div>
    </div>
</section>
<section class="search-section" id="filter-by-amenities">
    <h2 class="filter-title">Filter by Amenities</h2>
    <div class="filter-list">
    <div class="amenities-cards">
                <div class="amenity-card"><span class="material-icons">directions_car</span>
                    <p>Garage</p>
                </div>
                <div class="amenity-card"><span class="material-icons">pool</span>
                    <p>Swimming Pool</p>
                </div>
                <div class="amenity-card"><span class="material-icons">hot_tub</span>
                    <p>Jacuzzi</p>
                </div>
            </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded",()=>{const e=document.querySelectorAll(".filter-item"),t=document.querySelectorAll(".search-section"),n=document.querySelector(".search-input"),r=document.querySelector(".search-button"),o=document.getElementById("home-results");e.forEach(n=>{n.addEventListener("click",()=>{e.forEach(e=>e.classList.remove("active")),n.classList.add("active"),t.forEach(e=>e.classList.remove("active")),document.getElementById(n.getAttribute("data-tab")).classList.add("active")})}),document.querySelector(".filter-item.active").click();const c=()=>{const e=n.value.trim();""!==e?fetch(`https://branighangroup.com/homesearch?location=${encodeURIComponent(e)}`).then(e=>{if(!e.ok)throw new Error("Network response was not ok");return e.json()}).then(t=>{if(o.innerHTML="",!t||0===t.length)return void(o.innerHTML="<p>No results found</p>");t.forEach(e=>{const t=document.createElement("a");t.href=`<?= base_url('/show/') ?>${e.id}/${encodeURIComponent(e.name)}`,t.classList.add("property"),t.innerHTML=`\n                        <img src="https://branighangroup.com/public${e.image1_url}" alt="${e.name}" />\n                        <div class="property-details">\n                            <h3>${e.name}</h3>\n                            <p class="price">Price: ${(e=>{return new Intl.NumberFormat("en-US",{style:"currency",currency:"KES"}).format(e)})(e.price)}</p>\n                        </div>\n                    `,o.appendChild(t)});const n=new URLSearchParams({location:e});history.pushState({},"",window.location.pathname+"?"+n.toString())}).catch(e=>console.error("Error fetching data:",e.message)):o.innerHTML=""};r.addEventListener("click",e=>{e.preventDefault(),c()}),n.addEventListener("keyup",e=>{"Enter"===e.key&&(e.preventDefault(),c())})});
</script>