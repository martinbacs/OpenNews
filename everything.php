<?php include("shared/config.php");?>

<html lang="en">
<head>
<?php include("shared/head-tag-content.php");?>

<script type="text/javascript">
 function loadArticles(){
     var searchTopic = document.getElementById("topic").value;

     $("#main-content").fadeOut('slow');
     
     $.ajax({
     type: "GET",
     url: 'functions.php',
     data: {function: 'searchByTopic', topic: searchTopic},
     success: function(data){
         $("#main-content").fadeIn('slow');
         document.getElementById("main-content").innerHTML = data;
     }
 });
 }
 </script>

</head>
<body>
<?php include("shared/design-header.php");?>

<form action="javascript:loadArticles()"> 
  <div class="form-group">
    <input type="text" class="form-control" id="topic" aria-describedby="search" placeholder="Search for articles">
    <small id="searchHelp" class="form-text text-muted">Surround phrases with quotes (") for exact match. </small>
  </div>
</form>

<div id="main-content"></div>


<?php include("shared/design-footer.php");?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>
</html>

