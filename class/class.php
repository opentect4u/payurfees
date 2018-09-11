<?php

class Query
{	
	function insert($table)
	{
		try
		{
			$result = mysql_query("select * from ".$table);
			$numfields=mysql_num_fields($result);
			for ($i=1; $i < $numfields; $i++) 
			{ 
				$val=mysql_field_name($result, $i);
				$value.="'".$_REQUEST[$val]."',";
				$field.=mysql_field_name($result, $i).","; 
			}
			$fields=substr($field,0,-1);
			$values=substr($value,0,-1);
			$sql="insert into ".$table." (".$fields.") values(".$values.")";
			$Rs=mysql_query($sql);
			$id=mysql_insert_id();
			return $id;
		}
		catch (Exception $e) 
		{
    		echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	
	function update($table,$fld,$field)
	{
		try
		{
			$result = mysql_query("select * from ".$table);
			$numfields=mysql_num_fields($result);
			for ($i=1; $i < $numfields; $i++) 
			{ 
				$val=mysql_field_name($result, $i);
				if($_REQUEST[$val]!='')
				{
					$value.=$val."='".$_REQUEST[$val]."', ";
				}
			}
			$values=substr($value,0,-2);
			$sql="update ".$table." set ".$values." where ".$fld."=".$field;
			$Rs=mysql_query($sql);
			return $Rs;
		}
		catch (Exception $e) 
		{
    		echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

	function update2($table,$field_name,$fld,$field)
	{
		try
		{
			$sql="update ".$table." set ".$field_name." where ".$fld."=".$field;
			$Rs=mysql_query($sql);
			return $Rs;
		}
		catch (Exception $e) 
		{
    		echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

	function delete($table,$col,$val)
	{
		try
		{
			$sql_del="delete from ".$table." where ".$col."='".$val."' ";
			$Rs=mysql_query($sql_del);
			return $Rs;
		}
		catch (Exception $e) 
		{
    		echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

	function select_row($table_name,$selected_field,$mode,$page,$limit)
	{
		try
		{
			if($limit=="")
			{
				$sql="select ".$selected_field." from ".$table_name." where 1 ".$mode ;
			}
			else
			{
			$sql="select ".$selected_field." from ".$table_name." where 1 ".$mode." limit ".$page.",".$limit ;
			}
			$result = mysql_query($sql) or die(mysql_error());
			if ($result)
			{
				while ($row = mysql_fetch_array($result))
				$data[] = $row;
			}
			return $data;
		}
		catch (Exception $e) 
		{
    		echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
}	

class Paginate2 
{
	function paginate1($table_name,$selected_field,$file_name,$page,$limit,$mode)
	{
		$sql = "SELECT ".$selected_field." from ".$table_name." where 1 ".$mode;
		$result=mysql_query($sql);
		$numrows =mysql_num_rows($result);
		$pages = intval($numrows/$limit); 
		if($numrows % $limit)  
		{ 
			$pages++; 
		}
		for ($i=1; $i <= $pages; $i++)
		{ 
		 	$ppage = $limit*($i - 1); 
			if ($ppage == $page)
		 	{ 
		 		$str .="<b>$i</b> | \n"; 
			} 
		 	else
		 	{ 
			 	$str .="<a href=$file_name?page=$ppage&limit=$limit> <font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#000000'>$i</font></a> | \n";
		 	} 
		} 
		return $str;
	}
}



class Image
{
	function upload($source,$dest)
	{
		$ex=(date("Y.m.d_H-i-s") .$_FILES[$source]['name']);
		$file_name= $ex;
		$file_name=str_replace("\W","_" ,$file_name);
		$file1 = $file_name;
		copy($_FILES[$source]['tmp_name'], $dest."/$file_name");
		return $file1;
	}
}

?>		