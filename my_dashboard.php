<?php
include("insp_header.php");
if($_SESSION['parent_id']=='')
{
?>
<script type="text/javascript">
location.href="log_parent.php";
</script>
<?php
}

include("includes/connect.php");
$mem_data=mysql_fetch_array(mysql_query("select * from tbl_parent where 1 and id='".$_SESSION['parent_id']."'"));
if($_REQUEST['mobile'])
{
 $sql2="update  tbl_parent set
 
   name='".addslashes($_REQUEST['name'])."',
    mobile='".addslashes($_REQUEST['mobile'])."'
	 
  
  where
   id='".$_SESSION['parent_id']."'";
   mysql_query($sql2);
?>
<script type="text/javascript">
alert("Data Saved successfully..");
location.href="my_dashboard.php";
</script>
<?php
}

?>
 <div class="wrapper">

            <div class="container">

                <div class="row">

                    <div class="span3">

                        <div class="sidebar">

                            

                            

                             <?php include("left_pmenu.php");?>

                        </div>

                        <!--/.sidebar-->

                    </div>

                    <!--/.span3-->

                    <div class="span9">

                        <div class="content">

                            

                          

						<div class="module">

							<div class="module-head" style="background:#042139">

								<h2 style="color:#ffffff">Edit My Profile</h2>

							</div>

							<div class="module-body">
<form name="aa" action="" method="post" enctype="multipart/form-data">
<table border="1" cellpadding="1" cellspacing="2" align="center" width="80%">






<tr>
<td><b>Name:</b></td>
<td><input type="text" name="name" id="name" value="<?php echo $mem_data['name'];?>"/></td>
</tr>



<tr>
<td><b>Mobile:</b></td>
<td><input type="text" name="mobile" id="mobile" value="<?php echo $mem_data['mobile'];?>"  readonly="readonly"/></td>
</tr>

<tr>
<td><b>Email:</b></td>
<td><input type="text" name="email" id="email" value="<?php echo $mem_data['email'];?>"/></td>
</tr>





<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Save" onClick="return test1();"/></td>
</tr>
</table>
</form>

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