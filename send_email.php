    $to="example@gmail.com"; #Recipient
    $subject = "Subject";

      $message = "";

      $headers = "From: Sender\r\n";
      $headers = "CC: $email_cust; \r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=utf-8\r\n";

        $retval = mail($to, $subject, $message, $headers);

        if ($retval == true){
          echo "<script>swal('Your Order has been Sent!',
                              'Wait for the call verification',
                              'success');</script>";
          echo '<script>setTimeout(function(){window.top.location="myorders.php"}
                                    , 1000);</script>';
            }
          }
