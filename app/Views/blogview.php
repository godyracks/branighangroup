<?= $this->extend('layouts/base') ?> <?= $this->section('content') ?> <div class="blogcontainer"><header><input type="text" placeholder="Type to search for news" class="blogsearch-bar"><div id="searchResultsContainer"></div></header><div class="blogcontent-wrapper"><div class="blogleft-column"><section class="latest-articles" id="latest-articles-section"><h2>Latest Articles<i class="material-icons refresh-icon" onclick="refreshLatestArticles()" style="color:orange">refresh</i></h2><ul id="latest-articles-list"></ul></section><section class="top-posts"><h2>Top Posts</h2><ol class="top-posts-list"> <?php if (!empty($topPosts)): ?> <?php // Limiting to 5 top posts
            $count = 1; // Start numbering from 1
            foreach ($topPosts as $post): 
                if ($count > 5) break; // Limiting to 5 posts
            ?> <li><div class="post-number"><?= $count++; ?></div><div class="post-content"><p><?= truncate_words(esc($post['content']), 20); ?></p><span class="topic-details"><?= esc($post['category']); ?> <?= date('M d Y', strtotime($post['created_at'])); ?></span></div></li> <?php endforeach; ?> <?php else: ?> <li>No top posts available.</li> <?php endif; ?> </ol></section><section class="social-posts"><h2>Social Posts</h2><div class="blogsocial-icons"><div class="blogsocial-icon"><img src="<?= base_url('public/images/icons/fb_ic.png') ?>" alt="Facebook"></div><div class="blogsocial-icon"><img src="<?= base_url('public/images/icons/x_ic.png') ?>" alt="Twitter"></div><div class="blogsocial-icon"><img src="<?= base_url('public/images/icons/ig_ic.png') ?>" alt="Instagram"></div></div></section></div><div class="blogright-column"><section class="article-cards"> <?php foreach ($posts as $post): ?> <div class="article-card"><img src="<?= base_url('public/' . $post['article_image']) ?>" alt="<?= esc($post['title']); ?>"><h3><?= esc($post['title']); ?></h3><div class="article-info"><p class="author"><?= esc($post['author_name']); ?></p><p class="published-date"><?= date('M d, Y', strtotime($post['created_at'])); ?></p><p class="post-content"><?= truncate_words(esc($post['content']), 14); ?></p></div><a href="#" class="full-article-button">Full Article</a></div> <?php endforeach; ?> </section><section class="blog-pagination"><div class="pagination"> <?php if ($currentPage > 1) : ?> <div class="page"><a href="<?= site_url('blog?page=' . ($currentPage - 1)) ?>"><span class="material-icons">keyboard_arrow_left</span></a></div> <?php endif; ?> <?php for ($i = 1; $i <= $totalPages; $i++) : ?> <div class="page <?= ($i == $currentPage) ? 'active' : '' ?>"><a href="<?= site_url('blog?page=' . $i) ?>"><?= $i ?></a></div> <?php endfor; ?> <?php if ($currentPage < $totalPages) : ?> <div class="page"><a href="<?= site_url('blog?page=' . ($currentPage + 1)) ?>"><span class="material-icons">keyboard_arrow_right</span></a></div> <?php endif; ?> </div></section></div></div><section class="newsletter"><div class="newsletter-wrapper"><div class="newsletter-left"><div class="newsletter-text"><h2>SMART HOMES:</h2><h2>EXPLORING</h2><h2>INNOVATIONS</h2><h2>RESHAPING</h2><h2>MODERN LIVING</h2><p>Learn More.</p></div></div><img src="<?= base_url('public/images/arcdsgnbg.jpg') ?>" alt="Newsletter Image" class="newsletter-image"><div class="newsletter-right"><h2>Looking for Newsletter?</h2><div class="newsletter-info"><p>Sign up for our newsletter to receive the latest news, trends, and insights delivered straight to your inbox. Stay informed and never miss out on important updates!</p></div><input type="email" placeholder="Enter your email"><button>Subscribe</button></div></div></section></div><script>function refreshLatestArticles() {
        // Add class to animate refresh icon
        let refreshIcon = document.querySelector('.refresh-icon');
        refreshIcon.classList.add('refreshing');

        // Simulate loading or fetch new data
        setTimeout(() => {
            // Remove animation class
            refreshIcon.classList.remove('refreshing');

            // Replace the content with dynamically fetched data (AJAX)
            fetchLatestArticles();
            
            // Show toast notification
            showToastNotification('You are up-to-date!');
        }, 1000); // Adjust timing as per your needs
    }

    function fetchLatestArticles() {
        fetch('<?= site_url('blog/latest_articles') ?>')
            .then(response => response.json())
            .then(data => {
                // Update the UI with fetched data
                let latestArticlesList = document.getElementById('latest-articles-list');
                latestArticlesList.innerHTML = ''; // Clear existing content

                // Append new article items
                data.forEach(article => {
                    let li = document.createElement('li');
                    li.textContent = truncateWords(article.content, 20); 
                    latestArticlesList.appendChild(li);
                });
            })
            .catch(error => console.error('Error fetching latest articles:', error));
    }

    // Function to truncate content to a specific number of words
    function truncateWords(content, limit) {
        let words = content.split(' ');
        if (words.length > limit) {
            words = words.slice(0, limit);
            return words.join(' ') + '...';  content
        } else {
            return content;
        }
    }

    // Function to show toast notification
    function showToastNotification(message) {
        let toast = document.createElement('div');
        toast.className = 'toast';
        toast.textContent = message;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
                document.body.removeChild(toast);
            }, 3000); // Show toast for 3 seconds
        }, 100); // Delay before showing toast
    }

    // Initial load of latest articles
    document.addEventListener('DOMContentLoaded', fetchLatestArticles);</script><script>document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.querySelector('.blogsearch-bar');
        var searchResultsContainer = document.getElementById('searchResultsContainer');

        searchInput.addEventListener('input', function() {
            var query = searchInput.value.trim();
            if (query.length >= 2) { // Adjust the minimum length as needed
                fetchSearchResults(query);
            } else {
                clearSearchResults();
            }
        });

        function fetchSearchResults(query) {
            fetch('<?= site_url('blog/search') ?>?q=' + encodeURIComponent(query))
                .then(response => response.json())
                .then(data => displaySearchResults(data))
                .catch(error => console.error('Error fetching search results:', error));
        }

        function displaySearchResults(results) {
            searchResultsContainer.innerHTML = ''; // Clear previous results
            if (results.length > 0) {
                var ul = document.createElement('ul');
                results.forEach(post => {
                    var li = document.createElement('li');
                    var a = document.createElement('a');
                    a.href = '/blog/' + post.blog_id;
                    a.textContent = post.title;
                    li.appendChild(a);
                    ul.appendChild(li);
                });
                searchResultsContainer.appendChild(ul);
            } else {
                searchResultsContainer.innerHTML = '<p>No results found</p>';
            }
        }

        function clearSearchResults() {
            searchResultsContainer.innerHTML = ''; // Clear search results container
        }
    });</script><style>#searchResultsContainer ul{list-style-type:none;padding:0}#searchResultsContainer ul li{margin-bottom:5px}</style> <?= $this->endSection() ?>