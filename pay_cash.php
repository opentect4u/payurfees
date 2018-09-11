<?php
 include("includes/connect.php");
 if($_REQUEST['student_id'])
 {
 $data=mysql_fetch_array(mysql_query("select * from tbl_student where  id='".$_REQUEST['student_id']."'"));
 $ss=substr_count($_REQUEST['info_period'],'_');
 $dt=explode('_',$_REQUEST['info_period']);
 
 for($i=0;$i<$ss+1;$i++)
			{
			$dt5=explode('/',$dt[$i]);
 $cou3=mysql_fetch_array(mysql_query("select * from tbl_fees where fee_code='".$dt5[3]."'"));
 $cou4=mysql_fetch_array(mysql_query("select * from tbl_institute where id='".$_REQUEST['ins_id']."'"));
 
 $ltf=explode("_",$_REQUEST['late_fee']);
 $tot=$cou3['amount']+$ltf[$i]+$cou4['convenience_fees'];
  $sql="insert into tbl_collect_fees set
  pid='".$data['pid']."',
order_id='".$_REQUEST['order_id']."',
student_id='".$_REQUEST['student_id']."',
ins_id='".$_REQUEST['ins_id']."',
course='".$_REQUEST['course']."',
roll_no='".$_REQUEST['roll_no']."',
section_name='".$_REQUEST['section_name']."',
fee_period='".$dt5[0]."',
fee_code='".$dt5[3]."',
amount='".$cou3['amount']."',
late_fee='".$ltf[$i]."',
conv_fee='".$cou4['convenience_fees']."',
total_amount='".$tot."',
 payment_mode='0',
 payment_date='".date("Y-m-d")."'";
mysql_query($sql);
//echo "<p>---</p>";
 }
 
 
 
 $to = $data['email'];
// $to="abhijit@featuredhost.com";
$subject = "Receipt Notification from Payurfees";
$message = "
<html>
<head>
<title>Email Content</title>
</head>
<body>
<p>Hi ".ucwords($data['student_name']).",</p>
<p>
We have received your Payment of Rs.".$_REQUEST['amt']." vide student-".$data['student_name'].", class-".$_REQUEST['course']." ,section-".$_REQUEST['section_name']."<br/>
roll no.-".$_REQUEST['roll_no']." for at ".date("d/m/Y H:i:s").".<br/>
Assuring you of our best services,always.
<br/><br/>
Thanks,<br/>
Team Payurfees
</p>

</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Payurfees Team <info@payurfees.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);








$name2=ucwords($data['student_name']);
$mob2=($data['mobile']);
//$mob2='9332228254';
    $url = "https://bulksms.sssplsales.in/api/api_http.php";
    $recipients = array($mob2);
    $param = array(
        'username' => 'PAYFEE',
        'password' => 'pay357fee',
        'senderid' => 'PAYFEE',
        'text' => 'Hi '.$name2.','.
		
		'Payment of Rs.'.$_REQUEST['amt'].' received against student-'.$data['student_name'].' class-'.$_REQUEST['course'].' roll no.-'.$_REQUEST['roll_no'].' section-'.$_REQUEST['section_name'].'

Thanks,
Team Payurfees',
        'route' => 'Informative',
        'type' => 'text',
        'datetime' => '2018-07-18 12:28:57',
        'to' => implode(';', $recipients),
    );
    $post = http_build_query($param, '', '&');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Connection: close"));
    $result = curl_exec($ch);
    if(curl_errno($ch)) {
        $result = "cURL ERROR: " . curl_errno($ch) . " " . curl_error($ch);
    } else {
        $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        switch($returnCode) {
            case 200 :
                break;
            default :
                $result = "HTTP ERROR: " . $returnCode;
        }
    }
    curl_close($ch);
  //  print $result;



 }
 
 ?>
 <script type="text/javascript">
alert('Cash Received');
location.href='collect_fees.php';
 </script>
