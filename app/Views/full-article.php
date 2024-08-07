<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>

<div class="article-container">
    <div class="full-article">
        <h1 style="color: #0CAFFF;"><?= $post['title']; ?></h1>
        <p>By <?= esc($post['author_name']); ?> on <?= date('M d, Y', strtotime($post['created_at'])); ?></p>
        <img src="<?= base_url('public/' . $post['article_image']) ?>" alt="<?= $post['title']; ?>" style="width: 100%; height: auto; max-height: 400px;">
        <div class="article-content" style="max-width: 800px; margin: auto;">
            <?= $post['content']; ?>
        </div>
    </div>
    <div class="similar-posts">
        <h2>Similar Posts</h2>
        <ul>
            
        </ul>
    </div>
</div>

<style>
    /* General styles */
    .article-container {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin: 20px 0;
       
    }

    .full-article {
        flex: 3;
        margin-left:100px;
    }
       .full-article img{
           max-width:auto;
           max-height:auto;
         
       }

    .similar-posts {
        flex: 1;
        padding: 20px;
        background-color: transparent;
        /*border: 1px solid #ddd;*/
    }

    .similar-posts h2 {
        margin-top: 0;
    }

    .similar-posts ul {
        list-style: none;
        padding: 0;
    }

    .similar-posts li {
        margin-bottom: 10px;
    }

    .similar-posts a {
        text-decoration: none;
        color: #007bff;
    }

    .similar-posts a:hover {
        text-decoration: underline;
    }

    /* Responsive styles */
    @media (max-width: 1200px) {
        .article-container {
            flex-direction: column;
        }

        .full-article, .similar-posts {
            flex: 1;
        }
         .full-article img{
           max-width:auto;
           max-height:800px;
         
       }
    }

    @media (max-width: 769px) {
        .article-container {
            flex-direction: column;
        }

        .full-article, .similar-posts {
            width: 100%;
              margin-left:2px;
        }
         .full-article img{
           max-width:600px;
           max-height:auto;
         
       }
    }

    @media (max-width: 576px) {
        .full-article, .similar-posts {
            padding: 10px;
            width: 100%;
              margin-left:2px;
              margin:0 auto;
        }
          .full-article img{
           max-width: 300px;
           max-height:auto;
         
       }
       .full-article, .article-content{
           max-width: 300px; 
       }
       .similar-posts{
            max-width: 300px; 
       }
    }
</style>

<?= $this->endSection() ?>
