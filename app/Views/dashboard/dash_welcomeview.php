<?= $this->extend('layouts/dash_base'); ?> 
<?= $this->section('dash_content'); ?>

<div class="welcome-message" style="background-image: url('<?= base_url('public/images/wallpaper2.jpg'); ?>');">

        <h1>Welcome to the Branighan Group Dashboard</h1>
        <p>Manage your properties, designs, and blog with ease.</p>
        <div class="quick-actions">
            <button class="quick-action-btn"> Frontend Houses</button>
            <button class="quick-action-btn">Frontend Designs</button>
            <button class="quick-action-btn">Frontend Blogs</button>
        </div>
        <div class="wave">
            
            <svg width="100%" height="100%" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" overflow="auto" shape-rendering="auto" fill="#989ca9">
                <defs>
                 <path id="wavepath" d="M 0 2000 0 500 Q 87.5 -8 175 500 t 175 0 175 0 175 0 175 0 175 0 175 0 175 0  v1000 z" />
                 <path id="motionpath" d="M -350 0 0 0" /> 
                </defs>
                <g >
                 <use xlink:href="#wavepath" y="81" fill="#416271">
                 <animateMotion
                  dur="5s"
                  repeatCount="indefinite">
                  <mpath xlink:href="#motionpath" />
                 </animateMotion>
                 </use>
                </g>
              </svg>
                    </div>
    </div>

<?= $this->endSection() ?>