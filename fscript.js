document.getElementById('resetForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const email = document.getElementById('email').value;
    if (email) {
        alert('A password reset link has been sent to ' + email);
    } else {
        alert('Please enter a valid email address.');
    }
});
