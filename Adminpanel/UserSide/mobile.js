document.addEventListener('DOMContentLoaded', () => {
    const priceFilters = document.querySelectorAll('input[name="price"]');
    const sortSelect = document.getElementById('sort');
    const searchInput = document.getElementById('search');
    const searchButton = document.getElementById('search-button');
    const productContainer = document.querySelector('.product-list');
    const searchResults = document.getElementById('search-results');

    priceFilters.forEach(filter => {
        filter.addEventListener('change', filterProducts);
    });

    sortSelect.addEventListener('change', sortProducts);
    searchInput.addEventListener('input', searchProducts);
    searchButton.addEventListener('click', searchProducts);

    function filterProducts() {
        const selectedPrice = document.querySelector('input[name="price"]:checked')?.value;
        const products = document.querySelectorAll('.product');

        products.forEach(product => {
            const priceText = product.querySelector('p').innerText.split('Rs:')[1]?.trim().replace(',', '');
            const price = parseInt(priceText);

            if (selectedPrice) {
                switch (selectedPrice) {
                    case 'below-15000':
                        product.style.display = price < 15000 ? 'block' : 'none';
                        break;
                    case '15000-20000':
                        product.style.display = (price >= 15000 && price <= 20000) ? 'block' : 'none';
                        break;
                    case '20000-40000':
                        product.style.display = (price >= 20000 && price <= 40000) ? 'block' : 'none';
                        break;
                    case '40000-80000':
                        product.style.display = (price >= 40000 && price <= 80000) ? 'block' : 'none';
                        break;
                    case '80000-above':
                        product.style.display = price > 80000 ? 'block' : 'none';
                        break;
                }
            } else {
                product.style.display = 'block';
            }
        });
    }

    function sortProducts() {
        const sortBy = sortSelect.value;
        const products = Array.from(document.querySelectorAll('.product'));

        let sortedProducts;

        if (sortBy === 'best-match') {
            sortedProducts = products.sort((a, b) => {
                return a.querySelector('p').innerText.localeCompare(b.querySelector('p').innerText);
            });
        } else if (sortBy === 'top-sales') {
            sortedProducts = products.sort((a, b) => {
                const priceA = parseInt(a.querySelector('p').innerText.split('Rs:')[1]?.trim().replace(',', ''));
                const priceB = parseInt(b.querySelector('p').innerText.split('Rs:')[1]?.trim().replace(',', ''));
                return priceB - priceA;
            });
        }

        productContainer.innerHTML = '';
        sortedProducts.forEach(product => {
            productContainer.appendChild(product);
        });
    }

    function searchProducts() {
        const query = searchInput.value.toLowerCase();
        const products = document.querySelectorAll('.product');
        searchResults.innerHTML = '';
        let matches = 0;

        products.forEach(product => {
            const productName = product.querySelector('p').innerText.toLowerCase();
            if (productName.includes(query)) {
                product.style.display = 'block';
                const li = document.createElement('li');
                li.innerText = product.querySelector('p').innerText;
                li.addEventListener('click', () => {
                    searchInput.value = li.innerText;
                    searchResults.innerHTML = '';
                    products.forEach(p => {
                        if (p.querySelector('p').innerText.toLowerCase().includes(query)) {
                            p.style.display = 'block';
                        } else {
                            p.style.display = 'none';
                        }
                    });
                });
                searchResults.appendChild(li);
                matches++;
            } else {
                product.style.display = 'none';
            }
        });

        searchResults.style.display = matches > 0 ? 'block' : 'none';
    }

    function addToCart(product) {
        const productName = product.querySelector('p').innerText.split('<br>')[0];
        alert(productName + ' has been added to your cart.');
    }

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', (event) => {
            const product = event.target.closest('.product');
            addToCart(product);
        });
    });
});
