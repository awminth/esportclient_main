<?php 

include("../config.php");
$action=$_POST["action"];

if($action == "loadpagetopup"){
    $userid = $_SESSION["esportclient_userid"];
    $out = "";
    // Set transaction isolation level and start transaction
    mysqli_query($con, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    mysqli_begin_transaction($con);

    try{
        //Usernameရှိမရှိစစ်
        $sql="SELECT * FROM tblbalancein WHERE PlayerID= ?";
        
        $stmt = $con -> prepare($sql);
        $stmt -> bind_param("i",$userid);
        $stmt -> execute();
        $res = $stmt -> get_result();

        if($res -> num_rows > 0){
            while($data = $res -> fetch_assoc()){
                $out .= '
                <div class="mb-2">
                    <a href="#collapseExample" class="btn btn-outline-accent" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        '.$data["Amount"].'
                    </a>

                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                            deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
                            provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et
                            dolorum
                            fuga.
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
?>