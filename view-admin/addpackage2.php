<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/hnav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/package.css?v=<?php echo time(); ?>">
    <link href="../libs/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../libs/fontawesome/css/solid.css" rel="stylesheet">

    <style>
        * {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

.text{
  font-style: "helvetica neue", helvetica, tahoma, sans-serif;
    color: rgb(255, 255, 255);
    font-weight: bold;
    font-size: 15px;
    margin-top: 25px;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
    </style>
</head>

<body>
    <?php include "nav.php"?>

    <section class="home-section">
        <?php include "dashboardHeader.php"?>

        <div class="text">ADD TOUR PACKAGES</div>

        <div class="registerForm">
        <form action="../api/addtourpackage.php" method="POST">
        
        <div class="container">
  <form action="/action_page.php">
    <div class="row">
      <div class="col-25">
        <label for="fname"> Package Name </label>
      </div>
      <div class="col-75">
      <input type="text" placeholder="Enter Package Name" name="pckgname" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Package Price</label>
      </div>
      <div class="col-75">
      <input type="text" placeholder="Package Price" name="pckgprice" required> 
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Maximum Participants </label>
      </div>
      <div class="col-75">
      <input type="text" placeholder="Maximum number of participants" name="max_part" required> 
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="participants">No of Days</label>
      </div>
      <div class="col-75">
        <select id="days" name="days" onchange="showInputTables()">
          <option value="1"> 1 </option>
          <option value="2">2 </option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
      <table id="input-table" style="display:none;">
          <tr>
              <td><label for="input1">Input 1:</label></td>
              <td><input type="text" id="input1" name="input1"></td>
           </tr>
            <tr>
              <td><label for="input2">Input 2:</label></td>
              <td><input type="text" id="input2" name="input2"></td>
           </tr>
  <!-- Add more input fields as needed -->
</table>

      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="subject"> Tour package description </label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="pckgdesc" placeholder="Describe the Tour package (E.g : No of Days, Travel Destinations)" style="height:200px"></textarea>
      </div>
    </div>

    

    <div class="row">
      <input type="submit" class="btn1" value="Submit" name="save">
    </div>
  </form>
</di
       
       

    </section>
    <script>
        function showInputTables() 
        {
        var numTables = document.getElementById("days").value;
                for (var i = 0; i < numTables; i++) 
                {
                     var table = document.getElementById("input-table").cloneNode(true);
                     table.style.display = "table";
                      document.body.appendChild(table);
                }
        }
</script>
</body>

</html>