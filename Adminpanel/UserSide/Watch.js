document.addEventListener('DOMContentLoaded', function () {
    const filterInputs = document.querySelectorAll('.filter-price input[type="radio"]');
    const sortSelect = document.getElementById('sort');
    const productList = document.querySelector('.product-list');
    const products = Array.from(productList.children);

    filterInputs.forEach(input => {
        input.addEventListener('change', filterProducts);
    });

    sortSelect.addEventListener('change', sortProducts);

    function filterProducts() {
        const selectedFilter = document.querySelector('.filter-price input[type="radio"]:checked').value;

        products.forEach(product => {
            const productPrice = parseInt(product.querySelector('p').innerText.split('Rs:')[1].replace(/,/g, ''), 10);

            switch (selectedFilter) {
                case 'below-15000':
                    product.style.display = productPrice < 15000 ? 'block' : 'none';
                    break;
                case '15000-20000':
                    product.style.display = (productPrice >= 15000 && productPrice <= 20000) ? 'block' : 'none';
                    break;
                case '20000-40000':
                    product.style.display = (productPrice >= 20000 && productPrice <= 40000) ? 'block' : 'none';
                    break;
                case '40000-80000':
                    product.style.display = (productPrice >= 40000 && productPrice <= 80000) ? 'block' : 'none';
                    break;
                case '80000-above':
                    product.style.display = productPrice > 80000 ? 'block' : 'none';
                    break;
                default:
                    product.style.display = 'block';
            }
        });
    }

    function sortProducts() {
        const selectedSort = sortSelect.value;

        const sortedProducts = products.sort((a, b) => {
            const priceA = parseInt(a.querySelector('p').innerText.split('Rs:')[1].replace(/,/g, ''), 10);
            const priceB = parseInt(b.querySelector('p').innerText.split('Rs:')[1].replace(/,/g, ''), 10);

            if (selectedSort === 'top-sales') {
                return priceA - priceB; // Sort by price ascending
            } else {
                return priceB - priceA; // Sort by price descending (Best Match)
            }
        });

        sortedProducts.forEach(product => {
            productList.appendChild(product);
        });
    }
});
