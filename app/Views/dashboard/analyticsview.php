<?= $this->extend('layouts/dash_base') ?> 
<?= $this->section('dash_content') ?>




<div class="container">
    <section class="analytics">
        <h2>Analytics</h2>
        <!-- Add content for analytics page here -->
        <div class="charts">
            <h3>Sales Overview</h3>
            <!-- Insert charts or graphs here -->
            <div id="sales-chart"></div>
        </div>
        <div class="traffic">
            <h3>Website Traffic</h3>
            <!-- Insert analytics data here -->
            <p>Number of visitors: 1000</p>
            <p>Top pages: Home, Properties, Blog</p>
        </div>
    </section>
</div>

<?= $this->endSection() ?>