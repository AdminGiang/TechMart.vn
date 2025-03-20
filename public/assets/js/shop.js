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

    // Price Range Slider
    const priceRange = document.getElementById('priceRange');
    const minPriceInput = document.getElementById('minPrice');
    const maxPriceInput = document.getElementById('maxPrice');

    // Update max price when slider changes
    priceRange.addEventListener('input', function() {
        maxPriceInput.value = this.value;
        updateFilters();
    });

    // Update slider when max price input changes
    maxPriceInput.addEventListener('change', function() {
        if (parseInt(this.value) < parseInt(minPriceInput.value)) {
            this.value = minPriceInput.value;
        }
        priceRange.value = this.value;
        updateFilters();
    });

    // Update min price input
    minPriceInput.addEventListener('change', function() {
        if (parseInt(this.value) > parseInt(maxPriceInput.value)) {
            this.value = maxPriceInput.value;
        }
        updateFilters();
    });

    // Handle brand checkboxes
    document.querySelectorAll('input[name="brand[]"]').forEach(checkbox => {
        checkbox.addEventListener('change', updateFilters);
    });

    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            addToCart(productId);
        });
    });
});

function updateFilters() {
    const url = new URL(window.location.href);
    
    // Update price range
    url.searchParams.set('min_price', minPriceInput.value);
    url.searchParams.set('max_price', maxPriceInput.value);
    
    // Update brands
    const selectedBrands = Array.from(document.querySelectorAll('input[name="brand[]"]:checked'))
        .map(cb => cb.value);
    if (selectedBrands.length > 0) {
        url.searchParams.set('brand', selectedBrands.join(','));
    } else {
        url.searchParams.delete('brand');
    }
    
    // Update sort
    const sortValue = document.getElementById('sortSelect').value;
    if (sortValue !== 'default') {
        url.searchParams.set('sort', sortValue);
    } else {
        url.searchParams.delete('sort');
    }
    
    // Reset to first page
    url.searchParams.set('page', '1');
    
    window.location.href = url.toString();
}

function addToCart(productId) {
    // Gửi request AJAX để thêm sản phẩm vào giỏ hàng
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Hiển thị thông báo thành công
            Swal.fire({
                title: 'Thành công!',
                text: 'Đã thêm sản phẩm vào giỏ hàng',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            });
            
            // Cập nhật số lượng sản phẩm trong giỏ hàng
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                cartCount.textContent = data.cartCount;
            }
        } else {
            // Hiển thị thông báo lỗi
            Swal.fire({
                title: 'Lỗi!',
                text: data.message || 'Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng',
                icon: 'error'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Lỗi!',
            text: 'Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng',
            icon: 'error'
        });
    });
} 