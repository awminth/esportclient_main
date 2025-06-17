<?php 

include("../config.php");
$action=$_POST["action"];

if($action == "changepwd"){
    $userid = $_SESSION["esportclient_userid"];
    $newpwd = $_POST["newpwd"];
    $retypepwd = $_POST["retypenewpwd"];

    mysqli_query($con, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    mysqli_begin_transaction($con);

    try {
        if($newpwd == $retypepwd){
            $sql = "UPDATE tblplayer SET Password=? WHERE AID = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("si", $retypepwd, $userid);
    
            if ($stmt->execute()) {
                save_log("Username ".$_SESSION['esportclient_username']." သည်Account Passwordအား ".$retypepwd." သို့ပြောင်းသွားသည်။");
                mysqli_commit($con);
                echo 1;
            }
            else {
                // if not enough balance
                mysqli_rollback($con);
                echo 2;
            }
        }
        else{
            mysqli_rollback($con);
            echo 0;
        }  
    } 
    catch (Exception $e) {
        mysqli_rollback($con);
        echo "Error: " . $e->getMessage();
    }
}
?>