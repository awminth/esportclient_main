<?php 
session_start();

date_default_timezone_set("Asia/Rangoon");

define('server_name',$_SERVER['HTTP_HOST']);

if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
    $chk_link = "https";
}else{
    $chk_link = "http";
}

define('root',__DIR__.'/');

//Local
define('roothtml',$chk_link."://".server_name."/esportclient_main/");
$con=new mysqli("localhost","root","root","esport");

define('curlink',basename($_SERVER['SCRIPT_NAME']));

//Online
// define('roothtml',$chk_link."://".server_name."/");
// $con=new mysqli("65.60.39.46","bcedur_admin","kyoungunity*007*","bcedur_betterchangeedu");

mysqli_set_charset($con,"utf8");

$color="secondary";
$share = array("Editor","Viewer");
$usertype=array('Admin','User');
$companykey = "E258AF866BB444E6A116C52B24DAB7C5";
$portfolio = "ThirdPartySportsBook";
$gpid = 1053;
$gameId = 0;

function load_username(){
    global $con;
    $sql="select * from tbluser order by AID desc";
    $result=mysqli_query($con,$sql) or die("Query fail.");
    $out="";
    while($row = mysqli_fetch_array($result)){
        $out.="<i class='bi-person-circle'></i>
            <option value='{$row["UserName"]}'>{$row["UserName"]}</option>";
    }
    return $out;
}

function enDate1($date){
    if($date!=NULL && $date!=''){
        $date = date_create($date);
        $date = date_format($date,"j F Y");
        return $date;
    }else{
        return "";
    }   
}

function enDate2($date){
    if($date!=NULL && $date!=''){
        $date = date_create($date);
        $date = date_format($date,"F Y");
        return $date;
    }else{
        return "";
    }   
}

function enDate3($date){
    if($date!=NULL && $date!=''){
        $date = date_create($date);
        $date = date_format($date,"M - Y");
        return $date;
    }else{
        return "";
    }   
}

function load_agent(){
    global $con;
    $sql="select * from tblagent";
    $result=mysqli_query($con,$sql) or die("Query fail.");
    $out="";
    while($row = mysqli_fetch_array($result)){
        $out.="<option value='{$row["AID"]}'>{$row["UserName"]}</option>";
    }
    return $out;
}

function GetString($sql){
    global $con;
    $str="";   
    $result=mysqli_query($con,$sql) or die("Query Fail");
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
       $str= $row[0];
    }

    return $str;

}

function GetInt($sql){
    global $con;
    $str=0;   
    $result=mysqli_query($con,$sql) or die("Query Fail");
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
       $str= $row[0];
    }

    return $str;

}

function GetBool($sql){
    global $con;
    $str = false;   
    $result=mysqli_query($con,$sql) or die("Query Fail");
    if(mysqli_num_rows($result)>0){
        $str = true;
    }
    return $str;
}

function enDate($date){
    if($date!=NULL && $date!=''){
        $date = date_create($date);
        $date = date_format($date,"d-m-Y");
        return $date;
    }else{
        return "";
    }
   
}

function load_user(){
    global $con;
    $loginid= $_SESSION["userid"];
    $sql="select * from tbluser ";
    $result=mysqli_query($con,$sql) or die("Query fail.");
    $out="";
    while($row = mysqli_fetch_array($result)){
        $out.="<option value='{$row["AID"]}'>{$row["UserName"]}</option>";
    }
    return $out;
}

function save_log($des){
    global $con;
    $dt=date("Y-m-d H:i:s");
    $userid=$_SESSION['userid'];
    $sql="insert into tbllog (Description,UserID,Date) values ('{$des}'
    ,$userid,'{$dt}')";
    mysqli_query($con,$sql);   
}

function NumtoText($number){
    $array = [
        '1' => 'First',
        '2' => 'Second',
        '3' => 'Third',
        '4' => 'Four',
        '5' => 'Five',
        '6' => 'Six',
        '7' => 'Seven',
        '8' => 'Eight',
        '9' => 'Nine',
        '10' => 'Ten',
    ];
    return strtr($number, $array);
}

?>