<!--  Develop a checkout page that integrates with the payment gateway. -->

<!DOCTYPE html>
<html>
<head>
    <title>Simple Razorpay Checkout</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        body { font-family: Arial; margin: 20px; text-align: center; }
        input, button { padding: 8px; margin: 5px; }
    </style>
</head>
<body>

<h2>Checkout Page</h2>

<form id="checkoutForm">
    <label>Amount (₹): </label>
    <input type="number" id="amount" placeholder="Enter amount" value="500" required>
    <br>
    <button type="submit">Pay Now</button>
</form>

<script>
document.getElementById('checkoutForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var amount = document.getElementById('amount').value;
    if (amount <= 0) return alert('Enter a valid amount');

    var options = {
        "key": "rzp_test_Wyv2qGNNpG4czQ",
        "amount": amount * 100, 
        "currency": "INR",
        "name": "My Store",
        "description": "Test Transaction",
        "handler": function (response){
            alert("Payment Successful!\nPayment ID: " + response.razorpay_payment_id);

        },
        "prefill": {
            "name": "ram",
            "email": "ram@example.com",
            "contact": "9313183721"
        },
        "theme": {"color": "#3399cc"}
    };

    var rzp1 = new Razorpay(options);
    rzp1.open();
});
</script>

</body>
</html>
