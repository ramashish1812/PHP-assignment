<!--  Set up the payment gateway account.
  Create an API endpoint for processing payments. 
  Handle payment success and failure responses. -->

 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Simple Razorpay Payment</title>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

  <h2>Pay with Razorpay</h2>
  <button id="payBtn">Pay ₹500</button>

  <script>
    document.getElementById("payBtn").onclick = function(e){
        var options = {
            "key": "rzp_test_Wyv2qGNNpG4czQ", 
            "amount": 50000, 
            "currency": "INR",
            "name": "My Shop",
            "description": "Test Transaction",
            "handler": function (response){
                alert("Payment Successful!\nPayment ID: " + response.razorpay_payment_id);
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        e.preventDefault();
    }
  </script>

</body>
</html>
