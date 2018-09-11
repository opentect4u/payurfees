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
	
		$sql="select distinct(memo_id) as memo_id  from tbl_grant order by memo_id";
	$res=mysql_query($sql);
	$n=mysql_num_rows($res);
	$res5=mysql_query($sql5);
	$c=1;
	while($data=mysql_fetch_array($res))
	{
	if($c%2=="0")
	{
	$bg="#EEEEEE";
	}
	else
	{
	$bg="#fcfcfc";
	}
	$uniq_data=mysql_fetch_array(mysql_query("select * from tbl_grant where 1 and memo_id='".$data['memo_id']."'"));
	?>
				<tr  bgcolor="<?php echo $bg;?> " align="center">
					<td class="table_text"><?php echo $c+$start;?></td>
                    <td class="table_text"><a href="memo_detail.php?memo_id=<?php echo ucfirst($data['memo_id']);?>"><?php echo ucfirst($uniq_data['memo']);?></a>
					<td class="table_text"><?php echo ucfirst($uniq_data['intervention']);?></td>
                    <td class="table_text"><?php $data2=mysql_fetch_array(mysql_query("select SUM(amount) as amt from tbl_grant where  1 and memo_id='".$data['memo_id']."'")); echo $data2['amt'];?> </td>
                    <td class="table_text"><?php $tot_school=mysql_num_rows(mysql_query("select *  from tbl_grant where  1 and memo_id='".$data['memo_id']."'")); echo $tot_school;?> </td>
                    <td class="table_text"><span style="color:#060;font-weight:800;"><?php $tot_uc_submit_amt=mysql_fetch_array(mysql_query("select sum(uc_totalamount) as uc_tot_amt  from tbl_grant where  1 and uc_totalamount!='0' and memo_id='".$data['memo_id']."'")); 
					if($tot_uc_submit_amt['uc_tot_amt']) { 
					echo $tot_uc_submit_amt['uc_tot_amt'];
					}
					else
					{
					echo "0";
					}
					?></span> </td>
                    <td class="table_text"><span style="color:#060;font-weight:800;"><?php $tot_uc_submit=mysql_num_rows(mysql_query("select *  from tbl_grant where  1 and uc_totalamount!='0' and memo_id='".$data['memo_id']."'")); echo $tot_uc_submit;?> </span></td>
                    
                    
                    <td class="table_text">
                    
                    <span style="color:#F00">
                    
                    <?php echo ($data2['amt']-$tot_uc_submit);?>
                    </span> </td>
                    <td class="table_text"><span style="color:#F00;font-weight:800;"><?php echo ($tot_school-$tot_uc_submit);?></span> </td>
                  
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
        
