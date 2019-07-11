$query = "SELECT * FROM tbl_cart where customer_ID = '$Ses' and status = 'Pending'";
$result = mysqli_query($conn, $query);
$i=0;
while($row = $result->fetch_array()){
$produko[]=$row['product_name'];
$produquan[]=$row['quantity'];
$produprice[]=$row['price'];
$all = 'Product:'.' '.$produko[$i].', '.'Quantity:'.' '.$produquan[$i].', '.'Total Price:'.' '.$produprice[$i].'<br>';
$handle=fopen($txt,'a') or die('Could not create');
fwrite($handle, PHP_EOL. $all);
fclose($handle);
$i++;
