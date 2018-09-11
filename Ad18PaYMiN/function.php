<?php
session_start();

function getrawdata($pic_name, $thumb_width, $thumb_height,$folder)
{	
    global $root;
	if (is_uploaded_file($_FILES[$pic_name]['tmp_name']))
	{
  	    copy($_FILES[$pic_name]['tmp_name'], $root .$folder ."/" .$_FILES[$pic_name]['name']);
		$path = $root .$folder ."/" .$_FILES[$pic_name]['name'];
	    
		$fd = fopen ($path, "r");
		$buffer = fread ($fd, filesize ($path));
		fclose ($fd);
		$imagedata = GetImageSize($path);
		$type = substr($path,-3);
	
		if ($imagedata[2] == 1) {
		  $src_img = imagecreatefromgif($path);		
		}
		if ($imagedata[2] == 2) {
		  $src_img = imagecreatefromjpeg($path);
		}
		if ($imagedata[2] == 3) {
		  $src_img = imagecreatefrompng($path);		
		}
		if ($imagedata[2] == 6) {
		  $src_img = ImageCreateFromBMP($path);		
		}
	
		$origw=imagesx($src_img);
		$origh=imagesy($src_img); 
	
		$scale = min($thumb_width/$origw, $thumb_height/$origh);
		$width = (int)($origw*$scale);
		$height = (int)($origh*$scale);
		$deltaw = (int)(($thumb_width - $width)/2);
		$deltah = (int)(($thumb_height - $height)/2);
	
		$dst_img=ImageCreateTrueColor($thumb_width, $thumb_height); 
	
		$dst_img=ImageCreateTrueColor($thumb_width, $thumb_height); 
		$background_color = imagecolorallocate ($dst_img, 255, 255,255);
	
		ImageFill($dst_img,0,0,$background_color);
	
		ImageCopyResampled($dst_img,$src_img,$deltaw,$deltah,0,0,$width,$height,$origw,$origh);
	
		ob_start();

			if($type=="png")
			{
			  imagepng($dst_img);
			}
			else {
			  imagejpeg($dst_img, '', 80);
			}
			
			$thumbnail = ob_get_contents();

		ob_end_clean();
	
	    unlink($path);
  }
  $data['0']=$thumbnail;
  $data['1']=$buffer;
  $data['2']=$type;
  
  return $data;
}

function ImageCreateFromBMP($filename)
{
 //Ouverture du fichier en mode binaire
   if (! $f1 = fopen($filename,"rb")) return FALSE;

 //1 : Chargement des ent?s FICHIER
   $FILE = unpack("vfile_type/Vfile_size/Vreserved/Vbitmap_offset", fread($f1,14));
   if ($FILE['file_type'] != 19778) return FALSE;

 //2 : Chargement des ent?s BMP
   $BMP = unpack('Vheader_size/Vwidth/Vheight/vplanes/vbits_per_pixel'.
                 '/Vcompression/Vsize_bitmap/Vhoriz_resolution'.
                 '/Vvert_resolution/Vcolors_used/Vcolors_important', fread($f1,40));
   $BMP['colors'] = pow(2,$BMP['bits_per_pixel']);
   if ($BMP['size_bitmap'] == 0) $BMP['size_bitmap'] = $FILE['file_size'] - $FILE['bitmap_offset'];
   $BMP['bytes_per_pixel'] = $BMP['bits_per_pixel']/8;
   $BMP['bytes_per_pixel2'] = ceil($BMP['bytes_per_pixel']);
   $BMP['decal'] = ($BMP['width']*$BMP['bytes_per_pixel']/4);
   $BMP['decal'] -= floor($BMP['width']*$BMP['bytes_per_pixel']/4);
   $BMP['decal'] = 4-(4*$BMP['decal']);
   if ($BMP['decal'] == 4) $BMP['decal'] = 0;

 //3 : Chargement des couleurs de la palette
   $PALETTE = array();
   if ($BMP['colors'] < 16777216)
   {
   $PALETTE = unpack('V'.$BMP['colors'], fread($f1,$BMP['colors']*4));
   }

 //4 : Cr?ion de l'image
   $IMG = fread($f1,$BMP['size_bitmap']);
   $VIDE = chr(0);

   $res = imagecreatetruecolor($BMP['width'],$BMP['height']);
   $P = 0;
   $Y = $BMP['height']-1;
   while ($Y >= 0)
   {
   $X=0;
   while ($X < $BMP['width'])
   {
     if ($BMP['bits_per_pixel'] == 24)
       $COLOR = unpack("V",substr($IMG,$P,3).$VIDE);
     elseif ($BMP['bits_per_pixel'] == 16)
     {  
       $COLOR = unpack("n",substr($IMG,$P,2));
       $COLOR[1] = $PALETTE[$COLOR[1]+1];
     }
     elseif ($BMP['bits_per_pixel'] == 8)
     {  
       $COLOR = unpack("n",$VIDE.substr($IMG,$P,1));
       $COLOR[1] = $PALETTE[$COLOR[1]+1];
     }
     elseif ($BMP['bits_per_pixel'] == 4)
     {
       $COLOR = unpack("n",$VIDE.substr($IMG,floor($P),1));
       if (($P*2)%2 == 0) $COLOR[1] = ($COLOR[1] >> 4) ; else $COLOR[1] = ($COLOR[1] & 0x0F);
       $COLOR[1] = $PALETTE[$COLOR[1]+1];
     }
     elseif ($BMP['bits_per_pixel'] == 1)
     {
       $COLOR = unpack("n",$VIDE.substr($IMG,floor($P),1));
       if    (($P*8)%8 == 0) $COLOR[1] =  $COLOR[1]        >>7;
       elseif (($P*8)%8 == 1) $COLOR[1] = ($COLOR[1] & 0x40)>>6;
       elseif (($P*8)%8 == 2) $COLOR[1] = ($COLOR[1] & 0x20)>>5;
       elseif (($P*8)%8 == 3) $COLOR[1] = ($COLOR[1] & 0x10)>>4;
       elseif (($P*8)%8 == 4) $COLOR[1] = ($COLOR[1] & 0x8)>>3;
       elseif (($P*8)%8 == 5) $COLOR[1] = ($COLOR[1] & 0x4)>>2;
       elseif (($P*8)%8 == 6) $COLOR[1] = ($COLOR[1] & 0x2)>>1;
       elseif (($P*8)%8 == 7) $COLOR[1] = ($COLOR[1] & 0x1);
       $COLOR[1] = $PALETTE[$COLOR[1]+1];
     }
     else
       return FALSE;
     imagesetpixel($res,$X,$Y,$COLOR[1]);
     $X++;
     $P += $BMP['bytes_per_pixel'];
   }
   $Y--;
   $P+=$BMP['decal'];
   }

 //Fermeture du fichier
   fclose($f1);

 return $res;
}

function checklogin()
{
 
 if($_SESSION['admin'] != 'admin')
 {  header("Location: index.php");

 }

}
?>