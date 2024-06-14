const express = require('express');
const bodyParser = require('body-parser');
const PayFast = require('payfast');

const app = express();
const port = 3000;


const payfast = new PayFast({
  merchantId: '19652862',
  merchantKey: 'uy7uuulfifvxw',
  passphrase: 'YOUR_PASSPHRASE', 
  returnUrl: 'https://yourwebsite.com/payment/success',
  cancelUrl: 'https://yourwebsite.com/payment/cancel',
  notifyUrl: 'https://yourwebsite.com/payment/notify',
  sandbox: true, 
});

app.use(bodyParser.urlencoded({ extended: false }));

app.post('/pay', (req, res) => {
  const paymentData = {
    amount: req.body.amount,
    item_name: 'Order from YourWebsite',
    item_description: 'Description of your order',
    email_address: req.body.email,
    m_payment_id: 'unique-order-id', 
    return_url: payfast.returnUrl,
    cancel_url: payfast.cancelUrl,
    notify_url: payfast.notifyUrl,
  };

  const paymentUrl = payfast.createPaymentUrl(paymentData);

  res.redirect(paymentUrl);
});

app.post('/payment/notify', (req, res) => {
  const data = req.body;

  payfast.verifyPayment(data, (error, response) => {
    if (error) {
      console.error(error);
      return res.status(400).send('Payment verification failed');
    }

    
    console.log(response);
    

    res.status(200).send('Payment received');
  });
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
