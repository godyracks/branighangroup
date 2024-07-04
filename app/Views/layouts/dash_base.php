<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta
      name="description"
      content="Branighan Group - Your trusted partner in real estate and home design in Kenya."
    />
    <title>Branighan Group | Dashboard</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <link
      rel="stylesheet"
      href="<?= base_url('/public/styles/dashboard.css') ?>"
    />
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
 <style>
        #container {
            width: 800px;
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 300px;
        }
    </style> 
</head>
<body>
    <nav class="navbar">
    <a href="<?= base_url('/dashboard/welcome') ?>">
    <img
            src="<?= base_url('/public/images/logo_dark.png') ?>"
            alt="Light Mode Logo"
            id="desktop-logo-dark"
            class="logo"
            />
    </a>
        <ul class="nav-links">
            <li><a href="<?= base_url('/dashboard') ?>">Dashboard →</a></li>
            <li class="dropdown">
                <a href="#">More</a>
                <div class="dropdown-content">
                    <a href="<?= base_url('/dashboard/blog_management') ?>">Blog Management</a>
                    <a href="<?= base_url('/dashboard/user_management') ?>">User Management</a>
                    <a href="<?= base_url('/dashboard/analytics') ?>">Analytics</a>
                    <a href="<?= base_url('/dashboard/support') ?>">Support</a>
                    <a href="#">Guide</a>
                </div>
            </li>
            
            <li><a href="<?= base_url('/dashboard/notifications') ?>"><i class="material-icons">notifications</i></a></li>
        </ul>
    </nav>

    <?php echo $this->renderSection('dash_content'); ?>


    <script src="<?= base_url('/public/scripts/dashboard.js') ?>"></script>
    <script>
        ClassicEditor.create(document.querySelector('#description'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.error('There was an error initializing the editor:', error);
            });
    </script>
</body>
</html>
