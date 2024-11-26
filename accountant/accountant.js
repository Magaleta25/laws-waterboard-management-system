document.addEventListener('DOMContentLoaded', () => {
    loadPayments();
    loadHistory();

    // Profile button click events
    document.getElementById('view-profile-btn').addEventListener('click', () => showSection('view-profile'));
    document.getElementById('edit-profile-btn').addEventListener('click', () => showSection('edit-profile'));

    // Sidebar navigation click events
    document.querySelector('[href="#verify-payments"]').addEventListener('click', () => showSection('verify-payments'));
    document.querySelector('[href="#payment-history"]').addEventListener('click', () => showSection('payment-history'));
    document.querySelector('[href="#announcements"]').addEventListener('click', () => showSection('announcements'));

    // Edit Profile Form Submission
    document.getElementById('edit-profile-form').addEventListener('submit', (e) => {
        e.preventDefault();
        const newName = document.getElementById('edit-name').value;
        const newEmail = document.getElementById('edit-email').value;

        // Update profile info
        document.getElementById('profile-name').textContent = newName;
        document.getElementById('profile-email').textContent = newEmail;

        alert('Profile updated successfully!');
        showSection('view-profile'); // Go back to view profile after update
    });
});

// Function to load payments
function loadPayments() {
    const paymentsList = document.getElementById('payments-list');
    paymentsList.innerHTML = '<p>Payment ID: 001 - User: your_name - Status: Pending <button onclick="verifyPayment(1)">Verify</button></p>';
}

// Function to load payment history
function loadHistory() {
    const historyList = document.getElementById('history-list');
    historyList.innerHTML = '<p>Payment ID: 001 - Amount: $100 - Status: Verified</p>';
}

// Function to verify payments
function verifyPayment(id) {
    alert(`Payment ID ${id} has been verified.`);
}

// Function to post announcements
document.getElementById('announcement-form').addEventListener('submit', (e) => {
    e.preventDefault();
    const input = document.getElementById('announcement-input').value;
    const list = document.getElementById('announcements-list');

    const newAnnouncement = document.createElement('p');
    newAnnouncement.textContent = input;
    list.appendChild(newAnnouncement);

    document.getElementById('announcement-input').value = '';
});

// Improved Function to handle section display
function showSection(sectionId) {
    // Hide all sections first
    const sections = document.querySelectorAll('section');
    sections.forEach(section => {
        section.style.display = 'none';
    });

    // Display the selected section
    const selectedSection = document.getElementById(sectionId);
    if (selectedSection) {
        selectedSection.style.display = 'block';
    }
}
