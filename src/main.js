document.addEventListener('DOMContentLoaded', () => {
  // Toggle menu for mobile
  const menuHamburguesa = document.getElementById('menuHamburguesa');
  const menu = document.getElementById('menu');

  if (menuHamburguesa && menu) {
    menuHamburguesa.addEventListener('click', () => {
      menu.classList.toggle('active');
    });
  }
});

// Close menu when clicking outside
document.addEventListener('click', (e) => {
  const menu = document.getElementById('menu');
  const menuHamburguesa = document.getElementById('menuHamburguesa');

  if (menu && menuHamburguesa) {
    if (
      !menu.contains(e.target) &&
      !menuHamburguesa.contains(e.target) &&
      menu.classList.contains('active')
    ) {
      menu.classList.remove('active');
    }
  }
});
