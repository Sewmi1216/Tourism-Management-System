<?php

include '../model/entrepreneur.php';

class entrepreneurController extends db_connection
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function userLogin($username, $password)
    {
        $entrepreneuruser = new entrepreneur();
        $res = $entrepreneuruser->validate($username);

        if (mysqli_num_rows($res) > 0) {
           

            $result1 = mysqli_fetch_assoc($res);

            if ($result1['password'] == $password) {
                if ($result1['status'] == 1) {
                    $_SESSION['username'] = $result1['username'];
                    $_SESSION['userID'] = $result1['userID'];

                    header("Location: ../view-entrepreneur/dashboard.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Try again shortly');</script>";

                }
            } else {
                // $_SESSION["error"] = "Password does not match";
                $_SESSION["pwderror"] = "Password does not match";
                $_SESSION["attempts"]+= 1;
               

            }
        }
        

    }
    
public function addentrepreneur($bsinessName, $address, $email,$phone, $fileImg, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc)
{
	$user = new entrepreneur();

	$result = $user->insertentrepreneur($bsinessName, $address, $email,$phone, $fileImg, $password, $eName,$eNic,$ePhone, $eEmail,  $fileDoc);
	if (!$result) {
    echo "<script>alert('Entrepreneur account creation is unsuccessful.');
	window.location.href = '../view-hotel/login.php';
	</script>";

} else {
    echo "<script>alert('Tourist account is created successfully.Wait for the administrator to approve your account');
	window.location.href = '../view-hotel/login.php';
	</script>";

}

}
public function viewProfile($id)
    {
        $profile = new entrepreneur();
        $rs = $profile->viewProfile($id);
        return $rs;

    }

public function updateProfile($id,$businessName, $address, $email,$phone,$username, $password, $eName,$eNic,$ePhone, $eEmail)
{
    $result = new entrepreneur();
    $result> updateProfile ($id,$businessName, $address, $email,$phone,$username, $password, $eName,$eNic,$ePhone, $eEmail);

    if (!$result) {
        echo 'There was a error';
      
    } else {

        echo "<script>
    window.location.href = '../view-entrepreneur/profile.php';
    </script>";

    }

}

public function viewAll($id)
    {
        $entrepreneur= new entrepreneur();

        $results= $entrepreneur->viewAll($id);

        // include "../view/product.php";
        return $results;

    }




public function viewAllentrepreneurs(){
        $user = new entrepreneur();

        $result = $user-> viewAllentrepreneurs();

        $_SESSION['c'] = $result;
        return $result;


}

public function removeentrepreneur($id)
{

    $user = new entrepreneur();

    $result = $user-> removeentrepreneur($id);

    $_SESSION['c'] = $result;
    return $result;
}

public function removeentrepreneurrequest($id)
{

    $user = new entrepreneur();

    $result = $user-> removeentrepreneurrequest($id);

    $_SESSION['c'] = $result;
    return $result;
}

public function acceptentrepreneurrequest($id)
{

    $user = new entrepreneur();

    $result = $user-> acceptentrepreneurrequest($id);

    // $_SESSION['c'] = $result;
    // return $result;

    foreach ($results as $result) {
        $hemail = $result['email'];
        require "../libs/PHPMailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        // h-hotel account
        $mail->Username = 'sewmi.rotaract3220@gmail.com';
        $mail->Password = 'uaqgejykofzquoaf';

        // send by h-hotel email
        $mail->setFrom('sewmi.rotaract3220@gmail.com', 'Approve account');
        // get email from input
        $mail->addAddress($hemail);

        // HTML body
        $mail->isHTML(true);
        $mail->Subject = "Congratulations! Your Pack2Paradise Entrepreneur Account Has Been Approved";
        $mail->Body = "<b>Dear User</b>
                <h3>I am writing to inform you that your seller account on Pack2Paradise has been approved by our system administrator. Congratulations on becoming a member of our community of successful entrepreneurs!

                You are now authorized to sell your products on our platform and start building your brand. We are excited to have you on board and we wish you the best of luck in your entrepreneurial journey.
                
                As a seller on Pack2Paradise, you will have access to a wide range of tools and resources that will help you to manage your business effectively. Our team of experts is always available to assist you with any questions or concerns that you may have.
                
                We are confident that your products will be a great addition to our platform, and we are looking forward to seeing your success on Pack2Paradise. Thank you for choosing us as your business partner.</h3>";

        if (!$mail->send()) {?>
            <script>alert("<?php echo "Error sending email to " . $hemail ?>");
        </script>
<?php
} else {
            ?>
<script>
alert("<?php echo "Email sent to " . $hemail ?>");
</script>
<?php
}}
}

public function viewdeletedentrepreneurs(){
    $user = new entrepreneur();

    $result = $user-> viewdeletedentrepreneurs();

    $_SESSION['c'] = $result;
    return $result;
}

public function viewoneentrepreneur($id){

    $user = new entrepreneur();

    $result = $user-> viewoneentrepreneur($id);

    $_SESSION['c'] = $result;
    return $result;
}

public function viewAllpendingentrepreneurs(){
    $user = new entrepreneur();

    $result = $user-> viewpendingentrepreneurs();

    $_SESSION['c'] = $result;
    return $result;
}
}

?>

