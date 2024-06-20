<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>


<div class="faqs-container">
    <h1 class="faqs-title">Frequently Asked Questions</h1>

    <div class="faq">
        <button class="question">
            What types of ready-made homes do you offer?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">We offer a variety of prefab homes and modern modular designs.</div>
    </div>

    <div class="faq">
        <button class="question">
            Can you customize the ready-made homes to suit my preferences?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">Yes, we can customize designs to meet your specific requirements.</div>
    </div>

    <div class="faq">
        <button class="question">
            What are the benefits of choosing a ready-made home over traditional construction?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">Advantages include faster construction times and cost-effectiveness.</div>
    </div>

    <div class="faq">
        <button class="question">
            Do you handle the entire process, from design to installation?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">Yes, we manage everything from initial consultation to final installation.</div>
    </div>

    <div class="faq">
        <button class="question">
            Are your construction designs suitable for urban areas as well as rural locations?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">Our designs are versatile and comply with local building regulations.</div>
    </div>

    <div class="faq">
        <button class="question">
            What materials are used in your construction designs?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">We use durable and sustainable materials, ensuring quality and efficiency.</div>
    </div>

    <div class="faq">
        <button class="question">
            Can you assist with obtaining permits and regulatory approvals?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">Yes, we help navigate the regulatory process and obtain necessary approvals.</div>
    </div>

    <div class="faq">
        <button class="question">
            How long does it typically take to build and install a ready-made home?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">The timeframe varies but is generally quicker than traditional construction methods.</div>
    </div>

    <div class="faq">
        <button class="question">
            What after-sales services do you offer?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">We provide warranties, maintenance services, and ongoing support post-installation.</div>
    </div>

    <div class="faq">
        <button class="question">
            Do you offer financing options for purchasing ready-made homes?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">Yes, we have financing options available through our partnerships with financial institutions.</div>
    </div>

    <div class="faq">
        <button class="question">
            Can I visit a model home or see examples of your previous projects?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">You can visit model homes or view our portfolio to see our work.</div>
    </div>

    <div class="faq">
        <button class="question">
            Are your construction designs environmentally friendly?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">Yes, we prioritize eco-friendly practices and materials in our designs.</div>
    </div>

    <div class="faq">
        <button class="question">
            How do your prices compare to traditional construction costs?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">Our prices are competitive and reflect the efficiency and quality of our ready-made homes.</div>
    </div>

    <div class="faq">
        <button class="question">
            Do you work with clients outside of Kenya, such as in neighboring East African countries?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">Yes, we serve clients across East Africa, including Kenya and neighboring countries.</div>
    </div>

    <div class="faq">
        <button class="question">
            What are the steps involved if I decide to proceed with purchasing a ready-made home or construction design?
            <span class="material-icons arrow">keyboard_arrow_up</span>
        </button>
        <div class="answer">The process includes consultation, design customization, approval, and installation.</div>
    </div>

</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
    const questions = document.querySelectorAll('.question');

    questions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            answer.classList.toggle('show');

            const icon = this.querySelector('.arrow');
            icon.classList.toggle('arrow-up');
            icon.textContent = icon.classList.contains('arrow-up') ? 'keyboard_arrow_down' : 'keyboard_arrow_up';
        });
    });
});
</script>



  <?= $this->endSection() ?>
