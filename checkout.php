<?php include_once('connect.php') ?>
<?php include_once('topbar.php') ?>
<?php
  $order_id = $_SESSION['order_id'];
  $user_id = $_SESSION['user_id'];

  $sql = "SELECT pro.*, pro.name as product_name from orders ord left join products pro on ord.product_id = pro.id where ord.id = '$order_id'";
  $sql2 = "SELECT * from users where id='$user_id'";

  $order_q = mysqli_query($con, $sql);
  $user_q=mysqli_query($con,$sql2);

  $order_details = mysqli_fetch_array($order_q);
  $user = mysqli_fetch_array($user_q);

?>
  <div class="container my-5">
    <div class="row mt-5">
    <div class="d-flex justify-content-between col-md-12 my-5 ">
      <div class="pb-4  my-5 col-6 px-3" id="">
          <h4 class="text-info p-2 mt-3">Complete your order!</h4>
            <div class="jumbotron p-3 mb-2">
              <h6 class="lead"><b>Product(s) : <?php echo $order_details['product_name']; ?> </b></h6>
              
              <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
              <h5><b>Total Amount Payable : NRs <?php echo $order_details['price']; ?></b>/-</h5>
              <p>
                <img src="./dashboard/uploads/<?php echo $order_details['image'] ?>" alt="" class="img-fluid py-4">
              </p>
            </div>
      </div>
        <div class="col-6 mt-5">
          <form action="confirm_order.php" method="post" id="placeOrder">
            <input type="hidden" name="order_id" value="<?php echo $order_details['id']; ?>">
            <input type="hidden" name="price" id="amount" value="<?php echo $order_details['price']; ?>">
            <input type="hidden" id="payment_type" name="payment_type" value="cash">
            
            <h5 class="border-bottom py-2" style="color:#64A23F">Shipping Address</h5>
            <div class="form-group">
            
              <label>Full name</label>
              <input type="text" readonly value="<?php echo $user['name'] ?>" name="name" class="form-control mb-2" placeholder="Enter Name">
            </div>
            <div class="form-group">
            <label>Email</label>
              <input type="email" name="email" value="<?php echo $user['email'] ?>" class="form-control mb-2" placeholder="Enter E-Mail" readonly>
            </div>
            <div class="form-group">
            <label>Phone</label>
              <input type="tel" name="phone" class="form-control mb-2" placeholder="Enter Phone" value="<?php echo $user['phone'] ?>" required>
            </div>
            <div class="form-group">
            <label>Address</label>
              <textarea name="address" class="form-control mb-2" rows="3" cols="10" placeholder="Enter Delivery Address Here..." ><?php echo $user['address'] ?></textarea>
            </div>
            <div class="form-group">
              <button id="payment-button" type="button">Pay via Khalti</button>

              <input type="submit" id ="confirm_order" name="submit" value="Cash on Delivery and Place Order" class="btn btn-danger btn-block">
            </div>  
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
  <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_a08dc75822cd4b0f9cac6f2bd3ba5e2e",
            "productIdentity": "1234567890",
            "productName": "test",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    // console.log(payload);

                    //change the payment type to khalti
                    document.getElementById('payment_type').value = 'khalti';
                   if(confirm('Payment done successfully and the order has been placed!')){

                    // click the form after payment is success
                    document.getElementById('confirm_order').click();
                   }
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            var price = document.getElementById('amount').value
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: price * 100 });
        }
    </script>
<?php include_once('foot.php') ?>