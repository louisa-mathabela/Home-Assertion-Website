document.addEventListener('DOMContentLoaded', function() {
    const deliveryOption = document.querySelector('input[name="delivery_option"]:checked');
    const deliveryDetails = document.getElementById('delivery-details');
    const cardDetails = document.getElementById('card-details');

    if (deliveryOption && deliveryOption.value === 'store_pickup') {
        deliveryDetails.style.display = 'none';
    }

    if (deliveryOption && deliveryOption.value === 'home_delivery') {
        deliveryDetails.style.display = 'block';
    }

    const paymentOptions = document.querySelector('input[name="payment_option"]:checked');
    if (paymentOptions && paymentOptions.value === 'cash') {
        cardDetails.style.display = 'none';
    }

    if (paymentOptions && paymentOptions.value === 'card') {
        cardDetails.style.display = 'block';
    }

    document.querySelectorAll('input[name="delivery_option"]').forEach((option) => {
        option.addEventListener('change', function() {
            if (this.value === 'store_pickup') {
                deliveryDetails.style.display = 'none';
            } else if (this.value === 'home_delivery') {
                deliveryDetails.style.display = 'block';
            }
        });
    });

    document.querySelectorAll('input[name="payment_option"]').forEach((option) => {
        option.addEventListener('change', function() {
            if (this.value === 'cash') {
                cardDetails.style.display = 'none';
            } else if (this.value === 'card') {
                cardDetails.style.display = 'block';
            }
        });
    });
});
