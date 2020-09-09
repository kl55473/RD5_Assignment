<?php
session_start();

header('Content-Type: application/json; charset=utf8');
require ("config.php");

$link = mysqli_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysqli_connect_error() );
$result = mysqli_query ( $link, "set names utf8" );
mysqli_select_db ( $link, $dbname );

$id=$_GET["id"];

$u=$_SESSION["buname"];

$sql2="select total_money,m_id from member where m_username='$u'";
$result2=mysqli_query($link,$sql2)or die ("2");
$row2=mysqli_fetch_assoc($result2);
$tot=$row2['total_money'];
$m=$row2['m_id'];

// if($id==1){
// 	$sql="select * from list where action='提款' && m_id=$m order by date desc";
//     $result=mysqli_query($link,$sql)or die ("你已登出");
//     echo json_encode(array(
//         'title' => "提款明細"),JSON_UNESCAPED_UNICODE
//     );
// }
// if($id==2){
// 	$sql="select * from list where action='存款' && m_id=$m order by date desc";
//     $result=mysqli_query($link,$sql)or die ("你已登出");
//     echo json_encode(array(
//         'title' => '存款明細'),JSON_UNESCAPED_UNICODE
//     );
// }
//if($id==3){
	$sql="select * from list where m_id=$m order by date desc";
    $result=mysqli_query($link,$sql)or die ("你已登出");
    while($row=mysqli_fetch_assoc($result)){
        // echo json_encode(array(
        //     't_number' => $row['t_number'],
        //     'action' => $row['action'],
        //     'date' => $row['date'],
        //     'm_cash' => $row['m_cash'],
        //     'over' => $row['over']
        // ),JSON_UNESCAPED_UNICODE
        // );
        echo '<div class="col-md-4 nopadding"><div class="desc"><h3>交易編號：'.$row['t_number'].'</h3><hr/><p>交易類別：'.$row['action'].'</p><p></p>
                <p>日期：'.$row['date'].'</p><p>交易金額：'.$row['m_cash'].'</p><p>帳戶餘額：'.$row['over'].'</p></div></div>';
    }
//}

?>