<?php 

include("../config.php");
$action=$_POST["action"];

//topup history
if($action == "loadpagetopup"){
    $userid = $_SESSION["esportclient_userid"];
    $entryvalue = $_POST["entryvalue"];
    $todaydt = date("Y-m-d");
    $a = "";
    if($entryvalue == 2){
        $todaydt = date("Y-m-d", strtotime("-7 days"));
        $a .= " and Date(DateTime) >= '$todaydt'";
    }
    else if($entryvalue == 3){
        $todaydt = date("Y-m-d", strtotime("-1 month"));
        $a .= " and Date(DateTime) >= '$todaydt'";
    }
    else if($entryvalue == 4){
        $a .= " ";
    }
    else {
        $a .= " and Date(DateTime) = '$todaydt'";
    }
    $out = "";
    $no = 0;
    // Set transaction isolation level and start transaction
    mysqli_query($con, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    mysqli_begin_transaction($con);

    try{
        //Usernameရှိမရှိစစ်
        $sql="SELECT * FROM tblbalancein WHERE PlayerID= ? AND WinLossStatus= 'deposit' 
        ".$a." order by AID desc";
        
        $stmt = $con -> prepare($sql);
        $stmt -> bind_param("i",$userid);
        $stmt -> execute();
        $res = $stmt -> get_result();

        if($res -> num_rows > 0){
            while($data = $res -> fetch_assoc()){
                $no += 1;
                $btn = "btn-outline-warning";
                $icon = '<i class="ci-rocket text-warning"></i>';
                $url = roothtml."lib/images/kpay.png";
                $txt = "<span class='text-warning'>*** Your Topup is in pending state.<span>";
                if($data["PayType"] == "WavePay"){
                    $url = roothtml."lib/images/wave.png";
                }
                if($data["PrepaidStatus"] == "success"){
                    $btn = "btn-outline-success";
                    $icon = '<i class="ci-check text-success"></i>';
                    $txt = "<span class='text-success'>*** Topup Success<span>";
                }
                if($data["PrepaidStatus"] == "fail"){
                    $btn = "btn-outline-danger";
                    $icon = '<i class="ci-close text-danger"></i>';
                    $txt = "<span class='text-danger'>*** Topup Fail. Check Your information.<span>";
                }
                $out .= '
                <div class="mb-2">
                    <a href="#topupcollapse'.$no.'" class="btn '.$btn.' form-control 
                    d-flex justify-content-between" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        <span >Topup : '.number_format($data["Amount"]).' MMK</span>
                        <span>'.$icon.'</span>
                    </a>

                    <div class="collapse" id="topupcollapse'.$no.'">
                        <div class="card product-card product-list">';
                        if($data["PrepaidStatus"] == "prepaid"){
                    $out.='
                            <button class="btn-wishlist btn-sm" type="button" title="Edit" id="edittopup" 
                                data-amount = "'.$data["Amount"].'" 
                                data-transitioncode = "'.$data["TransitionCode"].'" 
                                data-aid = "'.$data["AID"].'" >
                                <i class="ci-edit"></i>
                            </button>';
                        }
                    $out.='
                            <div class="d-sm-flex align-items-center p-2">
                                <img src="'.$url.'" style="width:30px;height:30px">
                                <div class="card-body">
                                    <span>KpayName : '.$data["KpayName"].'</span><br>
                                    <span>KpayNo : '.$data["KpayNo"].'</span><br>
                                    <span>TransitionCode : '.$data["TransitionCode"].'</span><br>
                                    <span>Date : '.$data["DateTime"].'</span><br>
                                    '.$txt.'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';  
            }
                             
            echo $out;
        }
        else{
            // Rollback if bet doesn't exist
            mysqli_rollback($con);
            echo json_encode(
                array(
                    "Balance"=>0,
                    "ErrorCode"=>1,
                    "ErrorMessage"=>"Member not exist"
                ));
        }
        
    }
    catch(mysqli_sql_exception $e){
        mysqli_rollback($con);
        error_log("Database error in GetBalance: " . $e->getMessage());
        echo json_encode(
            array(
                "Balance"=>0,
                "ErrorCode"=>7,
                "ErrorMessage"=>"Internal Error"
            ));
    }
    catch(Exception $e){
        mysqli_rollback($con);
        error_log("System error in GetBalance: " . $e->getMessage());
        echo json_encode(
            array(
                "Balance"=>0,
                "ErrorCode"=>7,
                "ErrorMessage"=>"System Error"
            ));
    }
}

if($action == "edittopup"){
    $aid = $_POST["editaid"];
    $amount = $_POST["editamount"];
    $transitioncode = $_POST["editcode"];

    mysqli_query($con, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    mysqli_begin_transaction($con);

    try {
        $sql = "UPDATE tblbalancein SET Amount=?,TransitionCode=? WHERE AID = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("dsi", $amount, $transitioncode, $aid);
        if ($stmt->execute()) {
            save_log("Username ".$_SESSION['esportclient_username']." သည် Topup Amountအားပြင်သွားသည်။");
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

//withdraw history
if($action == "loadpagewithdraw"){
    $userid = $_SESSION["esportclient_userid"];
    $entryvalue = $_POST["entryvalue"];
    $todaydt = date("Y-m-d");
    $a = "";
    if($entryvalue == 2){
        $todaydt = date("Y-m-d", strtotime("-7 days"));
        $a .= " and Date(DateTime) >= '$todaydt'";
    }
    else if($entryvalue == 3){
        $todaydt = date("Y-m-d", strtotime("-1 month"));
        $a .= " and Date(DateTime) >= '$todaydt'";
    }
    else if($entryvalue == 4){
        $a .= " ";
    }
    else {
        $a .= " and Date(DateTime) = '$todaydt'";
    }
    $out = "";
    $no = 0;
    // Set transaction isolation level and start transaction
    mysqli_query($con, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    mysqli_begin_transaction($con);

    try{
        //Usernameရှိမရှိစစ်
        $sql="SELECT * FROM tblbalanceout WHERE PlayerID= ? AND WinLossStatus= 'withdraw' 
        ".$a." order by AID desc";
        
        $stmt = $con -> prepare($sql);
        $stmt -> bind_param("i",$userid);
        $stmt -> execute();
        $res = $stmt -> get_result();

        if($res -> num_rows > 0){
            while($data = $res -> fetch_assoc()){
                $no += 1;
                $btn = "btn-outline-warning";
                $icon = '<i class="ci-rocket text-warning"></i>';
                $url = roothtml."lib/images/kpay.png";
                $txt = "<span class='text-warning'>*** Your Withdraw is in pending state.<span>";
                if($data["PayType"] == "WavePay"){
                    $url = roothtml."lib/images/wave.png";
                }
                if($data["PrepaidStatus"] == "success"){
                    $btn = "btn-outline-success";
                    $icon = '<i class="ci-check text-success"></i>';
                    $txt = "<span class='text-success'>*** Withdraw Success<span>";
                }
                if($data["PrepaidStatus"] == "fail"){
                    $btn = "btn-outline-danger";
                    $icon = '<i class="ci-close text-danger"></i>';
                    $txt = "<span class='text-danger'>*** Withdraw Fail. Check Your information.<span>";
                }
                $out .= '
                <div class="mb-2">
                    <a href="#withdrawcollapse'.$no.'" class="btn '.$btn.' form-control 
                    d-flex justify-content-between" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        <span >Withdraw : '.number_format($data["Amount"]).' MMK</span>
                        <span>'.$icon.'</span>
                    </a>

                    <div class="collapse" id="withdrawcollapse'.$no.'">
                        <div class="card product-card product-list">';
                        if($data["PrepaidStatus"] == "prepaid"){
                    $out.='
                            <button class="btn-wishlist btn-sm" type="button" title="Edit" id="edittopup" 
                                data-amount = "'.$data["Amount"].'" 
                                data-transitioncode = "'.$data["TransitionCode"].'" 
                                data-aid = "'.$data["AID"].'" >
                                <i class="ci-edit"></i>
                            </button>';
                        }
                    $out.='
                            <div class="d-sm-flex align-items-center p-2">
                                <img src="'.$url.'" style="width:30px;height:30px">
                                <div class="card-body">
                                    <span>KpayName : '.$data["KpayName"].'</span><br>
                                    <span>KpayNo : '.$data["KpayNo"].'</span><br>
                                    <span>TransitionCode : '.$data["TransitionCode"].'</span><br>
                                    <span>Date : '.$data["DateTime"].'</span><br>
                                    '.$txt.'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';  
            }
                             
            echo $out;
        }
        else{
            // Rollback if bet doesn't exist
            mysqli_rollback($con);
            echo json_encode(
                array(
                    "Balance"=>0,
                    "ErrorCode"=>1,
                    "ErrorMessage"=>"Member not exist"
                ));
        }
        
    }
    catch(mysqli_sql_exception $e){
        mysqli_rollback($con);
        error_log("Database error in GetBalance: " . $e->getMessage());
        echo json_encode(
            array(
                "Balance"=>0,
                "ErrorCode"=>7,
                "ErrorMessage"=>"Internal Error"
            ));
    }
    catch(Exception $e){
        mysqli_rollback($con);
        error_log("System error in GetBalance: " . $e->getMessage());
        echo json_encode(
            array(
                "Balance"=>0,
                "ErrorCode"=>7,
                "ErrorMessage"=>"System Error"
            ));
    }
}

if($action == "edittopup"){
    $aid = $_POST["editaid"];
    $amount = $_POST["editamount"];
    $transitioncode = $_POST["editcode"];

    mysqli_query($con, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    mysqli_begin_transaction($con);

    try {
        $sql = "UPDATE tblbalancein SET Amount=?,TransitionCode=? WHERE AID = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("dsi", $amount, $transitioncode, $aid);
        if ($stmt->execute()) {
            save_log("Username ".$_SESSION['esportclient_username']." သည် Topup Amountအားပြင်သွားသည်။");
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