<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
//Belangrijk: Als je de database op ma-cloud wilt importeren, dan moet je de charset naar "utf8"(Geen spatie of streepje) veranderen. Klik op het sql bestand en
//verander het met een text editor. Het zou kunnen dat ma-cloud die charset niet herkent.
$q = strval($_GET['q']);

$con = mysqli_connect('localhost','tricha','db123','25163_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"w3c_ajax_demo"); //Edit: "ajax_demo" naar "w3c_ajax_demo".
$sql="SELECT * FROM w3c_ajax_demo WHERE id = '".intval($_GET['q'])."' OR FirstName LIKE '$q%' OR LastName LIKE '$q%'"; //Edit: "user" naar "w3c_ajax_demo".

 
$result = mysqli_query($con, $sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['Hometown'] . "</td>";
    echo "<td>" . $row['Job'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>