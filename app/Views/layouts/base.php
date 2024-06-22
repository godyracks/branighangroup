<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Branighan Group - Your trusted partner in real estate and home design in Kenya.">
    <title>Branighan Group</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
    <style>
     #container {
                width: 1000px;
                margin: 20px auto;
            }
    
.ck-editor__editable[role="textbox"] {
   /* editing area */
   min-height: 300px;
}





</style>

   
    <link rel="stylesheet" href="<?= base_url('/public/styles/styles.css') ?>">
</head>

<body>
   
    <div class="navbar" id="navbar">
    <a href="<?= base_url('/') ?>"><div class="logo-container">
          
            <img src="<?= base_url('/public/images/logo_light.png') ?>" alt="Light Mode Logo" id="desktop-logo-light">
            <img src="<?= base_url('/public/images/logo_dark.png') ?>" alt="Dark Mode Logo" id="desktop-logo-dark" style="display: none;">
            
            <img src="<?= base_url('/public/images/logo_light.png') ?>" alt="Light Mode Logo" id="mobile-logo-light" class="mobile-logo">
            <img src="<?= base_url('/public/images/logo_dark.png') ?>" alt="Dark Mode Logo" id="mobile-logo-dark" class="mobile-logo" style="display: none;">
        </div></a>
        

        <div class="menu-toggle">
          
<label class="theme-toggle" for="mobile-theme-switch">
    <span id="mobile-theme-icon" class="material-icons">brightness_5</span>
    <input type="checkbox" id="mobile-theme-switch" style="display: none;">
</label>
            <label for="menu-checkbox" class="menu-icon material-icons">menu</label>
          
           
            
            <input type="checkbox" id="menu-checkbox" style="display: none;">
        </div>


        <ul class="nav-links">
            <li><a href="<?= base_url('/houses') ?>">Houses in Kenya</a></li>
            <li><a href="<?= base_url('/designs') ?>">Designs</a></li>
            <li><a href="<?= base_url('/sellyourhouse') ?>">Sell Your House</a></li>
            <li><a href="<?= base_url('/about') ?>">About</a></li>
            <li><a href="<?= base_url('/contact-us') ?>">Contact</a></li>
            <li><a href="<?= base_url('/blog') ?>">Blog</a></li>
            <li><a href="<?= base_url('/faqs') ?>">FAQs</a></li>
            <li class="toggle-switch-li">
<label class="theme-toggle" for="desktop-theme-switch">
    <span id="desktop-theme-icon" class="material-icons">dark_mode</span>
    <input type="checkbox" id="desktop-theme-switch" style="display: none;">
</label>
            </li>
            <?php if (session()->get('isLoggedIn')): ?>
                <li class="profile-li">
                    <div class="profile">
                        <div class="profile-name">
                            <a href="/dashboard"><?= session()->get('userData')['username'] ?></a>
                        </div>
                       
                        <span class="material-icons">logout</span><a href="<?= base_url('/logout') ?>" class="logout-button">Logout</a>
                    </div>
                </li>
            <?php else: ?>
                <li><a href="#" id="login-link">Login</a></li>
            <?php endif; ?>
        </ul>
        
        <div class="side-nav-menu" id="side-nav-menu">
           <?php if (session()->get('isLoggedIn')): ?>
                 <a href="/dashboard"><div class="profile">
                    <div class="profile-info">
                        <div class="profile-name"><?= session()->get('userData')['username'] ?></div>
                        <div class="profile-email"><?= session()->get('userData')['email'] ?></div>
                    </div>
                </div></a>
            <?php endif; ?>
            
            <ul>
               
                <li>  <span class="material-icons">home</span><a href="<?= base_url('/') ?>">Home</a><hr></li>
                <li><span class="material-icons" >apartment</span><a href="<?= base_url('/houses') ?>">Houses in Kenya</a><hr></li>
                <li><span class="material-icons">architecture</span><a href="<?= base_url('/designs') ?>">Designs</a><hr></li>
                <li><span class="material-icons">attach_money</span><a href="<?= base_url('/sellyourhouse') ?>">Sell Your House</a><hr></li>

                <li><span class="material-icons">info</span><a href="<?= base_url('/about') ?>">About</a><hr></li>
                <li><span class="material-icons">contact_mail</span><a href="<?= base_url('/contact-us') ?>">Contact</a><hr></li>
                <li><span class="material-icons">rss_feed</span><a href="<?= base_url('/blog') ?>">Blog</a><hr></li>
                <li><span class="material-icons">help</span><a href="<?= base_url('/faqs') ?>">FAQs</a><hr></li>
               <?php if (!session()->get('isLoggedIn')): ?>
                    <li><span class="material-icons">login</span><a href="#" id="side-login-link">Login</a><hr></li>
                    <li><span class="material-icons">person_add</span><a href="#" id="side-register-link">Register</a><hr></li>
                <?php else: ?>
                    <li><span class="material-icons">logout</span><a href="<?= base_url('/logout') ?>" class="logout-button">Logout</a><hr></li>
                <?php endif; ?>
             
            </ul>
        </div>
    </div>
   


    <?php echo $this->renderSection('content'); ?>


 
<footer class="footer">
    <div class="footer-container">
        <div class="footer-logo-social">
            <div class="footer-logo">
                <img src="<?= base_url('/public/images/logo_light.png') ?>" alt="Logo" id="footer-logo-light">
                <img src="<?= base_url('/public/images/logo_dark.png') ?>" alt="Logo" id="footer-logo-dark" style="display: none;">
            </div>
            <!-- <div class="footer-social-icons">
                <a href="#"><i class="material-icons">instagram</i></a>
                <a href="#"><i class="material-icons">facebook</i></a>
                <a href="#"><i class="material-icons">twitter</i></a>
            </div> -->
        </div>
        <div class="footer-columns">
            <div class="footer-column">
                <h3>Company</h3>
                <ul>
                    <li><a href="/about">About</a></li>
                    <li><a href="/sellyourhouse">Sell Your House</a></li>
                    <li><a href="/contact-us">Contact</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Support</h3>
                <ul>
                    <li><a href="/faqs">Frequently Asked Questions</a></li>
                    <li><a href="#">Sellers Terms of Service</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Location</h3>
                <ul>
                    <li>Norfolk Towers<br>NAIROBI East Africa</li>
                    <li>00200</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Branighan Group. All Rights Reserved.</p>
        <div class="footer-nav">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
           
        </div>
    </div>
</footer>



</main>
<script>
window.embeddedChatbotConfig = {
chatbotId: "v7hnnv9n3CGilEmQnPRve",
domain: "www.chatbase.co"
}
</script>
<script
src="https://www.chatbase.co/embed.min.js"
chatbotId="v7hnnv9n3CGilEmQnPRve"
domain="www.chatbase.co"
defer>
</script>


 <script>
    ClassicEditor.create(document.querySelector('#editor'))
        .then(editor => {
            console.log('Editor was initialized', editor);
        })
        .catch(error => {
            console.error('There was an error initializing the editor:', error);
        });
</script>
 
<!-- Login Modal Start -->
<div id="login-modal" class="modal">
  <div class="modal-content">
      <span class="close-button">&times;</span>
      <img src="<?= base_url('/public/images/logo_light.png')?>" alt="Logo">
   
      <h2 class="auth-title">Log in</h2>
      <form id="login-form" class="auth-form" action="/login" method="post">
          <label for="username" class="auth-label">Username:</label>
          <input type="text" id="username" name="username" class="input-field" required>
          <label for="password" class="auth-label">Password:</label>
          <div class="password-wrapper">
              <input type="password" id="password" name="password" class="input-field" maxlength="20" autocomplete="current-password" required>
              <span class="toggle-password" onclick="togglePasswordVisibility('password', 'togglePassword')">
                  <i class="material-icons" id="togglePassword">visibility</i>
              </span>
          </div>
          <a href="#" class="forgot-password" id="forgot-password-link">Forgot Password?</a>
          <button type="submit" class="auth-btn">Log in</button>
      </form>
      <p>Don't have an account? <a href="#" id="register-link-modal">Register</a></p>
  </div>
</div>
<!-- Login Modal End -->

<!-- Register Modal Start -->
<div id="register-modal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <img src="<?= base_url('/public/images/logo_light.png')?>" alt="Logo" class="modal-logo">
        <h2 class="auth-title">Register</h2>
        <form id="register-form" class="auth-form">
            <label for="reg-username" class="auth-label">Username:</label>
            <input type="text" id="reg-username" name="username" class="input-field" required>

            <label for="reg-email-phone" class="auth-label">Email:</label>
            <input type="text" id="reg-email-phone" name="email" class="input-field" required>

            <label for="reg-password" class="auth-label">Password:</label>
            <div class="password-wrapper">
                <input type="password" id="reg-password" name="password" class="input-field" maxlength="20" autocomplete="new-password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('reg-password', 'toggleRegPassword')">
                    <i class="material-icons" id="toggleRegPassword">visibility</i>
                </span>
            </div>

            <label for="reg-confirm-password" class="auth-label">Repeat Password:</label>
            <div class="password-wrapper">
                <input type="password" id="reg-confirm-password" name="confirm_password" class="input-field" maxlength="20" autocomplete="new-password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('reg-confirm-password', 'toggleRegConfirmPassword')">
                    <i class="material-icons" id="toggleRegConfirmPassword">visibility</i>
                </span>
            </div>

            <button type="submit" class="auth-btn">Register</button>
        </form>
        <p>Already have an account? <a href="#" id="login-link-modal">Log in</a></p>
    </div>
</div>
<!-- Register Modal End -->
<div class="toast-container" id="toast-container"></div>

<script>
document.getElementById('register-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Gather form data
    const formData = new FormData(event.target);

    // Send data to the server via AJAX
    fetch('/register', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Registration successful. Please check your email to verify your account.');
        } else {
            alert('Registration failed: ' + JSON.stringify(data.message));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
});
</script>


<!-- Register Modal End -->
<!-- Forgot Password Modal -->
<div id="forgot-password-modal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <img src="logo_light.png" alt="Logo" class="modal-logo">
        <h2 class="auth-title">Forgot Password</h2>
        <form id="forgot-password-form" class="auth-form">
            <label for="email" class="auth-label">Email:</label>
            <input type="email" id="email" name="email" class="input-field" required>
            <button type="submit" class="auth-btn">Submit</button>
        </form>
    </div>
</div>
<!-- Forgot Password Modal end-->
 <script>
         // Function to create and display a toast notification
        function showToast(message, type = 'error') {
            const toastContainer = document.getElementById('toast-container');
            const toastMessage = document.createElement('div');
            toastMessage.className = `toast-message ${type}`;
            toastMessage.textContent = message;

            toastContainer.appendChild(toastMessage);

            // Show the toast message
            setTimeout(() => {
                toastMessage.classList.add('show');
            }, 100);

            // Hide the toast message after 3 seconds
            setTimeout(() => {
                toastMessage.classList.remove('show');
                toastMessage.addEventListener('transitionend', () => {
                    toastMessage.remove();
                });
            }, 3000);
        }

        // Check for flash data and show toast notifications
        document.addEventListener('DOMContentLoaded', function () {
            <?php if(session()->getFlashdata('error')): ?>
                showToast('<?= session()->getFlashdata('error') ?>', 'error');
            <?php endif; ?>

            <?php if(session()->getFlashdata('success')): ?>
                showToast('<?= session()->getFlashdata('success') ?>', 'success');
            <?php endif; ?>
        });
    </script>




<script src="<?= base_url('/public/scripts/scripts.js') ?>"></script>
   
</body>

</html>