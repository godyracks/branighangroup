 <?= $this->extend('layouts/base') ?> <?= $this->section('content') ?>
 <div class="profile-container">
        <h1>User Profile</h1>
        <p>Welcome to your profile page. This page is currently under development.</p>
        <a href="/logout">Logout</a>
    </div>
    
    <style>
         .profile-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
            margin-top:20px;
            margin-bottom:20px;
        }
        h1 {
            color: #333333;
        }
        p {
            color: #666666;
            margin-bottom: 20px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
     <?= $this->endSection() ?>