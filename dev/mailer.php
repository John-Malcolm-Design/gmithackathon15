<?PHP
  // form handler
  if($_POST && isset($_POST['inputName'],$_POST['inputEmail'], $_POST['inputMssage'])) {

  	$nname = $_POST['inputName'];
    $email = $_POST['inputEmail'];
    $subject = "GMIT Hackathon Enquiry";
    $message = $_POST['inputMssage'];

      $to = "john@gmithackathon.xyz";
      $headers = "From: ronan@gmithackathon.xyz" . "\r\n";
      mail($to, $subject, $message, $headers);
      header("Location: http://www.gmithackathon.xyz/");
      exit;
    }

  }
?>