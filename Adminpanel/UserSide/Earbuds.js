document.addEventListener("DOMContentLoaded", function() {
    const filterPriceRadios = document.querySelectorAll('input[name="price"]');
    const sortSelect = document.getElementById('sort');
    const productList = document.querySelector('.product-list');

    filterPriceRadios.forEach(radio => {
        radio.addEventListener('change', filterProducts);
    });

    sortSelect.addEventListener('change', sortProducts);

    function filterProducts() {
        const selectedPrice = document.querySelector('input[name="price"]:checked').value;
        const products = document.querySelectorAll('.product');

        products.forEach(product => {
            const priceText = product.querySelector('p').innerText;
            const price = parseInt(priceText.replace(/[^0-9]/g, ''));

            switch (selectedPrice) {
                case 'below-2000':
                    product.style.display = price < 2000 ? 'block' : 'none';
                    break;
                case '3000-3000':
                    product.style.display = (price >= 2000 && price <= 3000) ? 'block' : 'none';
                    break;
                case '3000-5000':
                    product.style.display = (price >= 3000 && price <= 5000) ? 'block' : 'none';
                    break;
                case '5000-15000':
                    product.style.display = (price >= 5000 && price <= 15000) ? 'block' : 'none';
                    break;
                case '15000-above':
                    product.style.display = (price > 15000) ? 'block' : 'none';
                    break;
                default:
                    product.style.display = 'block';
                    break;
            }
        });
    }

    function sortProducts() {
        const sortBy = sortSelect.value;
        const products = Array.from(document.querySelectorAll('.product'));

        products.sort((a, b) => {
            const priceA = parseInt(a.querySelector('p').innerText.replace(/[^0-9]/g, ''));
            const priceB = parseInt(b.querySelector('p').innerText.replace(/[^0-9]/g, ''));

            if (sortBy === 'best-match') {
                return a.innerText.localeCompare(b.innerText);
            } else if (sortBy === 'top-sales') {
                // Assuming top sales sorting based on price for simplicity
                return priceA - priceB;
            }

            return 0;
        });

        products.forEach(product => {
            productList.appendChild(product);
        });
    }
});
