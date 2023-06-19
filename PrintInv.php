<?php 
  $servername = "localhost";
  $userName= "root";
  $password = "";
  $database = "dms";

  
  // Create Connection
  $con = new mysqli($servername, $userName, $password, $database);

 // Accessing Data of a session
  session_start();
  
    #User Data
    $USERNAME = $_SESSION['Username'];
    $USERID = $_SESSION['userid'];
    $TYPE = $_SESSION['type'];



  $userdata = $_SESSION['userdata'];

  $clicked_value = "" ;

  $maxres ="";

  $id = $userdata['newid'];
  $name =$userdata['name'];
  $sname = $userdata['sname'];
  $phone = $userdata['phone'];
  $address = $userdata['address'];
  $note = $userdata['note'];
  $treatmentName =$userdata['treatment'];
  $total =$userdata['total'];
  $recevid = $userdata['recived'];
  
$rem = $total - $recevid;

  $current_date = date('Y-m-d');  
  
  ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>DMS</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="print.css" type ="text/css" media="print">
  <link rel="stylesheet" href="print.css.map">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300,400,700">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation-flex.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.js"></script>


  <!-- Boots strap-->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  <div class="row expanded">
    <main class="columns">
      <div class="inner-container">
  
      <section class="row">
        <div class="callout large invoice-container">
          <table class="invoice">
            <tr class="header">
            <td class="align-left">
            <h2>Azka Oral Dental Care</h2>

            </td>  
            <td class="align-center">
                <img src="imgs/logo.PNG" alt="Company Name" />
              </td>
              <td class="align-right"  style="text-align: right">
              <h2>مرکز تخصصی دندان ازکا </h2>               
              </td>



            </tr>
            <tr class="header">
              <td class="align-right">
                <h2>RECIPT</h2>
              </td>
            </tr>
<?php echo"
            <tr class='intro'>
              <td class=>
                <span class='num'>Patient ID</span> $id <br>
                Patient Name: $name<br>
                Patient S /Name: $sname

              </td>
              <td class='text-right'>
              Recipt Date: 
              $current_date
              </td>
            </tr>
            ";
            ?>
            <tr class="details">
              <td colspan="2">
                <table>
                  <thead>
                    <tr>
                      <th class="desc">Treatment Description</th>
                      <th class="id">Treatment Name</th>
                      <th class="amt">Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php echo "
                    <tr class='item'>
                      <td class='desc'>$note</td>
                      <td class='id num'>$treatmentName</td>
                      <td class='amt'>$total</td>
                    </tr>
                    ";
                    ?>
                  </tbody>
                </table>
              </td> 
            </tr>
            <tr class="totals">
              <td></td>
              <td>
                <table>
                  
                <?php echo"

                  <tr class='subtotal'>
                    <td class='num'>Total</td>
                    <td class='num'>$total</td>
                  </tr>
                  <tr class='fees'>
                    <td class='num'>Remming</td>
                    <td class='num'>$rem</td>
                  </tr>
                  <tr class='tax'>
                    <td class='num'>Paid</td>
                    <td class='num'>$recevid</td>
                  </tr>
                  <tr class='total'>
                    <td>Total</td>
                    <td>$recevid</td>
                  </tr>
                ";
                  ?>
                </table>
              </td>
            </tr>
          </table>
          
          <section class="additional-info">
          <div class="row">
            <div class="columns">
              <h5>Contact us</h5>
              <p>Whats App <br>
                +93 770 000 0000<br>
                +93 770 000 0000<br>
                Address: Qala fatual xxxxx  x  x xx<br>
                Street: 12 moqabel felani</p>
            </div>
            <div class="columns">
              <h5>Follow us at</h5>
              <p>Facebook.com/Azka<br>
                Instageram/Azka<br>
                </p>
            </div>
          </div>
          </section>
        </div>
      </section>
 <script>
 window.print();
 </script>
      </div>
    </main>
  </div>

</body>
</html>
