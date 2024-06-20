document.addEventListener('DOMContentLoaded', () => {
    // Desktop Theme Toggle
    const desktopThemeSwitch = document.querySelector('#desktop-theme-switch');
    const desktopThemeIcon = document.querySelector('#desktop-theme-icon');

    // Mobile Theme Toggle
    const mobileThemeSwitch = document.querySelector('#mobile-theme-switch');
    const mobileThemeIcon = document.querySelector('#mobile-theme-icon');

    // Desktop Logo
    const desktopLogoLight = document.getElementById('desktop-logo-light');
    const desktopLogoDark = document.getElementById('desktop-logo-dark');

    // Mobile Logo
    const mobileLogoLight = document.getElementById('mobile-logo-light');
    const mobileLogoDark = document.getElementById('mobile-logo-dark');

    // Footer Logo
    const footerLogoLight = document.getElementById('footer-logo-light');
    const footerLogoDark = document.getElementById('footer-logo-dark');

    // Function to toggle logos based on theme and screen size
    function toggleLogo(theme, lightLogo, darkLogo) {
        if (theme === 'dark') {
            lightLogo.style.display = 'none';
            darkLogo.style.display = 'block';
        } else {
            lightLogo.style.display = 'block';
            darkLogo.style.display = 'none';
        }
    }

    // Function to update all logos based on theme and screen size
    function updateAllLogos(theme) {
        const isMobile = window.matchMedia("(max-width: 767px)").matches;
        
        if (isMobile) {
            toggleLogo(theme, mobileLogoLight, mobileLogoDark);
        } else {
            toggleLogo(theme, desktopLogoLight, desktopLogoDark);
        }
        
        toggleLogo(theme, footerLogoLight, footerLogoDark);
    }

    // Load theme from local storage and initialize
    const currentTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', currentTheme);

    // Set initial states for switches and icons
    desktopThemeSwitch.checked = currentTheme === 'dark';
    desktopThemeIcon.textContent = currentTheme === 'dark' ? 'light_mode' : 'dark_mode';
    mobileThemeSwitch.checked = currentTheme === 'dark';
    mobileThemeIcon.textContent = currentTheme === 'dark' ? 'light_mode' : 'dark_mode';

    // Update logos based on the current theme and screen size
    updateAllLogos(currentTheme);

    // Event listener for the desktop theme toggle switch
    desktopThemeSwitch.addEventListener('change', () => {
        const desktopTheme = desktopThemeSwitch.checked ? 'dark' : 'light';
        document.documentElement.setAttribute('data-theme', desktopTheme);
        localStorage.setItem('theme', desktopTheme);
        desktopThemeIcon.textContent = desktopTheme === 'dark' ? 'light_mode' : 'dark_mode';
        updateAllLogos(desktopTheme);
    });

    // Event listener for the mobile theme toggle switch
    mobileThemeSwitch.addEventListener('change', () => {
        const mobileTheme = mobileThemeSwitch.checked ? 'dark' : 'light';
        document.documentElement.setAttribute('data-theme', mobileTheme);
        localStorage.setItem('theme', mobileTheme);
        mobileThemeIcon.textContent = mobileTheme === 'dark' ? 'light_mode' : 'dark_mode';
        updateAllLogos(mobileTheme);
    });

    // Update logos on window resize
    window.addEventListener('resize', () => {
        updateAllLogos(document.documentElement.getAttribute('data-theme'));
    });
});



// Event listener for the side navigation menu toggle
const menuCheckbox = document.getElementById('menu-checkbox');
const menuIcon = document.querySelector('.menu-icon');
const sideNavMenu = document.getElementById('side-nav-menu');

menuCheckbox.addEventListener('change', () => {
    if (menuCheckbox.checked) {
        sideNavMenu.classList.remove('close');
        sideNavMenu.classList.add('open'); // Show side navigation menu with flip animation
        menuIcon.textContent = 'close'; // Change menu icon to 'close' (X)
    } else {
        sideNavMenu.classList.remove('open');
        sideNavMenu.classList.add('close'); // Hide side navigation menu with flip animation
        menuIcon.textContent = 'menu'; // Change menu icon back to 'menu'
    }
});

//   carousel
document.addEventListener('DOMContentLoaded', function () {
    const carouselContainer = document.querySelector('.carousel-container');
    const carouselItems = document.querySelectorAll('.carousel-item');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const dotsContainer = document.querySelector('.carousel-dots');

    let currentIndex = 0;

    // Create dots
    carouselItems.forEach((item, index) => {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => {
            currentIndex = index;
            updateCarousel();
        });
        dotsContainer.appendChild(dot);
    });

    const dots = document.querySelectorAll('.dot');

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : carouselItems.length - 1;
        updateCarousel();
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % carouselItems.length;
        updateCarousel();
    });

    function updateCarousel() {
        carouselContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
        dots.forEach(dot => dot.classList.remove('active'));
        dots[currentIndex].classList.add('active');
    }

    // Auto slide
    setInterval(() => {
        currentIndex = (currentIndex + 1) % carouselItems.length;
        updateCarousel();
    }, 3000); // Change slide every 3 seconds
});

//chev-down
document.addEventListener('DOMContentLoaded', () => {
    const scrollToSectionButton = document.querySelector('.chevron-down');
    const targetSection = document.getElementById('find-home');

    scrollToSectionButton.addEventListener('click', () => {
        targetSection.scrollIntoView({ behavior: 'smooth' });
    });
});

// sticky
//Get the navbar element

window.addEventListener('scroll', function() {
    var navbar = document.getElementById('navbar');
    if (window.scrollY > navbar.offsetTop) {
        navbar.style.position = 'fixed';
        navbar.style.top = '0';
       navbar.style.width = 'calc(100% - 20px)'; // Adjust the width here
        navbar.style.zIndex = '1000';
        navbar.classList.add('translucent'); // Add translucent class when fixed
    } else {
        navbar.style.position = 'static';
        navbar.classList.remove('translucent'); // Remove translucent class when not fixed
    }
});


//description
document.addEventListener('DOMContentLoaded', function() {
    const scrollLeftButton = document.querySelector('.scroll-left');
    const scrollRightButton = document.querySelector('.scroll-right');
    const smallImagesContainer = document.querySelector('.small-images');
    const bigImage = document.querySelector('.big-image');
    const smallImages = document.querySelectorAll('.small-images img');

    let currentIndex = 0;

    // Add click event listeners to smaller images
    smallImages.forEach((image, index) => {
        image.addEventListener('click', function() {
            currentIndex = index;
            updateBigImage();
            updateScrollButtons();
        });
    });

    scrollLeftButton.addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
            updateBigImage();
            updateScrollButtons();
        }
    });

    scrollRightButton.addEventListener('click', function() {
        if (currentIndex < smallImages.length - 1) {
            currentIndex++;
            updateBigImage();
            updateScrollButtons();
        }
    });

    function updateBigImage() {
        bigImage.src = smallImages[currentIndex].src;
    }

    function updateScrollButtons() {
        scrollLeftButton.style.visibility = currentIndex === 0 ? 'hidden' : 'visible';
        scrollRightButton.style.visibility = currentIndex === smallImages.length - 1 ? 'hidden' : 'visible';
    }
});


// play & expand
document.addEventListener("DOMContentLoaded", function () {
    const bigImage = document.querySelector(".big-image");
    const playButton = document.createElement("i");
    const expandButton = document.createElement("i");
    const normalScreenButton = document.createElement("i");
    const smallImages = document.querySelectorAll(".small-images img");
    const smallImagesContainer = document.querySelector(".small-images");

    // Add material icons and styles for play, expand, and normal screen buttons
    playButton.classList.add("material-icons", "play-button");
    playButton.textContent = "play_circle_outline";
    playButton.style.position = "absolute";
    playButton.style.bottom = "130px";
    playButton.style.left = "10px";
    playButton.style.color = "#fff";
    playButton.style.cursor = "pointer";
    playButton.style.fontSize = "36px";
    playButton.style.zIndex = "1"; // Lower z-index than the sidenav

    expandButton.classList.add("material-icons", "expand-button");
    expandButton.textContent = "fullscreen";
    expandButton.style.position = "absolute";
    expandButton.style.bottom = "130px";
    expandButton.style.right = "10px";
    expandButton.style.color = "#fff";
    expandButton.style.cursor = "pointer";
    expandButton.style.fontSize = "36px";
    expandButton.style.zIndex = "999";

    normalScreenButton.classList.add("material-icons", "normal-screen-button");
    normalScreenButton.textContent = "fullscreen_exit";
    normalScreenButton.style.position = "absolute";
    normalScreenButton.style.bottom = "130px";
    normalScreenButton.style.right = "10px";
    normalScreenButton.style.color = "#fff";
    normalScreenButton.style.cursor = "pointer";
    normalScreenButton.style.fontSize = "36px";
    normalScreenButton.style.zIndex = "999";
    normalScreenButton.style.display = "none"; // Hide initially

    // Append play, expand, and normal screen buttons to the big image container
    bigImage.parentElement.appendChild(playButton);
    bigImage.parentElement.appendChild(expandButton);
    bigImage.parentElement.appendChild(normalScreenButton);

    // Function to handle autoplay when play button is clicked
    let autoplayInterval;
    let currentImageIndex = 0;

    playButton.addEventListener("click", function () {
        // Check if autoplay is already running
        if (autoplayInterval) {
            clearInterval(autoplayInterval);
            autoplayInterval = null;
            playButton.textContent = "play_circle_outline";
        } else {
            autoplayInterval = setInterval(scrollImages, 2000);
            playButton.textContent = "pause_circle_outline";
        }
    });

    // Function to handle image scrolling
    function scrollImages() {
        currentImageIndex = (currentImageIndex + 1) % smallImages.length;
        updateBigImage(currentImageIndex);
    }

    // Function to handle fullscreen mode when expand button is clicked
    expandButton.addEventListener("click", function () {
        // Check if fullscreen API is supported
        if (document.fullscreenEnabled) {
            if (!document.fullscreenElement) {
                bigImage.requestFullscreen();
                bigImage.classList.add("fullscreen");
                expandButton.style.display = "none";
                normalScreenButton.style.display = "block";
            }
        }
    });

    // Function to handle exiting fullscreen mode
    normalScreenButton.addEventListener("click", function () {
        if (document.fullscreenElement) {
            document.exitFullscreen();
            bigImage.classList.remove("fullscreen");
            normalScreenButton.style.display = "none";
            expandButton.style.display = "block";
        }
    });

    // Function to handle click on smaller images
    smallImages.forEach((img, index) => {
        img.addEventListener("click", () => {
            updateBigImage(index);
        });
    });

    // Function to update the big image and set active class
    function updateBigImage(index) {
        bigImage.classList.add("fade-out"); // Apply fade-out transition class
        setTimeout(() => {
            bigImage.src = smallImages[index].src;
            bigImage.classList.remove("fade-out"); // Remove fade-out transition class

            // Update active class on small images
            smallImages.forEach(img => img.classList.remove("active"));
            smallImages[index].classList.add("active");

            // Scroll the small images container to keep the active image in view
            const activeImage = smallImages[index];
            const containerWidth = smallImagesContainer.offsetWidth;
            const imageLeft = activeImage.offsetLeft;
            const imageWidth = activeImage.offsetWidth;

            smallImagesContainer.scrollTo({
                left: imageLeft - containerWidth / 2 + imageWidth / 2,
                behavior: "smooth"
            });

            currentImageIndex = index;
        }, 500); // Adjust the duration of the fade effect (in milliseconds)
    }

    // Event listener to handle exiting fullscreen mode via ESC key or system UI
    document.addEventListener("fullscreenchange", () => {
        if (!document.fullscreenElement) {
            bigImage.classList.remove("fullscreen");
            normalScreenButton.style.display = "none";
            expandButton.style.display = "block";
        }
    });

    // Initialize the first image as active
    smallImages[0].classList.add("active");
});

//login modal, register modal, forgot psw
document.addEventListener('DOMContentLoaded', () => {
    const loginModal = document.getElementById('login-modal');
    const registerModal = document.getElementById('register-modal');
    const forgotPasswordModal = document.getElementById('forgot-password-modal');
    const loginLinks = document.querySelectorAll('#login-link, #side-login-link');
    const registerLinks = document.querySelectorAll('#register-link, #side-register-link');
    const forgotPasswordLink = document.getElementById('forgot-password-link');
    const closeButtons = document.querySelectorAll('.close-button');
    const loginLinkModal = document.getElementById('login-link-modal');
    const registerLinkModal = document.getElementById('register-link-modal');
    const menuCheckbox = document.getElementById('menu-checkbox');
    const menuIcon = document.querySelector('.menu-icon');
    const sideNavMenu = document.getElementById('side-nav-menu');

    function closeSideNav() {
        menuCheckbox.checked = false;
        sideNavMenu.style.left = '-150%'; // Adjust this if your hiding style is different
        menuIcon.textContent = 'menu'; // Change menu icon back to 'menu'
    }

    loginLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            loginModal.style.display = 'block';
            closeSideNav();
        });
    });

    registerLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            registerModal.style.display = 'block';
            closeSideNav();
        });
    });

    if (forgotPasswordLink) {
        forgotPasswordLink.addEventListener('click', (e) => {
            e.preventDefault();
            loginModal.style.display = 'none';
            forgotPasswordModal.style.display = 'block';
            closeSideNav();
        });
    }

    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            loginModal.style.display = 'none';
            registerModal.style.display = 'none';
            forgotPasswordModal.style.display = 'none';
        });
    });

    window.addEventListener('click', (event) => {
        if (event.target == loginModal) {
            loginModal.style.display = 'none';
        } else if (event.target == registerModal) {
            registerModal.style.display = 'none';
        } else if (event.target == forgotPasswordModal) {
            forgotPasswordModal.style.display = 'none';
        }
    });

    registerLinkModal.addEventListener('click', (e) => {
        e.preventDefault();
        loginModal.style.display = 'none';
        registerModal.style.display = 'block';
    });

    loginLinkModal.addEventListener('click', (e) => {
        e.preventDefault();
        registerModal.style.display = 'none';
        loginModal.style.display = 'block';
    });

    // Event listener for the side navigation menu toggle
    menuCheckbox.addEventListener('change', () => {
        if (menuCheckbox.checked) {
            sideNavMenu.style.left = '0'; // Show side navigation menu
            menuIcon.textContent = 'close'; // Change menu icon to 'close' (X)
        } else {
            sideNavMenu.style.left = '-150%'; // Hide side navigation menu completely
            menuIcon.textContent = 'menu'; // Change menu icon back to 'menu'
        }
    });
});
//share
// JavaScript for handling click events on share icons
document.getElementById('instagram').addEventListener('click', function() {
    // Replace 'shareUrl' with the actual URL for sharing on Instagram
    window.open('https://www.instagram.com/' + encodeURIComponent(window.location.href), '_blank');
});

document.getElementById('facebook').addEventListener('click', function() {
    // Replace 'shareUrl' with the actual URL for sharing on Facebook
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href), '_blank');
});

document.getElementById('other').addEventListener('click', function() {
    // Predefined message for the tweet
    var tweetMessage = 'Check out this awesome latest house listing:';

    // Create the tweet URL with the predefined message and the current page URL
    var tweetUrl = 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(tweetMessage) + '&url=' + encodeURIComponent(window.location.href);

    // Open a new window with the tweet URL
    window.open(tweetUrl, '_blank');
});

//notifs


