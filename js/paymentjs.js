  

    // JavaScript function to show a confirmation pop-up
    function confirmPayment() {
        const confirmation = confirm("Are you sure you want to proceed with the payment?");
        if (confirmation) {
            // Redirect to the payment page if confirmed
            window.location.href = '5.html';
        } else {
            // Optionally, show a message or simply do nothing if canceled
            alert("Payment canceled");
        }
    }
