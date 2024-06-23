<?= $this->extend('layouts/base') ?> <?= $this->section('content') ?> <main class="main-content"><div class="container"><div class="design-left-part"><nav class="design-nav"><a href="<?= base_url() ?>">Home</a>&gt;<a href="<?= base_url('designs') ?>">Designs</a>&gt;<span>Available</span></nav><h2>Search</h2><p>Simply write the description of the design</p><div class="design-search-input"><input type="text" id="designSearch" placeholder="Modern Living Room"><i class="material-icons">search</i><div id="designSearchResults" class="design-search-results"></div></div><h3>Categories</h3><div class="categories"><form id="categoryForm" action="<?= base_url('designs/filter') ?>" method="get"> <?php foreach ($categories as $category) : ?> <button type="submit" name="category" value="<?= $category['id'] ?>"><?= $category['name'] ?></button> <?php endforeach; ?> </form></div><h3>Filter by budget</h3><div class="budget-filters2"><form id="budgetForm" action="<?= base_url('designs/filter') ?>" method="get"><button type="submit" name="budget" value="0-10k">0-10k</button><button type="submit" name="budget" value="10k-20k">10k-20k</button><button type="submit" name="budget" value="20k-30k">20k-30k</button><button type="submit" name="budget" value="30k-40k">30k-40k</button><button type="submit" name="budget" value="40k-50k">40k-50k</button><button type="submit" name="budget" value="50k-60k">50k-60k</button><button type="submit" name="budget" value="60k-70k">60k-70k</button><button type="submit" name="budget" value="70k-80k">70k-80k</button><button type="submit" name="budget" value="80k-90k">80k-90k</button><button type="submit" name="budget" value="90k-100k">90k-100k</button><button type="submit" name="budget" value="Above 100k">Above 100k</button></form></div></div><div class="design-right-part"> <?php if (isset($selectedCategoryName) && $selectedCategoryName) : ?> <h4>Category Selected: <?= $selectedCategoryName ?></h4> <?php endif; ?> <div class="design-cards"> <?php foreach ($designs as $design) : ?> <div class="design-card"><a href="<?= site_url("design/show/{$design['id']}/" . url_title($design['name'], '-', TRUE)) ?>"><img src="<?= base_url('public/' . $design['image1_url']) ?>" alt="<?= $design['name'] ?>"><div class="design-card-info"><h4><?= $design['name'] ?></h4> <?php
                                    // Limit description to 20 words
                                    $description = $design['description'];
                                    $descriptionWords = explode(' ', $description);
                                    $limitedDescription = implode(' ', array_slice($descriptionWords, 0, 18));
                                    echo "<p>{$limitedDescription}...</p>";
                                    ?> <div class="design-card-footer"><span class="price"><?= $design['price'] ?></span><button class="design-buy-button">Buy</button></div></div></a></div> <?php endforeach; ?> </div></div></div><div class="pagination"> <?php if ($currentPage > 1) : ?> <div class="page"><a href="<?= base_url('designs?page=' . ($currentPage - 1)) ?>"><i class="material-icons">arrow_back</i></a></div> <?php endif; ?> <?php for ($i = 1; $i <= $totalPages; $i++) : ?> <div class="page <?= ($i == $currentPage) ? 'active' : '' ?>"><a href="<?= base_url('designs?page=' . $i) ?>"><?= $i ?></a></div> <?php endfor; ?> <?php if ($currentPage < $totalPages) : ?> <div class="page"><a href="<?= base_url('designs?page=' . ($currentPage + 1)) ?>"><i class="material-icons">arrow_forward</i></a></div> <?php endif; ?> </div></main><script>document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('designSearch');
    const searchResultsContainer = document.getElementById('designSearchResults');

    searchInput.addEventListener('input', function() {
        const query = searchInput.value.trim();

        if (query.length > 0) {
            fetch(`<?= base_url('designs/search') ?>?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    searchResultsContainer.innerHTML = ''; // Clear previous results

                    if (data.length > 0) {
                        data.forEach(design => {
                            const resultItem = document.createElement('div');
                            resultItem.classList.add('design-search-result-item');
                            resultItem.innerHTML = `
                                <a href="<?= base_url('design/show/') ?>${design.id}/${encodeURIComponent(design.name)}">
                                    <img src="<?= base_url('public/') ?>${design.image1_url}" alt="${design.name}">
                                    <div class="result-info">
                                        <h4>${design.name}</h4>
                                        <p>${design.description}</p>
                                        <span class="price">${design.price}</span>
                                    </div>
                                </a>
                            `;
                            searchResultsContainer.appendChild(resultItem);
                        });
                    } else {
                        searchResultsContainer.innerHTML = '<p>No results found</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching search results:', error);
                    searchResultsContainer.innerHTML = '<p>Error fetching search results</p>';
                });
        } else {
            searchResultsContainer.innerHTML = ''; // Clear results if query is empty
        }
    });
});</script><style>.design-search-results{top:100%;left:0;border:1px solid #ddd;background-color:#fff;position:absolute;width:100%;max-height:300px;overflow-y:auto}.design-search-result-item{display:flex;padding:10px;border-bottom:1px solid #ddd}.design-search-result-item img{width:50px;height:50px;margin-right:10px}.design-search-result-item .result-info{display:flex;flex-direction:column}.design-search-result-item .result-info h4{margin:0;font-size:14px}.design-search-result-item .result-info p{margin:0;font-size:12px}.design-search-result-item .result-info .price{font-weight:700;color:#000}.design-search-result-item a{text-decoration:none;color:inherit;display:flex;width:100%}</style> <?= $this->endSection() ?>