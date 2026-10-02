document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('passwordToggle');
    const password = document.getElementById('password');
    const icon = toggle?.querySelector('i');
    toggle?.addEventListener('click', () => {
        const showing = password.type === 'text';
        password.type = showing ? 'password' : 'text';
        icon.classList.toggle('fa-eye', !showing);
        icon.classList.toggle('fa-eye-slash', showing);
        toggle.setAttribute('aria-label', showing ? 'Show password' : 'Hide password');
    });
    const alert = document.querySelector('.alert');
    if (alert) setTimeout(() => alert.remove(), 5000);
});
