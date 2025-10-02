import './bootstrap';

// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchToggle = document.querySelector('.search-toggle');
    const searchBar = document.querySelector('.search-bar');
    const searchForm = document.querySelector('.search-form');
    const searchInput = document.querySelector('.search-input');

    // Toggle search bar visibility
    if (searchToggle) {
        searchToggle.addEventListener('click', function(e) {
            e.preventDefault();
            searchBar.classList.toggle('active');
            if (searchBar.classList.contains('active')) {
                searchInput.focus();
            }
        });
    }

    // Close search when clicking outside
    document.addEventListener('click', function(e) {
        if (searchBar && searchBar.classList.contains('active') && 
            !searchBar.contains(e.target) && 
            e.target !== searchToggle && 
            !searchToggle.contains(e.target)) {
            searchBar.classList.remove('active');
        }
    });

    // Handle Escape key to close search
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && searchBar && searchBar.classList.contains('active')) {
            searchBar.classList.remove('active');
        }
    });
});
