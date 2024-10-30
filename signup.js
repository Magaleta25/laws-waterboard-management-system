document.getElementById('signupForm').addEventListener('submit', function (event) {
    const usernamePattern = /^[a-zA-Z0-9]{5,15}$/;
    const telPattern = /^[a-zA-Z\s]+$/;
    const addressPattern = /^[a-zA-Z0-9\s,.-]+$/;
    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    const username = document.getElementById('username').value;
    const fullname = document.getElementById('tel').value;
    const address = document.getElementById('address').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    if (!usernamePattern.test(username)) {
        alert('Username should be 5-15 characters long and contain only letters and numbers.');
        event.preventDefault();
    }
    if (!phonePattern.test(phone)) {
        alert('Phone number must be 10 digits.');
        event.preventDefault();
    }
    if (!addressPattern.test(address)) {
        alert('Address can contain letters, numbers, spaces, commas, periods, and hyphens.');
        event.preventDefault();
    }
    if (!passwordPattern.test(password)) {
        alert('Password must be at least 8 characters long, with at least one letter and one number.');
        event.preventDefault();
    }
    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        event.preventDefault();
    }
});
