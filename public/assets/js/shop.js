// Handle filter form submission
document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filterForm');
    if (filterForm) {
        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            this.submit();
        });
    }

    // Handle sort select change
    const sortSelect = document.getElementById('sortSelect');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            filterForm.submit();
        });
    }

    // Handle price range inputs
    const priceFromInput = document.getElementById('price_from');
    const priceToInput = document.getElementById('price_to');
    
    if (priceFromInput && priceToInput) {
        priceFromInput.addEventListener('input', function() {
            if (this.value && priceToInput.value && parseInt(this.value) > parseInt(priceToInput.value)) {
                this.value = priceToInput.value;
            }
        });

        priceToInput.addEventListener('input', function() {
            if (this.value && priceFromInput.value && parseInt(this.value) < parseInt(priceFromInput.value)) {
                this.value = priceFromInput.value;
            }
        });
    }

    // Format price display
    const priceElements = document.querySelectorAll('.price-format');
    priceElements.forEach(function(element) {
        const price = parseInt(element.textContent);
        element.textContent = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(price);
    });
}); 