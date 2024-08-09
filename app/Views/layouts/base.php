<!DOCTYPE html>
<html lang="en">
  <head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6DKH2KY7N2"></script>
    <script>
      function gtag() {
        dataLayer.push(arguments)
      }
      window.dataLayer = window.dataLayer || [], gtag("js", new Date), gtag("config", "G-6DKH2KY7N2")
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="title" content="Trusted Partner for Ready-Made Homes | Design & Build Firm in Nairobi, East Africa">
    <meta name="description" content="Located at Norfolk Towers, Nairobi, we specialize in modern and minimalistic design and build solutions. Explore our ready-made homes and expert services.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://branighangroup.com/">
    <meta property="og:title" content="Trusted Partner for Ready-Made Homes | Design & Build Firm in Nairobi, East Africa">
    <meta property="og:description" content="Located at Norfolk Towers, Nairobi, we specialize in modern and minimalistic design and build solutions. Explore our ready-made homes and expert services.">
    <meta property="og:image" content="https://branighangroup.com/public/images/bgsocial.png">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://branighangroup.com/">
    <meta property="twitter:title" content="Trusted Partner for Ready-Made Homes | Design & Build Firm in Nairobi, East Africa">
    <meta property="twitter:description" content="Located at Norfolk Towers, Nairobi, we specialize in modern and minimalistic design and build solutions. Explore our ready-made homes and expert services.">
    <meta property="twitter:image" content="https://branighangroup.com/public/images/bgsocial.png">
    <meta property="og:title" content="Trusted Partner for Ready-Made Homes | Design & Build Firm in Nairobi, East Africa">
    <meta property="og:description" content="Located at Norfolk Towers, Nairobi, we specialize in modern and minimalistic design and build solutions. Explore our ready-made homes and expert services.">
    <meta property="og:image" content="https://branighangroup.com/public/images/bgsocial.png">
    <meta property="og:url" content="https://branighangroup.com/">
    <meta property="og:title" content="Trusted Partner for Ready-Made Homes | Design & Build Firm in Nairobi, East Africa">
    <meta property="og:description" content="Located at Norfolk Towers, Nairobi, we specialize in modern and minimalistic design and build solutions. Explore our ready-made homes and expert services.">
    <meta property="og:image" content="https://branighangroup.com/public/images/bgsocial.png">
    <meta property="og:url" content="https://branighangroup.com/">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="ready-made homes, design and build, modern homes, minimalistic design, home buying, home selling, Nairobi, Kenya,  East Africa, Norfolk Towers">
    <meta name="author" content="Branighan Group">
    <meta name="canonical" content="https://branighangroup.com/">
    <meta name="google-site-verification" content="FP0HMkHoloCqXMbxeMN1ODm60Hg2M2HbjRnubCv3wJs">
    <title> Your Trusted Partner for Ready-Made Homes | Design & Build Firm in Nairobi, East Africa</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="
																																			<?= base_url('/public/styles/styles.css') ?>">
  </head>
  <body>
    <div class="navbar" id="navbar">
      <a href="
																																					<?= base_url('/') ?>">
        <div class="logo-container">
          <img src="
																																							<?= base_url('/public/images/logo_light.png') ?>" alt="Light Mode Logo" id="desktop-logo-light">
          <img src="
																																								<?= base_url('/public/images/logo_dark.png') ?>" alt="Dark Mode Logo" id="desktop-logo-dark" style="display:none">
          <img src="
																																									<?= base_url('/public/images/logo_light.png') ?>" alt="Light Mode Logo" id="mobile-logo-light" class="mobile-logo">
          <img src="
																																										<?= base_url('/public/images/logo_dark.png') ?>" alt="Dark Mode Logo" id="mobile-logo-dark" class="mobile-logo" style="display:none">
        </div>
      </a>
      <div class="menu-toggle">
        <label class="theme-toggle" for="mobile-theme-switch">
          <span id="mobile-theme-icon" class="material-icons">brightness_5</span>
          <input type="checkbox" id="mobile-theme-switch" style="display:none">
        </label>
        <label for="menu-checkbox" class="menu-icon material-icons">menu</label>
        <input type="checkbox" id="menu-checkbox" style="display:none">
      </div>
      <ul class="nav-links">
        <li>
          <a href="
																																													<?= base_url('/houses') ?>">Houses in Kenya </a>
        </li>
        <li>
          <a href="
																																													<?= base_url('/designs') ?>">Designs </a>
        </li>
        <li>
          <a href="
																																													<?= base_url('/sellyourhouse') ?>">Sell Your House </a>
        </li>
        <li>
          <a href="
																																													<?= base_url('/about') ?>">About </a>
        </li>
        <li>
          <a href="
																																													<?= base_url('/contact-us') ?>">Contact </a>
        </li>
        <li>
          <a href="
																																													<?= base_url('/blog') ?>">Blog </a>
        </li>
        <li>
          <a href="
																																													<?= base_url('/faqs') ?>">FAQs </a>
        </li>
        <li class="toggle-switch-li">
          <label class="theme-toggle" for="desktop-theme-switch">
            <span id="desktop-theme-icon" class="material-icons">dark_mode</span>
            <input type="checkbox" id="desktop-theme-switch" style="display:none">
          </label>
        </li> <?php if (session()->get('isLoggedIn')): ?> <li class="profile-li">
          <div class="profile">
            <a href="/dashboard/welcome">
              <img src="
																																																<?= session()->get('userData')['profile_image'] ?>" alt="Profile Picture" style="margin-right:8px">
            </a>
            <a href="/dashboard/welcome">
              <div class="profile-name"> <?= session()->get('userData')['username'] ?> </div>
            </a>
            <span class="material-icons">logout</span>
            <a href="
																																																<?= base_url('/logout') ?>" class="logout-button">Logout </a>
          </div>
        </li> <?php else: ?> <li>
          <a href="#" id="login-link">Login</a>
        </li> <?php endif; ?>
      </ul>
      <div class="side-nav-menu" id="side-nav-menu"> <?php if (session()->get('isLoggedIn')): ?> <a href="/dashboard/welcome">
          <div class="profile">
            <div class="profile-image">
              <img src="
																																																	<?= session()->get('userData')['profile_image'] ?>" alt="Profile Picture">
            </div>
            <div class="profile-info">
              <div class="profile-name"> <?= session()->get('userData')['username'] ?> </div>
            </div>
          </div>
        </a> <?php endif; ?> <ul>
          <li>
            <span class="material-icons">home</span>
            <a href="
																																																	<?= base_url('/') ?>">Home </a>
            <hr>
          </li>
          <li>
            <span class="material-icons">apartment</span>
            <a href="
																																																		<?= base_url('/houses') ?>">Houses in Kenya </a>
            <hr>
          </li>
          <li>
            <span class="material-icons">architecture</span>
            <a href="
																																																			<?= base_url('/designs') ?>">Designs </a>
            <hr>
          </li>
          <li>
            <span class="material-icons">attach_money</span>
            <a href="
																																																				<?= base_url('/sellyourhouse') ?>">Sell Your House </a>
            <hr>
          </li>
          <li>
            <span class="material-icons">info</span>
            <a href="
																																																					<?= base_url('/about') ?>">About </a>
            <hr>
          </li>
          <li>
            <span class="material-icons">contact_mail</span>
            <a href="
																																																						<?= base_url('/contact-us') ?>">Contact </a>
            <hr>
          </li>
          <li>
            <span class="material-icons">rss_feed</span>
            <a href="
																																																							<?= base_url('/blog') ?>">Blog </a>
            <hr>
          </li>
          <li>
            <span class="material-icons">help</span>
            <a href="
																																																								<?= base_url('/faqs') ?>">FAQs </a>
            <hr>
          </li> <?php if (!session()->get('isLoggedIn')): ?> <li>
            <span class="material-icons">login</span>
            <a href="#" id="side-login-link">Login</a>
            <hr>
          </li>
          <li>
            <span class="material-icons">person_add</span>
            <a href="#" id="side-register-link">Register</a>
            <hr>
          </li> <?php else: ?> <li>
            <span class="material-icons">logout</span>
            <a href="
																																																											<?= base_url('/logout') ?>" class="logout-button">Logout </a>
            <hr>
          </li> <?php endif; ?>
        </ul>
      </div>
    </div> <?php echo $this->renderSection('content'); ?> <?= $this->include('partials/scroll-to-top') ?> 
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-logo-social">
          <div class="footer-logo">
            <img src="
																																																												<?= base_url('/public/images/logo_light.png') ?>" alt="Logo" id="footer-logo-light">
            <img src="
																																																													<?= base_url('/public/images/logo_dark.png') ?>" alt="Logo" id="footer-logo-dark" style="display:none">
          </div>
        </div>
        <div class="footer-columns">
          <div class="footer-column">
            <h3>Company</h3>
            <ul>
              <li>
                <a href="/about">About</a>
              </li>
              <li>
                <a href="/sellyourhouse">Sell Your House</a>
              </li>
              <li>
                <a href="/contact-us">Contact</a>
              </li>
            </ul>
          </div>
          <div class="footer-column">
            <h3>Support</h3>
            <ul>
              <li>
                <a href="/faqs">Frequently Asked Questions</a>
              </li>
              <li>
                <a href="#">Sellers Terms of Service</a>
              </li>
              <li>contact@branighangroup.com</li>
            </ul>
          </div>
          <div class="footer-column">
            <h3>Location</h3>
            <ul>
              <li>Norfolk Towers <br>NAIROBI East Africa </li>
              <li>00200</li>
            </ul>
          </div>
          <div class="footer-column newsletter-column">
  <h3>Newsletter</h3>
  <ul>
    <div class="newsletter-container">
      <input type="email" placeholder="Enter email" class="newsletter-input" />
      <button class="newsletter-button">Send</button>
    </div>
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
    </footer> <?php if (!isset($excludeChatButton) || !$excludeChatButton) : ?> <script async data-id="5966733387" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script> <?php endif; ?> <div id="login-modal" class="modal">
      <div class="modal-content">
        <span class="close-button">&times;</span>
        <img src="
																																																													<?= base_url('/public/images/logo_light.png')?>" alt="Logo">
        <h2 class="auth-title">Log in</h2>
        <a href="
																																																														<?= base_url('/google-login') ?>" class="google-signin-btn">
          <img src="
																																																															<?= base_url('/public/images/icons/google_ic.png') ?>" alt="Google Icon" style="margin-right:30px"> Continue with Google </a>
        <h2 class="auth-title" style="font-size:12px">OR</h2>
        <form id="login-form" class="auth-form" action="/login" method="post">
          <label for="username" class="auth-label">Username:</label>
          <input type="text" id="username" name="username" class="input-field" required>
          <label for="password" class="auth-label">Password:</label>
          <div class="password-wrapper">
            <input type="password" id="password" name="password" class="input-field" maxlength="20" autocomplete="current-password" required>
            <span class="toggle-password" onclick='togglePasswordVisibility("password","togglePassword")'>
              <i class="material-icons" id="togglePassword">visibility</i>
            </span>
          </div>
          <a href="#" class="forgot-password" id="forgot-password-link">Forgot Password?</a>
          <button type="submit" class="auth-btn">Log in</button>
        </form>
        <p>Don't have an account? <a href="#" id="register-link-modal">Register</a>
        </p>
      </div>
    </div>
    <div id="register-modal" class="modal">
      <div class="modal-content">
        <span class="close-button">&times;</span>
        <img src="
																																																																	<?= base_url('/public/images/logo_light.png')?>" alt="Logo" class="modal-logo">
        <h2 class="auth-title">Register</h2>
        <a href="
																																																																		<?= base_url('/google-login') ?>" class="google-signin-btn">
          <img src="
																																																																			<?= base_url('/public/images/icons/google_ic.png') ?>" alt="Google Icon"> Continue with Google </a>
        <h2 class="auth-title" style="font-size:12px">OR</h2>
        <form id="register-form" class="auth-form">
          <label for="reg-username" class="auth-label">Username:</label>
          <input type="text" id="reg-username" name="username" class="input-field" required>
          <label for="reg-email-phone" class="auth-label">Email:</label>
          <input type="text" id="reg-email-phone" name="email" class="input-field" required>
          <label for="reg-password" class="auth-label">Password:</label>
          <div class="password-wrapper">
            <input type="password" id="reg-password" name="password" class="input-field" maxlength="20" autocomplete="new-password" required>
            <span class="toggle-password" onclick='togglePasswordVisibility("reg-password","toggleRegPassword")'>
              <i class="material-icons" id="toggleRegPassword">visibility</i>
            </span>
          </div>
          <label for="reg-confirm-password" class="auth-label">Repeat Password:</label>
          <div class="password-wrapper">
            <input type="password" id="reg-confirm-password" name="confirm_password" class="input-field" maxlength="20" autocomplete="new-password" required>
            <span class="toggle-password" onclick='togglePasswordVisibility("reg-confirm-password","toggleRegConfirmPassword")'>
              <i class="material-icons" id="toggleRegConfirmPassword">visibility</i>
            </span>
          </div>
          <button type="submit" class="auth-btn">Register</button>
        </form>
        <p>Already have an account? <a href="#" id="login-link-modal">Log in</a>
        </p>
      </div>
    </div>
    <div class="toast-container" id="toast-container"></div>
    <script>
      document.getElementById("register-form").addEventListener("submit", function(e) {
        e.preventDefault();
        const t = new FormData(e.target);
        fetch("/register", {
          method: "POST",
          body: t
        }).then(e => e.json()).then(e => {
          "success" === e.status ? alert("Registration successful. Please check your email to verify your account.") : alert("Registration failed: " + JSON.stringify(e.message))
        }).catch(e => {
          console.error("Error:", e), alert("An error occurred. Please try again.")
        })
      });
    </script>
    <div id="forgot-password-modal" class="modal">
      <div class="modal-content">
        <span class="close-button">&times;</span>
        <img src="
																																																																							<?= base_url('/public/images/logo_light.png')?>" alt="Logo" class="modal-logo">
        <h2 class="auth-title">Forgot Password</h2>
        <form id="forgot-password-form" class="auth-form">
          <label for="email" class="auth-label">Email:</label>
          <input type="email" id="email" name="email" class="input-field" required>
          <button type="submit" class="auth-btn">Submit</button>
        </form>
      </div>
    </div>
    <style>
      .google-btn {
        background-color: #4285f4;
        color: #fff;
        border: none;
        padding: 10px 20px;
        margin-bottom: 20px;
        cursor: pointer;
        display: block;
        width: 50%;
        text-align: center;
        font-size: 16px;
        border-radius: 4px
      }

      .google-btn:hover {
        background-color: #357ae8
      }
    </style>
    <script>
      function showToast(e, t = "error") {
        const s = document.getElementById("toast-container"),
          o = document.createElement("div");
        o.className = `toast-message ${t}`, o.textContent = e, s.appendChild(o), setTimeout(() => {
          o.classList.add("show")
        }, 100), setTimeout(() => {
          o.classList.remove("show"), o.addEventListener("transitionend", () => {
            o.remove()
          })
        }, 3e3)
      }
      // Check for flash data and show toast notifications
      document.addEventListener('DOMContentLoaded', function() {
            < ? php
            if (session() - > getFlashdata('error')): ? > showToast(' < ? = session() - > getFlashdata('error') ? > ', '
              error ');  < ? php endif; ? > < ? php
              if (session() - > getFlashdata('success')): ? > showToast(' < ? = session() - > getFlashdata('success') ? > ', '
                success ');  < ? php endif; ? >
              });
    </script>
    <script src="
																																																																							<?= base_url('/public/scripts/scripts.js') ?>">
    </script>
  </body>
</html>