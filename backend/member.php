<?php

class Member
{
 private $db;

    function __construct()
    {
        $this->db = new mysqli('localhost', 'glazpmck_ics325_web', 'ICS325.01-2020', 'glazpmck_ics325' );
    }

    public function processLogin($username, $password) {
        $passwordHash = md5($password);
        $query = "SELECT * FROM users WHERE Email = '$username' AND Psword = '$passwordHash'";
        $result = $this->db->query($query);
        //$result->bind_param("ss", $username, $passwordHash);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        
        if($result->num_rows){
            $_SESSION['userID'] = $row['User_ID'];
            $_SESSION['user'] = $row['FName'];
            $_SESSION['MemberName'] = $row['FName']." ".$row['LName'];
            $_SESSION['MemberSince'] = $row['AccountCreated'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['DOB'] = $row['DOB'];
            $_SESSION['Country'] = $row['Origin'];
            return true;
        }
        $this->db->close();
    }

    public function createUser($fname, $lname, $email, $pw, $dob, $coo){

        $passwordHash = md5($pw);
        $query = "INSERT INTO users (Email, FName,LName,Psword,DOB,Origin) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssss", $email,$fname,$lname,$passwordHash,$dob,$coo);
        $stmt->execute();
        
        if($stmt->affected_rows > 0){
            $this->processLogin($email,$pw);
            $_SESSION['LoggedIn'] = true;
            return true;
        }
        $this->db->close();
    }

    public function updateUser($key, $value){
        $query = "UPDATE users SET $key = ? WHERE User_ID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $value, $_SESSION['userID']);
        $stmt->execute();
        if ($stmt->affected_rows > 0){
            return 1;
        }else {return 0;}
        $this->db->close();
    }

    public function PwResetReq($email){
        $selector = bin2hex(random_bytes(8));
	    $token = random_bytes(32);

        $expires = date("U") + 1800;

        $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
	    $stmt = $this->db->prepare($sql);
            if (!$this->db) {
                $_SESSION['errorMessage'] = "Our hamster fell off the wheel, please try again.";
                exit();
            } else {
                $stmt->bind_param("s", $email);
                $stmt->execute();
            }
        
        $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = $this->db->prepare($sql);
        if (!$this->db) {
            $_SESSION['errorMessage'] = "Our hamster fell off the wheel, please try again.";
            exit();
        } else {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            $stmt->bind_param("ssss", $email, $selector, $hashedToken, $expires);
            $stmt->execute();
        }
        $this->db->close();
        $email_reset = $this->SendResetMail($email, $selector, $token);
        if ($email_reset){
            return true;
        }
    }

    public function SendResetMail($email, $selector, $token){
        
        $to = $email;
        $url = $_SERVER['SERVER_NAME']."/login.php?selector=" . $selector . "&validator=" . bin2hex($token);
		$subject = 'Wanderlust Outpost Password Reset Request';
		
		$message  = '<p> We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email.</p>';
		$message .= '<p> Here is your password reset link: </br>';
		$message .= '<a href="' . $url . '">' . $url . '</a></p>';
		
		$headers = "From: Wanderlust Outpost <no-reply@ics325.glazedproductions.com>\r\n";
		$headers .= "Reply-To: wonderlust email address\r\n";
		$headers .= "Content-type: text/html\r\n";
		
        mail($to, $subject, $message, $headers);
        return true;
    }

    public function ResetPassword($selector, $validator, $password, $passwordRepeat){

	    $currentDate = date("U");
		
        $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector = ? AND pwdResetExpires >= ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            echo "There was an error!";
            exit();
        } 
    	else {
	    	$stmt->bind_param("ss", $selector, $currentDate);
		    $stmt->execute();
		
		    $row = $stmt->fetch_array(MYSQLI_ASSOC);
		    if (!$stmt->fetch_array(MYSQLI_ASSOC)) {
			    echo "You need to re-submit your reset request.";
			    exit();
		    }
            else {
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_varify($tokenBin, $row["pwdResetToken"]);
                
                if($tokenCheck === false) {
                    echo "You need to re-submit your reset request.";
                    exit();
                }
                elseif ($tokenCheck === true) {
                    
                    $tokenEmail = $row['pwdResetEmail'];
                    
                    $sql = "SELECT * FROM users WHERE Email = ?;";
                    $stmt =  $this->db->prepare($sql);
                    
                    if (!$stmt) {
                        echo "There was an error!";
                        exit();
                    } 
                    
                    else {
                        $stmt->bind_params("s", $tokenEmail);
                        $stmt->execute();
                        $results = $stmt->fetch_array(MYSQLI_ASSOC);
                        
                        if (!$row = $stmt->fetch_array(MYSQLI_ASSOC)) {
                            echo "There was an error!";
                            exit();
                        }
                        
                        else {
                            $sql = "UPDATE users SET Psword=? Where Email=?";
                            $stmt = $this->db->prepare($sql);
                            if (!$stmt) {
                                echo "There was an error!";
                                exit();
                            }
                            
                            else {
                                $newPwdHash = md5($password);
                                $stmt->bind_params("ss", $newPwdHash, $tokenEmail);
                                $stmt->execute();
                                
                                $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
                                $stmt = $this->db->prepare($sql);
                                
                                if (!$stmt) {
                                    echo "There was an error!";
                                    exit();
                                }
                                
                                else {
                                    $stmt->bind_params("s", $tokenEmail);
                                    $stmt->execute();
                                    return true;
                                }
                            }
                        }
                    }
                }
		    }
	    } 	
    } 
}
?>