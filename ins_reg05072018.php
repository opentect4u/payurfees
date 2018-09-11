<?php
session_start();
include("includes/connect.php");

 include("header.php");
if($_REQUEST['ins_name'])
{
 $same_num=mysql_num_rows(mysql_query("select * from tbl_institute where 1 and mobile='".addslashes($_REQUEST['mobile'])."'"));
 $same_num2=mysql_num_rows(mysql_query("select * from tbl_institute where 1 and ins_name='".addslashes($_REQUEST['ins_name'])."'"));
if($same_num=='0' && $same_num2=='0')
{

 $sql_user="insert into tbl_institute set
 st_month='".addslashes($_REQUEST['st_month'])."',
 st_year='".addslashes($_REQUEST['st_year'])."',
 en_month='".addslashes($_REQUEST['en_month'])."',
 en_year='".addslashes($_REQUEST['en_year'])."',
 
zip='".addslashes($_REQUEST['zip'])."',
ins_name='".addslashes($_REQUEST['ins_name'])."',
ins_type='".addslashes($_REQUEST['ins_type'])."',
address='".addslashes($_REQUEST['address'])."',
office_email='".addslashes($_REQUEST['off_email'])."',
office_phone='".addslashes($_REQUEST['off_mobile'])."',
ins_website='".addslashes($_REQUEST['off_website'])."',
head_name='".addslashes($_REQUEST['head_name'])."',




name='".addslashes($_REQUEST['name'])."',
designation='".addslashes($_REQUEST['designation'])."',
mobile='".addslashes($_REQUEST['mobile'])."',
email='".addslashes($_REQUEST['email'])."',

password='".addslashes($_REQUEST['password'])."',



doj='".date("Y-m-d")."' ";
mysql_query($sql_user);
 //$myid = mysql_insert_id();
 //$_SESSION['ins_id'] = $myid;
// $_SESSION['ins_name'] = $_REQUEST['ins_name'];
	$msg=1;		   
?>
<script type="application/javascript">
location.href="thanks-reg.php";
</script>
<?php
}
else
{
if($same_num2!='0')
{
$msg3=3;
}
if($same_num!='0')
{
$msg2=2;
}
}


}
?>



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span8 offset2">
					
					
					
									<form class="form-horizontal row-fluid" action="" method="post" enctype="multipart/form-data">
									
									
									<div class="module-head" style="background:#042144">
							<h3 style="color:#fff; ">Institute's Registration</h3>
                            
                            <?php
if($msg3=='3')
{
?>
<p align="center" style="color:#FF0000">Same Institute Name is already used in our database </p>
<?php
}
?>
<?php
if($msg2=='2')
{
?>
<p align="center" style="color:#FF0000">Same Mobile No. of Authorised Person is already used in our database </p>
<?php
}
?>
						</div>
									<p>&nbsp;</p>
									
									
										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Name of the Institution</b><font color="red">*</font> :</label>
											<div class="controls">
												<input type="text"  name="ins_name" id="ins_name" class="span8">
												
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Academic Session Start</b><font color="red">*</font> :</label>
											<div class="controls">
												<select name="st_month" id="st_month" style="width: 32%">
<option value="01">Jan</option>
<option value="02">Feb</option>
<option value="03">Mar</option>
<option value="04">Apr</option>
<option value="05">May</option>
<option value="06">Jun</option>
<option value="07">Jul</option>
<option value="08">Aug</option>
<option value="09">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select> - <select name="st_year" id="st_year" style="width: 32%">
<?php
		for($i2=2018;$i2<=2030;$i2++)
		{
		?> <option value="<?php echo $i2;?>"><?php echo $i2;?></option>
        <?php
		}
		?>
</select>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Academic Session End</b><font color="red">*</font> :</label>
											<div class="controls">
												<select name="en_month" id="en_month" style="width: 32%">
<option value="01">Jan</option>
<option value="02">Feb</option>
<option value="03">Mar</option>
<option value="04">Apr</option>
<option value="05">May</option>
<option value="06">Jun</option>
<option value="07">Jul</option>
<option value="08">Aug</option>
<option value="09">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select> - <select name="en_year" id="en_year" style="width: 32%">
<?php
		for($i3=2018;$i3<=2030;$i3++)
		{
		?> <option value="<?php echo $i3;?>"><?php echo $i3;?></option>
        <?php
		}
		?>
</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Address</b><font color="red">*</font> :</label>
											<div class="controls">
												<input type="text" name="address" id="address" class="span8 tip">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Pin Code</b><font color="red">*</font> :</label>
											<div class="controls">
												<input  type="text" name="zip" id="zip" class="span8 tip">
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Type of Institution</b><font color="red">*</font> :</label>
											<div class="controls">
												<select name="ins_type" id="ins_type">
<option value="">--Select--</option>
<?php
				$s="select * from tbl_institute_type where 1   order by id asc";
				$r=mysql_query($s);
				while($d=mysql_fetch_array($r))
				{
				?><option value="<?php echo $d['institute_type'];?>" <?php if($result['ins_type']==$d['institute_type']) { echo 'selected'; }?>><?php echo $d['institute_type'];?></option>
                <?php
				}
				?>
<!--<option value="School">School</option>
<option value="College">College</option>
<option value="University">University</option>
<option value="Tutorial Center">Tutorial Center</option>-->
</select>
											</div>
										</div>




										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Office Phone</b><font color="red">*</font> :</label>
											<div class="controls">
												<input type="text"name="off_mobile" id="off_mobile" class="span8 tip">
                                                <br/>
                                                <font color="#0871bb">(with STD code)</font>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Office Email Id</b> :</label>
											<div class="controls">
												<input  type="text" name="off_email" id="off_email" class="span8 tip">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Institute's Website</b> :</label>
											<div class="controls">
												<input  type="text" name="off_website" id="off_website" class="span8 tip">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Name of the Authorised Person</b><font color="red">*</font> :</label>
											<div class="controls">
												<input type="text" name="name" id="name" class="span8 tip">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Designation</b><font color="red">*</font> :</label>
											<div class="controls">
												<input  type="text" name="designation" id="designation" class="span8 tip">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Email Id</b><font color="red">*</font> :</label>
											<div class="controls">
												<input  type="text" name="email" id="email" class="span8 tip">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Mobile No.</b><font color="red">*</font> :</label>
											<div class="controls">
												<input type="text" name="mobile" id="mobile" class="span8 tip">
                                                 <br/>
                                                <font color="#0871bb">(This will be your userid)</font>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Password</b><font color="red">*</font> :</label>
											<div class="controls">
												<input  type="password" name="password" id="password" class="span8 tip">
											</div>
										</div>
										
											<div class="control-group">
											<label class="control-label" for="basicinput"><b>Re Type Password</b><font color="red">*</font> :</label>
											<div class="controls">
												<input type="password" name="cpassword" id="cpassword" class="span8 tip">
											</div>
										</div>
										
										
										
										
										<div class="control-group">
											<div class="controls">
												<input type="submit" class="btn btn-primary btn-large" name="submit" id="submit" value="Submit" onClick="return validate();"/>
											</div>
										</div>
										
										
										
										
										
										
										
										
										
										
										
								
										
									</form>
                                    
                                    
                                      <script type="text/javascript" >
function validate()
{


if(document.getElementById('ins_name').value=='')
{
alert("Please enter the  Institute name");
document.getElementById('ins_name').focus();
return false;
}
/*var str5=document.getElementById('ins_name').value;
        for (var i = 0; i < str5.length; i++)
{
var ch = str5.substring(i, i + 1);
    if (((ch < "a" || "z" < ch) && (ch < "A" || "Z" < ch)) && ch != ' ')
    {
    alert("The Institute Name field only accepts letters & spaces.");
    document.getElementById('ins_name').focus();
    return false;
    }
}
*/
if(document.getElementById('address').value=='')
{
alert("Please enter the  Institute Address");
document.getElementById('address').focus();
return false;
}
if(document.getElementById('zip').value=='')
{
alert("Please enter the  PIN Code");
document.getElementById('zip').focus();
return false;
}


if(document.getElementById('zip').value.length!='6')
{
alert("Please enter the  PIN Code 6 Digit No.");
document.getElementById('zip').focus();
return false;
}	
	var mobexp12 =/^[0-9]+$/;
if (! document.getElementById('zip').value.match(mobexp12))
{
alert("please enter digit only for PIN Code feild");
 //document.getElementById('mobile').value='';
document.getElementById('zip').focus();
return false ;
}

if(document.getElementById('ins_type').value=='')
{
alert("Please choose the  Type of Institution");
document.getElementById('ins_type').focus();
return false;
}

if(document.getElementById('off_mobile').value=='')
{
alert("Please enter the  Office Phone No.");
document.getElementById('off_mobile').focus();
return false;
}

/*
if(document.getElementById('head_name').value=='')
{
alert("Please enter the Institute Head Name");
document.getElementById('head_name').focus();
return false;
}
*/
if(document.getElementById('name').value=='')
{
alert("Please enter the  Contact Person Name");
document.getElementById('name').focus();
return false;
}

var str=document.getElementById('name').value;
        for (var i = 0; i < str.length; i++)
{
var ch = str.substring(i, i + 1);
    if (((ch < "a" || "z" < ch) && (ch < "A" || "Z" < ch)) && ch != ' ')
    {
    alert("The Name field only accepts letters & spaces.");
    document.getElementById('name').focus();
    return false;
    }
}


if(document.getElementById('designation').value=='')
{
alert("Please enter the  Contact Person Designation");
document.getElementById('designation').focus();
return false;
}


if(document.getElementById('email').value=='')
{
alert("Please enter the  Email Address");
document.getElementById('email').focus();
return false;
}
var oldemail=document.getElementById('email').value ;
	if(oldemail.split("@")==oldemail || oldemail.split(".")==oldemail)
	{
	alert("Please enter the correct email address");
	document.getElementById('email').focus();
	return false;
	}
if(document.getElementById('mobile').value=='')
{
alert("Please enter the  Mobile No.");
document.getElementById('mobile').focus();
return false;
}

if(document.getElementById('mobile').value.length!='10')
{
alert("Please enter the  Mobile No 10 Digit No.");
document.getElementById('mobile').focus();
return false;
}	
	var mobexp1 =/^[0-9]+$/;
if (! document.getElementById('mobile').value.match(mobexp1))
{
alert("please enter number only for mobile feild");
 //document.getElementById('mobile').value='';
document.getElementById('mobile').focus();
return false ;
}



if(document.getElementById('password').value=='')
{
alert("Please enter the Password");
document.getElementById('password').focus();
return false;
}
var paswd=/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]{5,})$/;
//var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{5,8}$/;  
if(!document.getElementById('password').value.match(paswd))   
{   
alert('Enter Password which must be minimum 5 character ,containing at least 1 character 1 number')  
return false;  
}  



if(document.getElementById('cpassword').value=='')
{
alert("Please enter the Re-type Password");
document.getElementById('cpassword').focus();
return false;

}

if(document.getElementById('password').value!=document.getElementById('cpassword').value)
{
alert("Password and Re-type Password do not match");
document.getElementById('cpassword').focus();
return false;
}


return true;
}
</script>
									<p>&nbsp;</p>
					
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<?php include("footer.php");?>