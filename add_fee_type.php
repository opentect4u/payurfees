<?php
include("ins_header.php");
$mem_data=mysql_fetch_array(mysql_query("select * from tbl_institute where 1 and id='".$_SESSION['ins_id']."'"));
if($_REQUEST['name'])
{

 $sql="insert into tbl_fee_type set
 payment_mode='1',
 payment_frequency='".$_REQUEST['pfre']."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 fee_type='".addslashes($_REQUEST['name'])."',

doj='".date("Y-m-d")."'";
mysql_query($sql);
$my_id=mysql_insert_id();

//echo $_REQUEST['pfre'];
if($_REQUEST['pfre']=='1')
{
//echo addslashes($_REQUEST['name']);
//echo "<br>";

	for($i=0;$i<12;$i++)
	{
	$j=$i+1;
	$d = strtotime("+$i months",strtotime($_REQUEST['from_date']));
	$d2 = strtotime("+$j months",strtotime($_REQUEST['from_date']));
	//echo   date("Y-m-d",$d);
	//echo "-";
	//echo   date("Y-m-d",$d2);
	
	$sql5="insert into tbl_fee_type_data set
 from_date='".date("Y-m-d",$d)."',
 end_date='".date("Y-m-d",$d2)."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 fee_id='".$my_id."',

doj='".date("Y-m-d")."'";
mysql_query($sql5);
	
	echo "<br/>"; 
	}


}


if($_REQUEST['pfre']=='2')
{

//echo addslashes($_REQUEST['name']);
//echo "<br>";
$d = strtotime("+3 months",strtotime($_REQUEST['from_date']));
//echo $_REQUEST['from_date'];
//echo "-";
//echo   date("Y-m-d",$d);



$sql5="insert into tbl_fee_type_data set
 from_date='".$_REQUEST['from_date']."',
 end_date='".date("Y-m-d",$d)."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 fee_id='".$my_id."',

doj='".date("Y-m-d")."'";
mysql_query($sql5);


//echo"<br/>";


$d2 = strtotime("+6 months",strtotime($_REQUEST['from_date']));


//echo   date("Y-m-d",$d);
//echo "-";
//echo   date("Y-m-d",$d2);



$sql5="insert into tbl_fee_type_data set
 from_date='".date("Y-m-d",$d)."',
 end_date='".date("Y-m-d",$d2)."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 fee_id='".$my_id."',

doj='".date("Y-m-d")."'";
mysql_query($sql5);


//echo"<br/>";


$d3 = strtotime("+9 months",strtotime($_REQUEST['from_date']));

//echo   date("Y-m-d",$d2);
//echo "-";
//echo   date("Y-m-d",$d3);


$sql5="insert into tbl_fee_type_data set
 from_date='".date("Y-m-d",$d2)."',
 end_date='".date("Y-m-d",$d3)."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 fee_id='".$my_id."',

doj='".date("Y-m-d")."'";
mysql_query($sql5);
//echo"<br/>";

//echo   date("Y-m-d",$d3);
//echo "-";
$d4 = strtotime("+12 months",strtotime($_REQUEST['from_date']));
//echo   date("Y-m-d",$d4);

$sql5="insert into tbl_fee_type_data set
 from_date='".date("Y-m-d",$d3)."',
 end_date='".date("Y-m-d",$d4)."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 fee_id='".$my_id."',

doj='".date("Y-m-d")."'";
mysql_query($sql5);
}



if($_REQUEST['pfre']=='3')
{
//echo addslashes($_REQUEST['name']);
//echo "<br>";
$d = strtotime("+6 months",strtotime($_REQUEST['from_date']));

//echo $_REQUEST['from_date'];
//echo "-";
//echo   date("Y-m-d",$d);


$sql5="insert into tbl_fee_type_data set
 from_date='".$_REQUEST['from_date']."',
 end_date='".date("Y-m-d",$d)."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 fee_id='".$my_id."',

doj='".date("Y-m-d")."'";
mysql_query($sql5);
//echo"<br/>";

//echo   date("Y-m-d",$d);
//echo "-";
$d2 = strtotime("+12 months",strtotime($_REQUEST['from_date']));
//echo   date("Y-m-d",$d2);


$sql5="insert into tbl_fee_type_data set
 from_date='".date("Y-m-d",$d)."',
 end_date='".date("Y-m-d",$d2)."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 fee_id='".$my_id."',

doj='".date("Y-m-d")."'";
mysql_query($sql5);


}


if($_REQUEST['pfre']=='4')
{
//echo addslashes($_REQUEST['name']);
//echo "<br>";
$d = strtotime("+12 months",strtotime($_REQUEST['from_date']));
$d2 = $_REQUEST['end_date'];
//echo   date("Y-m-d",$d);
//echo "-";
//echo $d2;


$sql5="insert into tbl_fee_type_data set
 from_date='".$_REQUEST['from_date']."',
 end_date='".$d2."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 fee_id='".$my_id."',

doj='".date("Y-m-d")."'";
mysql_query($sql5);

}



if($_REQUEST['pfre']=='5')
{

$d2 = $_REQUEST['end_date'];

$sql5="insert into tbl_fee_type_data set
 from_date='".$_REQUEST['from_date']."',
 end_date='".$d2."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 fee_id='".$my_id."',

doj='".date("Y-m-d")."'";
mysql_query($sql5);

}
?>
<script type="text/javascript">
alert("Fee Type Added successfully..");
location.href="manage_fee_type.php";
</script>
<?php
}
?>


<div class="wrapper">

            <div class="container">

                <div class="row">

                    <div class="span3">

                        <div class="sidebar">

                            

                            

                             <?php include("left_menu.php");?>

                        </div>

                        <!--/.sidebar-->

                    </div>

                    <!--/.span3-->

                    <div class="span9">

                        <div class="content">

                            

                          

						<div class="module">

							<div class="module-head" style="background:#042139">

								<h2 style="color:#ffffff">Add Fee Type</h2>

							</div>
<div class="module-body">


<form name="aa" action="" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">
<div class="control-group">

											<label class="control-label" for="basicinput"><b>Fee Type Name</b> <font color=red>*</font>:</label>

											<div class="controls"><input type="text" name="name" id="name" class="span8"/></div>
</div>
<!--<div class="control-group">

											<label class="control-label" for="basicinput"><b>Payment Mode </b><font color=red>*</font>:</label>

											<div class="controls"><select  name="pmode" id="pmode" class="span8"/>
<option value="">--select--</option>
<option value="1">Exact Amount</option>
<option value="2">Advanced Amount</option>
<option value="3">Any Amount</option>

</select>
</div>
</div>-->


<div class="control-group">

											<label class="control-label" for="basicinput"><b>Payment Frequency</b> <font color=red>*</font>:</label>

											<div class="controls"><select  name="pfre" id="pfre" class="span8"/>
<option value="">--select--</option>
<option value="1">Monthly</option>  
<option value="2">Quarterly</option>
<option value="3">Half Yearly</option>
<option value="4">Yearly</option>
<option value="5">Onetime</option>
</select>
</div>
</div>




<input type="hidden" name="from_date" value="<?php echo $mem_data['st_year']."-".$mem_data['st_month']."-"."01";?>" />
<input type="hidden" name="end_date" value="<?php echo $mem_data['en_year']."-".$mem_data['en_month']."-"."31";?>" />

<div>&nbsp;</div>
<div class="control-group">

											<div class="controls">

												<input  class="btn btn-primary btn-large" type="submit" name="submit" value="Submit" onClick="return test1();"/>

											</div>
</form>

<script type="text/javascript" >
function test1()
{


if(document.getElementById('name').value=='')
{
alert("Please enter the  Fee Type Name");
document.getElementById('name').focus();
return false;
}

/*
if(document.getElementById('pmode').value=='')
{
alert("Please select the  Payment Mode");
document.getElementById('pmode').focus();
return false;
}
*/
if(document.getElementById('pfre').value=='')
{
alert("Please select the  Payment Frequency");
document.getElementById('pfre').focus();
return false;
}


return true;
}
</script>

</div>

							</div>

						</div>



                      

                                                 

                        </div>

                        <!--/.content-->

                    </div>

                    <!--/.span9-->

                </div>

            </div>

            <!--/.container-->

        </div>

        <!--/.wrapper-->
<?php include("ins_footer.php");?>
