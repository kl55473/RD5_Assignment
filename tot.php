<?php
session_start();

header('Content-Type: application/json; charset=utf8');
require ("config.php");

$link = mysqli_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysqli_connect_error() );
$result = mysqli_query ( $link, "set names utf8" );
mysqli_select_db ( $link, $dbname );

$id=$_GET["id"];

$u=$_SESSION["buname"];

$sql2="select total_money from member where m_username='$u'";
$result2=mysqli_query($link,$sql2)or die ("2");
$row2=mysqli_fetch_assoc($result2);
$tot=$row2['total_money'];
//$m=$row2['m_id'];

echo json_encode(array(
            'tot' => $tot));

?>