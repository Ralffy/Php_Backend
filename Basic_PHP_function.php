$conn = mysqli_connect("localhost", "username", "password", "databasename");
if(!$conn)}die("Connection failed: ".mysqli_connect_error());}

$query = "SELECT * FROM tbl_accounts WHERE email='$email'";

$query= "Insert into tbl_logs (name, activity, type, date) values ('$name', '$history', 'Customer', '$dates')";

$query = "UPDATE tbl_othertext set description = '$headretext' where id = 1";

$query = "DELETE FROM tbl_product where id = '$proddel'";

$result = mysqli_query($conn, $query);
$conn->query($query);
