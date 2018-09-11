<?php
include("ins_header.php");


if($_POST['importSubmit']){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if($_FILES['file']['tmp_name']){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
           // fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email
				if($line[0]!='' && $line[0]!='Name' )
				{
				//$same_num=mysql_num_rows(mysql_query("select * from tbl_student where 1 and ins_id='".addslashes($_SESSION['ins_id'])."'  and course_name='".addslashes($_REQUEST['course_name'])."' year_reg='".$line[1]."'  and reg_no='".$line[2]."' and  section_name='".$line[3]."' and roll_no=".$line[4]."' and mobile='".$line[5]."'"));
                   $sql = "INSERT into tbl_student (ins_id,course_name,student_name,year_reg,reg_no,section_name,roll_no,mobile,doj) 
                   values ('".addslashes($_SESSION['ins_id'])."','".addslashes($_REQUEST['course_name'])."','".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".date("Y-m-d")."')";
                  $result = mysql_query($sql);
				  //echo "<br/>";
				  ?>
                  <script type="text/javascript">
				  location.href='manage_student.php';
				  </script>
                  <?php
				   }
				   
				   
            }
            
            //close opened csv file
            fclose($csvFile);

    
	        $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
	
	
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

								<h2 style="color:#ffffff">Import Student Details</h2>

							</div>
<div class="module-body">
<form name="aa" action="" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">






<div class="control-group">

											<label class="control-label" for="basicinput"><b>Select CSV File</b> <font color="#FF0000">*</font>:</label>

											<div class="controls"><input type="file" name="file" id="file1" class="span8"/></div>
</div>

<div class="control-group">

											<label class="control-label" for="basicinput"><b>Demo File :</b></label>

											<div class="controls"><a href="SampleCSVFile_2kb.csv">Downlaod </a></div>
</div>
<div class="control-group">

											<label class="control-label" for="basicinput"><b>Name of the Institute</b><font color="#FF0000">*</font>:</label>

											<div class="controls"><?php echo $_SESSION['ins_name'];?></div>
</div>

<div class="control-group">

											<label class="control-label" for="basicinput"><b>Course</b> <font color="#FF0000">*</font>:</label>

											<div class="controls"><select name="course_name" id="course_name" class="span8"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_course where 1 and ins_id='".$_SESSION['ins_id']."' and pid='0'";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><?php echo $d['course_name'];?></option>



<?php
$s2="select * from tbl_course where 1 and   pid='".$d['id']."'";
$r2=mysql_query($s2);
while($d2=mysql_fetch_array($r2))
{
?>
<option value="<?php echo $d2['id'];?>">---<?php echo $d2['course_name'];?></option>
<?php
}
?> 
<?php
}
?>
</select></div>
</div>


<div>&nbsp;</div>
<div class="control-group">

											<div class="controls">

												<input  class="btn btn-primary btn-large" type="submit" name="importSubmit" value="Submit" onClick="return test1();"/>

											</div>
                                            </div>
</form>

<script type="text/javascript" >
function test1()
{
if(document.getElementById('file1').value=='')
{
alert("Please up[load the CSV File ");
document.getElementById('file1').focus();
return false;
}

if(document.getElementById('course_name').value=='')
{
alert("Please enter the  Course/Class Name");
document.getElementById('course_name').focus();
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
