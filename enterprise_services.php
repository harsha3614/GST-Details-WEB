<?php include "header.php"?>
<?php
session_start();
// Include database connection code here
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'gstdb';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$enterprisename = isset($_GET['name']) ? $_GET['name'] : '';
$_SESSION['en_name'] = $enterprisename;


$sql = "SELECT * FROM services WHERE enterprise_name='$enterprisename'";
$result = mysqli_query($conn, $sql);

?>
<style>

        .container-fluid {
            background-color: #0092DB;
            overflow: hidden;
            padding: 10px;
            text-align: right;
        }

        .container-fluid a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .container-fluid a:hover {
            background-color: #1b9bff;
            color: white;
            transition: 0.5s;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            background-color: #e2f0cb;
            border-radius: 10px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1),
                0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1),
                0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12),
                0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
            padding: 20px;
            margin: 20px;
            width: 200px;
            text-align: center;
            position: relative;
            filter: grayscale(100%);
            transition: filter 0.3s ease-in-out;
        }

        .card:hover {
            filter: grayscale(0%);
        }

        .book-service {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #0092DB;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            display: none;
            cursor: pointer;
        }

        .card:hover .book-service {
            display: block;
        }

        .card a {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }
    </style>
    <title>Enterprise List</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
</head>
<body>
    <br><br><br>
   
       

    <div class="card-container">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['en_service'] = $row['service_name'];
            $_SESSION['en_description'] = $row['description'];
            ?>
            <div class="card">
                <div class="book-service" onclick="addService('<?php echo $row['service_name']; ?>')">
                <!-- <a href="add_service.php">+ Add Service</a>  -->
                <a href="javascript:void(0)" class="buy_now" data-img="//www.tutsmake.com/wp-content/uploads/2019/03/c05917807.png" data-amount="<?php echo urlencode($row['Service_charge']); ?>" data-id="1">+ Add Service</a> 

                </div>
                <a href="enterprisedetails.php?id=<?php echo urlencode($row['service_name']); ?>">
                    <h3><?php echo $row['service_name']; ?></h3>
                </a>
                <p><?php echo $row['description']; ?></p>
            </div>
            <?php
        }
        ?>
    </div>

  

    <!-- payment -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

  $('body').on('click', '.buy_now', function(e){
    var prodimg = $(this).attr("data-img");
    var totalAmount = $(this).attr("data-amount");
    var product_id =  $(this).attr("data-id");
    var options = {
    "key": "rzp_test_mfirQjzdEoqvTn",
    "amount": (totalAmount*100), // 2000 paise = INR 20
    "name": "Tutsmake",
    "description": "Payment",
 
    "handler": function (response){
          $.ajax({
            url: 'payment-proccess.php',
            type: 'post',
            dataType: 'json',
            data: {
                razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
            }, 
            success: function (msg) {

               window.location.href = 'https://www.tutsmake.com/Demos/php/razorpay/success.php';
            }
        });
     
    },

    "theme": {
        "color": "#528FF0"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
  e.`preventDefault`();
  });

</script>

<script src=""></script>

<script>
 
  $('body').on('click', '.buy_now', function(e){
    var prodimg = $(this).attr("data-img");
    var totalAmount = $(this).attr("data-amount");
    var product_id =  $(this).attr("data-id");
    var options = {
    "key": "rzp_test_mfirQjzdEoqvTn", // secret key id
    "amount": (totalAmount*100), // 2000 paise = INR 20
    "name": "Tutsmake",
    "description": "Payment",
 
    "handler": function (response){
          $.ajax({
            url: 'payment-proccess.php',
            type: 'post',
            dataType: 'json',
            data: {
                razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
            }, 
            success: function (msg) {
 
               window.location.href = 'payment-success.php';
            }
        });
      
    },
 
    "theme": {
        "color": "#528FF0"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
  e.preventDefault();
  });
 
</script>
</body>
</html>

<?php
mysqli_close($conn);
?>
