<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<main>
        <div class="our-team">
            <h1>OUR TEAM<br>AT<br><span style="color: aqua;">BRANIGHAN GROUP</span> </h1>
            <p>Our company is located at lorem ipsum dolor sit amet Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
            <div class="button-container">
                <button class="get-started"><a href="<?= base_url('/houses') ?>">Get Started</a></button>
                <!-- <div class="arrow-container">
                    <div class="arrow"></div>
                    <span class="browse-catalog">Browse our Catalog</span>
                </div> -->
            </div>
            <p ><a href="<?= base_url('/contact-us') ?>" style="color: aqua;">Contact Us</a></p>
        </div>

        <div class="staff-cards">
            <div class="staff-card">
            <div class="image-container">
        <img src="<?= base_url('public/images/CEO.jpg') ?>" alt="CEO">
    </div>
    <div class="info-container">
                <h3>Faith Wanjiku Maina</h3>
                <p>She  is the Group C.E.0 since 2019 . Her  background in Actuarial Science has been pivotal in terms of servant leadership, resilience in the dynamic Silicon Savanah. She has  leveraged our financial and risk management expertise to lead the Branighan Group Ltd toward strategic growth and success.</p>
                </div>
                <hr>
                <div class="role">
                    <span class="material-icons bag-icon">work</span>CEO
                </div>
            </div>
    <!--        <div class="staff-card">-->
    <!--        <div class="image-container">-->
    <!--    <img src="<?= base_url('public/images/gody.jpg') ?>" alt="Software Developer">-->
    <!--</div>-->
    <!--<div class="info-container">-->
    <!--            <h3>Godfrey Matagaro</h3>-->
    <!--            <p>Responsible for developing this website and maintaining it whenever need arises</p>-->
    <!--            </div>-->
    <!--            <hr>-->
    <!--            <div class="role">-->
    <!--                <span class="material-icons bag-icon">work</span> Software Developer-->
    <!--            </div>-->
    <!--        </div>-->
           
         
           
         
        </div>
    </main>
<?= $this->endSection() ?>