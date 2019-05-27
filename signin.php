<?php


    $email = $_POST['cust_email'];
    $password = $_POST['cust_pass'];


    $query = ("SELECT * FROM tbl_accounts WHERE
              email = '$email' AND password = '$password'");
    $result=$conn->query($query);
    $row=$result->fetch_assoc();
    $fllname=$row['fullname'];

    #If Customer Account is Active
    if ($email=$row['email'] and $password=$row['password'] and
        $row['type']=='Customer' and $row['status']=="Active")
    {
      #Logs will be inserted
      $_SESSION['id']=$row['id'];
          $name=$row['fullname'];
          $history="Logged In";
          date_default_timezone_set('Asia/Manila');
          $date=date("M-d-Y l");
          $time=date("H:i a");
          $dates=$date.' '.$time;
      $his=("Insert into tbl_logs (name, activity, type, date)
            values ('$name', '$history', 'Customer', '$dates')");
      $conn->query($his);
      echo "<script>swal('Welcome, $fllname!',
                        'Customer', 'success');</script>";
      echo '<script>setTimeout(function()
            {window.top.location="Customer/product.php"} , 1000);</script>';
    }
    #If Customer Account Is Inactive
    else if ($email=$row['email'] and $password=$row['password'] and
              $row['type']=='Customer' and $row['status']=="Inactive")
    {
      echo "<script>swal('Your account is Inactive',
                          'Contact the Admin', 'error');</script>";
    }
    #If Subadmin Account Is Inactive
    else if ($email=$row['email'] and $password=$row['password'] and
                $row['type']=='Subadmin' and $row['status']=="Inactive")
    {
      echo "<script>swal('Your account is Inactive',
                          'Contact the Admin', 'error');</script>";
    }
    #If Subadmin Account is Active
    else if ($email=$row['email'] and $password=$row['password'] and
              $row['type']=='Subadmin')
     {
      #Logs will be inserted
      $_SESSION['id']=$row['id'];
          $name=$row['fullname'];
          $history="Logged In";
          date_default_timezone_set('Asia/Manila');
          $date=date("M-d-Y l");
          $time=date("H:i a");
          $dates=$date.' '.$time;
      $his=("Insert into tbl_logs (name, activity, type, date)
              values ('$name', '$history', 'Subadmin', '$dates')");
      $conn->query($his);
      echo "<script>swal('Welcome, $fllname!',
                          'Subadmin', 'success');</script>";
      echo '<script>setTimeout(function()
              {window.top.location="Subadmin/index.php"} , 1000);</script>';
     }

    #Email Verification
    else if ($email=$row['email'] and $password=$row['password'] and $row['type']=='Admin')
    {
      $_SESSION['id']=$row['id'];
          $name=$row['fullname'];
          $history="Logged In";
          date_default_timezone_set('Asia/Manila');
          $date=date("M-d-Y l");
          $time=date("H:i a");
          $dates=$date.' '.$time;
      $his=("Insert into tbl_logs (name, activity, type, date)
              values ('$name', '$history', 'Admin', '$dates')");
      $conn->query($his);
      echo "<script>swal('Welcome, $fllname!', 'Admin', 'success');</script>";
      echo '<script>setTimeout(function()
                    {window.top.location="Admin/index.php"} , 1000);</script>';
    }
    #If Account not Match
    else if ($email != $row['email'] and $password != $row['password'] and
              $row['type'] !='Admin' and $row['type'] !='Subadmin' and
              $row['type']!='Customer' and $row['status'] !="Inactive" and
              $row['status'] !="Active" )
    {
      echo '<script>swal("Email and Password Doesnt Match");</script>';
    }
    else
    {
         echo '<script>swal("","Email and Password Doesnt Match","error");</script>';
    }

?>
