<?php include("shared/config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("shared/head-tag-content.php");?>

<script>
 function loadTopNews(){
     var selectedCountry = document.getElementById("selectedCountry").value;
     var selectedCategory = document.getElementById("selectedCategory").value;

     $("#main-content").fadeOut('slow');
     
     $.ajax({
     type: "GET",
     url: 'functions.php',
     data: {function: 'getTopNews', country: selectedCountry, category: selectedCategory},
     success: function(data){
         $("#main-content").fadeIn('slow');
         document.getElementById("main-content").innerHTML = data;
     }
 });
 }
 </script>
</head>
<body onload="loadTopNews();">
<?php include("shared/design-header.php");?>
<br />
<div class="text-center">
<select class="" id="selectedCountry">
      <option selected value="us">USA</option>
      <option value="se">Sweden</option>
      <option value="no">Norway</option>
      <option value="gb">Great Britain</option>
      <option value="au">Australia</option>
  </select>
  <select id="selectedCategory">
      <option selected value="general">General</option>
      <option value="technology">Technology</option>
      <option value="science">Science</option>
      <option value="entertainment">Entertainment</option>
      <option value="health">Health</option>
      <option value="sports">Sports</option>

  </select>
  <button type="button" class="btn btn-outline-primary btn-sm" onclick="loadTopNews()">Load</button>
</div>

<div id="main-content"></div>

<?php include("shared/design-footer.php");?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>
</html>



