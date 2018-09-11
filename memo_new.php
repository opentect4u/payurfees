<?php
include("includes/connect.php"); ?>

<div id="table-content">
			
			<!--  start product-table ..................................................................................... -->
            
 				<form id="mainform" action="">
				<table border="1" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                <tr>
                    <th class="table-header-repeat line-left"><a href="">Sl No</a> </th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Memo No</a>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Intervention</a>	</th>
					<th class="table-header-repeat line-left"><a href="">Total Amount</a></th>
                    <th class="table-header-repeat line-left"><a href="">Total School</a></th>
                    <th class="table-header-repeat line-left"><a href="">UC Submit</a></th> 
                    <th class="table-header-repeat line-left"><a href="">UC_Submit School</a></th>
                    <th class="table-header-repeat line-left"><a href="">UC Not Submit</a></th>
                    <th class="table-header-repeat line-left"><a href="">Not_Submit School_Count</a></th>
				
				</tr>
             
                <?php
				$total=50;
	if($_REQUEST['page'])
	{
	$start=$total*($_REQUEST['page']-1);
	}
	else
	{
	$start=0;
	}
	if($_REQUEST['school_name'])
	{
	$enr='%'.$_REQUEST['school_name'].'%';
	$enr_no=" and school_name like '".$enr."' OR circle like '".$enr."' ";
	}
	else
	{
	$enr_no="";
	}
	
		$sql="select memo,memo_id,intervention,year,SUM(amount),COUNT(amount),SUM(uc_totalamount) from tbl_grant group by memo_id";
		$sql5="select memo_id,SUM(amount),COUNT(amount) from tbl_grant where `uc_status`='NO' group by memo_id";


	$res=mysql_query($sql);
	$n=mysql_num_rows($res);
	
	$res5=mysql_query($sql5);

	
	
	$c=1;
	while($data=mysql_fetch_array($res) and $data1=mysql_fetch_array($res5))
	{
	if($c%2=="0")
	{
	$bg="#EEEEEE";
	}
	else
	{
	$bg="#fcfcfc";
	}
	?>
				<tr  bgcolor="<?php echo $bg;?> " align="center">
					<td class="table_text"><?php echo $c+$start;?></td>
                    <td class="table_text"><a href="memo_detail.php?memo_id=<?php echo ucfirst($data['memo_id']);?>"><?php echo ucfirst($data['memo']);?></a>
					<td class="table_text"><?php echo ucfirst($data['intervention']);?></td>
                    <td class="table_text"><?php echo stripslashes($data['SUM(amount)']);?> </td>
                    <td class="table_text"><?php echo stripslashes($data['COUNT(amount)']);?> </td>
                    <td class="table_text"><span style="color:#060;font-weight:800;"><?php echo stripslashes($data['SUM(uc_totalamount)']);?></span> </td>
                    <td class="table_text"><span style="color:#060;font-weight:800;"><?php echo stripslashes($data['COUNT(amount)']-$data1['COUNT(amount)']);?> </span></td>
                    <td class="table_text"><span style="color:#F00"><?php echo stripslashes($data1['SUM(amount)']);?></span> </td>
                    <td class="table_text"><span style="color:#F00;font-weight:800;"><?php echo stripslashes($data1['COUNT(amount)']);?></span> </td>
                  
				</tr>
                
			<?php
			$c++;
			}
			?>
				

                </table>
              		<!--  end product-table................................... --> 
				</form>
			</div>   

  <!--  start paging..................................................... -->
			
			<!--  end paging................ -->      
        
