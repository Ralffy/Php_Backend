function GetImageExtension($imagetype)
   {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }

if (!empty($_FILES["uploadedimage"]["name"])) {
    $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
    $imgtype=$_FILES["uploadedimage"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=date("d-m-Y")."-".time().$ext;
    $target_path = "images/".$imagename;
    $target_pathfolder = "../images/".$imagename;
if(move_uploaded_file($temp_name, $target_pathfolder)) {
    $query_upload="UPDATE tbl_product SET image='$target_path' WHERE id='$ID'";
     $conn->query($query_upload) or die(mysqli_error());
        
     echo "<script>swal('Success!', 'Image Successfully Updated!', 'success');</script>";
         echo'<script>setTimeout(function(){window.top.location=""} , 1000);</script> ';
}else{
   echo "<script>('Error!');</script>";

}
}
mysqli_close();
