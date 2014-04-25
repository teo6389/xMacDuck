<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Checkout Form</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <script type="text/javascript" language="javascript">
  function createRequest() {
    
  try {
    request = new XMLHttpRequest();
  } 
  catch (tryMS) {
    try {
      request = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (otherMS) {
      try {
        request = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (failed) {
        request = null;
      }
    }
  }
  
  return request; 

}

function checkUsername() {

  //get a request object and send it to the server
  request =  createRequest();
  
  if (request == null) {
    alert("Unable to create request");
  }
  else {
    var sku = document.getElementById("sku").value;
    var url = "get.php?sku=" + sku;
    request.onreadystatechange = showUsernameStatus;      
    request.open("GET", url, true);
    request.send(null)
  } 
    
}
//response handling
function showUsernameStatus() { 
  if (request.readyState == 4) { 
    if (request.status == 200) {
      if (request.responseText == "undefined") {
        alert('no results found')
      }
      //if (request.responseText == "okay") {
        //document.getElementById("email").className = "approved";
        //document.getElementsByName("terms-agreement")[0].disabled = false;
      //}
      else {  
        obj = JSON.parse(request.responseText);
        document.getElementById("name").value=obj.name;
        document.getElementById("link").value=obj.link;
        document.getElementById("imglink").value=obj.imglink;
        document.getElementById("catid").value=obj.catid;
        document.getElementById("instock").value=obj.instock;
        document.getElementById("manufacturer").value=obj.manufacturer;
        document.getElementById("shipping").value=obj.shipping;
        document.getElementById("description").value=obj.description;

        document.getElementById("name").disabled=true;
        document.getElementById("link").disabled=true;
        document.getElementById("imglink").disabled=true;

        document.getElementById("name").style.backgroundColor = 'grey';
        document.getElementById("link").style.backgroundColor = 'grey';
        document.getElementById("imglink").style.backgroundColor = 'grey';
      }
    }
  }
}
</script>
</head>
<body>
  <input type="button" value="ΔΙΑΓΡΑΦΗ" class="checkout-btn">
  <div style="height:20px; margin-top:10px;">
      <div class="inftag">SKU</div>
      <div class="inftag">ΟΝΟΜΑ</div>
      <div class="inftag">ΠΕΡΙΓΡΑΦΗ</div>
      <div class="inftag">LINK</div>
      <div class="inftag">IMAGE</div>
      <div class="inftag">CAT ID</div>
      <div class="inftag" style="width:90px;">IN STOCK</div>
      <div class="inftag">ΔΙΑΘΕΣΙΜΟΤΗΤΑ</div>
      <div class="inftag">MANUFACTURER</div>
      <div class="inftag">SHIPPING</div>
    </div>
  <form class="checkout" style="margin-bottom:30px;">
    <p>
    <div class="prod">
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-name" name="sku" onblur="checkUsername();" id="sku" placeholder="SKU" autofocus>
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-exp" name="name" id="name"  placeholder="ΟΝΟΜΑ">
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-exp" id="description" name="description" placeholder="ΠΕΡΙΓΡΑΦΗ">
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-exp" name="link" id="link" placeholder="LINK">
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-exp" name="imglink" id="imglink" placeholder="IMAGE LINK">
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-card" name="catid" id="catid" placeholder="CATID">
      </div>
      <div class="infdivb">
        <input type="text" class="checkout-input checkout-instock" name="instock" id="instock" placeholder="INSTOCK">
      </div>
      <div class="infdiv">
        <select class="checkout-input checkout-card" name="availability">
          <option value="0">ΕΠΙΛΕΞΤΕ ΔΙΑΘΕΣΙΜΟΤΗΤΑ</option>
          <option value="Σε απόθεμα">Σε απόθεμα</option>
          <option value="1 έως 3 ημέρες">1 έως 3 ημέρες</option>
          <option value="4 έως 7 ημέρες">4 έως 7 ημέρες</option>
          <option value="7+ ημέρες">7+ ημέρες</option>
          <option value="Κατόπιν Παραγγελίας">Κατόπιν Παραγγελίας</option>
          <option value="Προ-παραγγελία">Προ-παραγγελία</option>
        </select>
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-cvc" name="manufacturer" id="manufacturer" placeholder="MANUFACTURER">
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-card" name="shipping" id="shipping" placeholder="SHIPPING">
      </div>
    </p>
    <p>
      <input type="submit" value="ΚΑΤΑΧΩΡΗΣΗ" class="checkout-btn">
    </p>
    </div>
  </form>
  <?php
    include "functions.php";
    $con = connect();
    $result = mysqli_query($con,"SELECT * FROM bridge");
    while($row = mysqli_fetch_array($result)) {
       echo '<form class="checkout">
    <p>
    <div class="prodall">
      <div class="infdiv2">
        <input type="checkbox" class="checkout-input checkout-name2" name="check1" >
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-name" name="sku" onblur="checkUsername();" id="sku" placeholder="SKU" autofocus>
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-exp" name="name" id="name"  placeholder="ΟΝΟΜΑ">
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-exp" id="description" name="description" placeholder="ΠΕΡΙΓΡΑΦΗ">
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-exp" name="link" id="link" placeholder="LINK">
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-exp" name="imglink" id="imglink" placeholder="IMAGE LINK">
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-card" name="catid" id="catid" placeholder="CATID">
      </div>
      <div class="infdivb">
        <input type="text" class="checkout-input checkout-instock" name="instock" id="instock" placeholder="INSTOCK">
      </div>
      <div class="infdiv">
        <select class="checkout-input checkout-card" name="availability">
          <option value="0">ΕΠΙΛΕΞΤΕ ΔΙΑΘΕΣΙΜΟΤΗΤΑ</option>
          <option value="Σε απόθεμα">Σε απόθεμα</option>
          <option value="1 έως 3 ημέρες">1 έως 3 ημέρες</option>
          <option value="4 έως 7 ημέρες">4 έως 7 ημέρες</option>
          <option value="7+ ημέρες">7+ ημέρες</option>
          <option value="Κατόπιν Παραγγελίας">Κατόπιν Παραγγελίας</option>
          <option value="Προ-παραγγελία">Προ-παραγγελία</option>
        </select>
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-cvc" name="manufacturer" id="manufacturer" placeholder="MANUFACTURER">
      </div>
      <div class="infdiv">
        <input type="text" class="checkout-input checkout-card" name="shipping" id="shipping" placeholder="SHIPPING">
      </div>
    </p>
    <p>
      <input type="submit" value="ΕΝΗΜΕΡΩΣΗ" class="checkout-btn-up">
    </p>
    </div>
  </form>';
    }
    ?>
</body>
</html>
