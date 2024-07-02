<?= $this->extend('layouts/dash_base') ?> 
<?= $this->section('dash_content') ?>
<div class="container">
        <section class="support">
            <h2>Support and Feedback</h2>
            
            <!-- Support Requests Form -->
            <div class="support-request">
                <h3>Support Requests</h3>
                <form id="support-form">
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="4" required></textarea>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
            
            <!-- Feedback Form -->
            <div class="user-feedback">
                <h3>Feedback</h3>
                <form id="feedback-form">
                    <div class="form-group">
                        <label for="feedback">Your Feedback:</label>
                        <textarea id="feedback" name="feedback" rows="4" required></textarea>
                    </div>
                    <button type="submit">Submit Feedback</button>
                </form>
            </div>
            
        </section>
    </div>
<?= $this->endSection() ?>