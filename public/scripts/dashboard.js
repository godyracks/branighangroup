document.addEventListener('DOMContentLoaded', () => {
    const tabLinks = document.querySelectorAll('.tab-link');
    const tabContents = document.querySelectorAll('.tab-content');

    tabLinks.forEach(link => {
        link.addEventListener('click', () => {
            tabLinks.forEach(link => link.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));

            link.classList.add('active');
            document.getElementById(link.dataset.tab).classList.add('active');
        });
    });
});


function showForm(formId) {
    const form = document.getElementById(formId);
    form.style.display = form.style.display === 'block' ? 'none' : 'block';
}

document.addEventListener('DOMContentLoaded', () => {
    // JavaScript for dashboard interactions can be added here
});


// blog
function showForm(formId) {
    const form = document.getElementById(formId);
    form.style.display = form.style.display === 'block' ? 'none' : 'block';
}

document.addEventListener('DOMContentLoaded', () => {
    // JavaScript for blog management interactions can be added here
});

document.addEventListener('DOMContentLoaded', () => {
    const richtextElements = document.querySelectorAll('.richtext');
    richtextElements.forEach(element => {
        element.contentEditable = true;
    });
});
// user-mgmt
// JavaScript for user management interactions can be added here
// For example, handling edit/delete actions for users and roles
document.addEventListener('DOMContentLoaded', () => {
    const editButtons = document.querySelectorAll('.role button');
    
    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Logic to handle edit button click
            console.log('Edit button clicked');
        });
    });

    const deleteButtons = document.querySelectorAll('.user-list button');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Logic to handle delete button click
            console.log('Delete button clicked');
        });
    });
});
