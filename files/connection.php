<html>
<head>
  <title>results</title>
  <h1>The Top Names</h1>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<?php
$con = mysqli_connect("localhost","ashishsingh","1234","save");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
//echo "connnected to mysQl";
}
if($gender=='male' || $gender=='female')
{
$sql = "SELECT name,gender,position FROM `a_temp` where position<=$top and year=$year and gender=\"$gender\"";
}
else
{
$sql = "SELECT name,gender,position FROM `a_temp` where position<=$top and year=$year and (gender=\"male\" or gender=\"female\")";

}
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
?>
  <table border="1" style="width:70%">
      <tr>
         <th>Name</th>
         <th>Gender</th>
         <th>Position</h>
      </tr>
      <?php
    while($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
         <td><center><?php echo $row['name'];?></center></td>
         <td><center><?php echo $row['gender']; ?></center></td>
         <td><center><?php echo $row['position']; ?></center></td>
      </tr>
    <?php
    }
}
 else {
    echo "No Results Found";
}

mysqli_close($con);
?>
</table>
</center>
</body>
</html>