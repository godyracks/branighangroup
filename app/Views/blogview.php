<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>



<div class="blogcontainer">
    <header>
        <input type="text" placeholder="Search for news" class="blogsearch-bar">
    </header>

    <div class="blogcontent-wrapper">
        <div class="blogleft-column">
            <section class="latest-articles">
                <h2>Latest Articles <i class="material-icons refresh-icon">refresh</i></h2>
                <ul>
                    <li>Paragraph one of the latest article.</li>
                    <li>Paragraph two of the latest article.</li>
                    <li>Paragraph three of the latest article.</li>
                    <li>Paragraph four of the latest article.</li>
                </ul>
            </section>


            <section class="top-posts">
                <h2>Top Posts</h2>
                <ol class="top-posts-list">
                    <?php foreach ($posts as $post): ?>
                    <li>
                        <div class="post-number"><?= esc($post['blog_id']); ?></div>
                        <div class="post-content">
                            <p><?= esc($post['content']); ?></p>
                            <span class="topic-details"><?= esc($post['category']); ?> <?= date('M d Y', strtotime($post['created_at'])); ?></span>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </section>





            <section class="social-posts">
                <h2>Social Posts</h2>
                <div class="blogsocial-icons">
                    <div class="blogsocial-icon">
                    <img src="<?= base_url('public/images/icons/fb_ic.png') ?>" alt="Facebook">
                     </div>
                    <div class="blogsocial-icon">
                    <img src="<?= base_url('public/images/icons/x_ic.png') ?>" alt="Twitter">
                     </div>
                    <div class="blogsocial-icon">
                    <img src="<?= base_url('public/images/icons/ig_ic.png') ?>" alt="Instagram">
                     </div>
                </div>
            </section>

        </div>

        <div class="blogright-column">
        <section class="article-cards">
                <?php foreach ($posts as $post): ?>
                <div class="article-card">
                    <img src="<?= base_url('public/images/isiolo_hse.jpg') ?>" alt="<?= esc($post['title']); ?>">
                    <h3><?= esc($post['title']); ?></h3>
                    <p><?= esc($post['content']); ?></p>
                    <a href="#" class="full-article-button">Full Article</a>
                </div>
                <?php endforeach; ?>
            </section>

            <section class="blog-pagination">
                <button>1</button>
                <button>2</button>
                <button>3</button>
                <button>4</button>
                <!-- Pagination buttons as needed -->
            </section>


        </div>

    </div>
    <section class="newsletter">
        <div class="newsletter-wrapper">
            <div class="newsletter-left">
                <div class="newsletter-text">
                    <h2>SMART HOMES:</h2>
                    <h2>EXPLORING</h2>
                    <h2>INNOVATIONS</h2>
                    <h2>RESHAPING</h2>
                    <h2>MODERN LIVING</h2>
                    <p>Learn More.</p>
                </div>
            </div>
            <img src="<?= base_url('public/images/arcdsgnbg.jpg') ?>" alt="Newsletter Image" class="newsletter-image">
            <div class="newsletter-right">
                <h2>Looking for Newsletter?</h2>
                <div class="newsletter-info">
                    <p>Sign up for our newsletter to receive the latest news, trends, and insights delivered straight to
                        your inbox. Stay informed and never miss out on important updates!</p>
                </div>
                <input type="email" placeholder="Enter your email">
                <button>Subscribe</button>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection() ?>