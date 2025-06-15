<?php 

include("../config.php");
$action=$_POST["action"];

if ($action == "topupkpay") {
    $kpayname = $_POST["kpayname"];
    $kpayno = $_POST["kpayno"];
    $amount = $_POST["amount"];
    $transactionno = $_POST["transactionno"];
    $playerid = $_SESSION["esportclient_userid"];
    $dt = date("Y-m-d H:i:s");
    $paytype = "Kpay";

    mysqli_query($con, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    mysqli_begin_transaction($con);

    try {
        $sql = "INSERT INTO tblbalancein (PlayerID,Amount,TransitionCode,PayType,DateTime,KpayName,KpayNo) 
        VALUES (?,?,?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("idsssss", $playerid, $amount, $transactionno, $paytype, $dt, $kpayname, $kpayno);

        if ($stmt->execute()) {
            mysqli_commit($con);
            echo 1;
        }
        else {
            // if not enough balance
            mysqli_rollback($con);
            echo 0;
        }
    } 
    catch (Exception $e) {
        mysqli_rollback($con);
        echo "Error: " . $e->getMessage();
    }
}

if ($action == "topupwave") {
    $wavename = $_POST["wavename"];
    $waveno = $_POST["waveno"];
    $amount = $_POST["amount"];
    $transactionno = $_POST["transactionno"];
    $playerid = $_SESSION["esportclient_userid"];
    $dt = date("Y-m-d H:i:s");
    $paytype = "WavePay";

    mysqli_query($con, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    mysqli_begin_transaction($con);

    try {
        $sql = "INSERT INTO tblbalancein (PlayerID,Amount,TransitionCode,PayType,DateTime,KpayName,KpayNo) 
        VALUES (?,?,?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("idsssss", $playerid, $amount, $transactionno, $paytype, $dt, $wavename, $waveno);

        if ($stmt->execute()) {
            mysqli_commit($con);
            echo 1;
        }
        else {
            // if not enough balance
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