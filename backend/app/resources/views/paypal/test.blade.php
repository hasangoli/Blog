<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> PayPal Checkout Integration | Server Demo </title>
</head>

<body>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Include the PayPal JavaScript SDK -->
        <script src="https://www.paypal.com/sdk/js?client-id=ATxNrpFe3QO9keRNCWR0yo9JFm5-UyOAm5lWta4O_U2E-kW-wWHSbjwmHvLVI_QYVu-z5DQEEPDvUqwq&currency=GBP"></script>

        <script>

        var randomNum = Math.random();

        @if($type == 'recruitmentAds')
        let urlPaypal = "{{ route('paypal.recruitment') }}";
        @elseif($type == 'product')
        let urlPaypal = "{{ route('paypal.product') }}";
        @endif


        let dataPay = {
            "_token": "{{ csrf_token() }}",
            @if($type == 'recruitmentAds')
                'recruitment_id':"{{ $id }}",
            @elseif($type == 'product')
                'product_id':"{{ $id }}",
                'count':"{{ $count }}",
            @endif

            'user_id':{{ $user_id }},
            'authority':randomNum,
        };


        $.post(urlPaypal,dataPay, function(msg,status) {
            console.log(msg,status);
            paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {

                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: {{ $amount }},
                        },
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {

                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    @if($type == 'recruitmentAds')
                    let urlPaypal = "{{ route('paypal.recruitment.veryfy') }}";
                    @elseif($type == 'product')
                    let urlPaypal = "{{ route('paypal.product.veryfy') }}";
                    @endif
                    let dataPay = {
                        "_token": "{{ csrf_token() }}",
                        @if($type == 'recruitmentAds')
                            'recruitment_id':"{{ $id }}",

                        @elseif($type == 'product')
                            'product_id':"{{ $id }}",
                            'count':"{{ $count }}",
                        @endif
                        'authority':randomNum,
                        'ref_id':transaction.id,
                    };



                    if(transaction.status == "COMPLETED"){
                        $.post(urlPaypal,dataPay, function(msg,status) {
                            console.log(msg)
                        },'json');
                    }
                    // Replace the above to show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }

            }).render('#paypal-button-container');
        },'json');

        </script>


</body>

</html>



