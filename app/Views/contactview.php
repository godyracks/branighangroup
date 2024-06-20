<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<div class="contact-container">
    <div class="contact-overlay">
        <!-- Background overlay for children -->
        <img src="<?= base_url('public/images/arcdsgnbg.jpg') ?>" class="overlay-background" alt="Artistic Background" >
        <div class="contacts-child">
            <div class="contactsocial-icons">
                <a href="#" target="_blank"><img src="<?= base_url('public/images/icons/gmail_ic.png') ?>" alt="Gmail"></a>
                <a href="#" target="_blank"><img src="<?= base_url('public/images/icons/x_ic.png') ?>" alt="Twitter"></a>
                <a href="#" target="_blank"><img src="<?= base_url('public/images/icons/yt_ic.png') ?>" alt="YouTube"></a>
                <a href="#" target="_blank"><img src="<?= base_url('public/images/icons/ig_ic.png') ?>" alt="Instagram"></a>
            </div>
            <div class="chatbot">
            <iframe
            src="https://www.chatbase.co/chatbot-iframe/v7hnnv9n3CGilEmQnPRve"
            width="100%"
            style="height: 100%; min-height: 450px"
            frameborder="0"
            ></iframe>
            </div>
        </div>
    </div>
    <div class="map">
     <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3988.8278132091828!2d36.8123054!3d-1.2767294!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f172d8bfaadf5%3A0x2e4b2371db750052!2sNorfolk%20Towers%20Serviced%20Apartments%20-%20Nairobi%20City%20Centre%2C%20CBD!5e0!3m2!1sen!2ske!4v1718527279903!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<?= $this->endSection() ?>
