 document.addEventListener('DOMContentLoaded', function() {
     // Get all elements with class 'nav-link' that also have the 'active' class
     const activeNavLinks = document.querySelectorAll('.nav-link.activeSidebar');

     activeNavLinks.forEach(function(navLink) {
         let parentMenuDropdown = navLink.closest('.collapse.menu-dropdown');

         // Open all parent dropdowns
         while (parentMenuDropdown) {
             parentMenuDropdown.classList.add('show');
             parentMenuDropdown = parentMenuDropdown.parentElement.closest('.collapse.menu-dropdown');
         }
     });
 });