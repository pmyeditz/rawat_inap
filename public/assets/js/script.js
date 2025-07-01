const themeToggle = document.getElementById('theme-toggle');
// Check localStorage for theme preference
if (localStorage.getItem('dark-mode') === 'enabled') {
    document.body.classList.add('dark-mode');
    themeToggle.innerHTML = '<i class="fas fa-sun"></i> Mode Terang';
}

themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    if (document.body.classList.contains('dark-mode')) {
        themeToggle.innerHTML = '<i class="fas fa-sun"></i> Mode Terang';
        localStorage.setItem('dark-mode', 'enabled');
    } else {
        themeToggle.innerHTML = '<i class="fas fa-adjust"></i> Mode Gelap';
        localStorage.setItem('dark-mode', 'disabled');
    }
});
