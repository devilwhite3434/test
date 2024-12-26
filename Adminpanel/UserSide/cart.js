document.addEventListener('DOMContentLoaded', () => {
    const totalPriceElement = document.getElementById('total-price');
    const cartItems = document.querySelectorAll('.cart-item');
    
    function calculateTotal() {
        let total = 0;
        cartItems.forEach(item => {
            const price = parseFloat(item.querySelector('p').textContent.replace('Rs: ', ''));
            const quantity = parseInt(item.querySelector('input').value);
            total += price * quantity;
        });
        totalPriceElement.textContent = total.toFixed(2);
    }

    cartItems.forEach(item => {
        const quantityInput = item.querySelector('input');
        const removeBtn = item.querySelector('.remove-btn');

        quantityInput.addEventListener('input', calculateTotal);

        removeBtn.addEventListener('click', () => {
            item.remove();
            calculateTotal();
        });
    });

    calculateTotal();
});
