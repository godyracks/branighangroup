<?= $this->extend('layouts/dash_base') ?> 
<?= $this->section('dash_content') ?>


<div class="container">
    <section class="notifications">
        <h2>Notifications</h2>
        <div class="notification-list">
            <?php foreach ($notifications as $notification): ?>
                <div class="notification">
                    <h3><?= esc($notification['title']); ?></h3>
                    <p><?= esc($notification['message']); ?></p>
                    <span class="date"><?= esc($notification['date']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?= $this->endSection() ?>