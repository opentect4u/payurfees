<?php include("header.php");?>



<body onLoad="Captcha();">




	<div class="wrapper" style="padding-top:10px; padding-bottom:10px;">
		<div class="container" >
			<div class="row">
				
				<div class="module module-login span7">
					
					
					<script type="text/javascript">
                 function Captcha(){
                     var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
                     var i;
                     for (i=0;i<6;i++){
                       var a = alpha[Math.floor(Math.random() * alpha.length)];
                       var b = alpha[Math.floor(Math.random() * alpha.length)];
                       var c = alpha[Math.floor(Math.random() * alpha.length)];
                       var d = alpha[Math.floor(Math.random() * alpha.length)];
                       var e = alpha[Math.floor(Math.random() * alpha.length)];
                       var f = alpha[Math.floor(Math.random() * alpha.length)];
                       var g = alpha[Math.floor(Math.random() * alpha.length)];
                      }
                    var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
                    document.getElementById("mainCaptcha").value = code
                  }
				  
				  function removeSpaces(string){
                    return string.split(' ').join('');
                  }
				  </script>
									<form class="form-horizontal row-fluid" action="mail.php" method="post">
									
									
									<div class="module-head" style="background:#042144"><img src="contact.jpg"/>
                                    <br/>
<h3 style="color:#fff; text-align: center; ">Write to us by filling in the form below</h3>
</div>
									
							
									<p>&nbsp;</p>
									
									
										<div class="control-group">
											<label class="control-label" for="basicinput">Name* :</label>
											<div class="controls">
												<input type="text"  placeholder="Name " name="name" id="name" class="span8">
												
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Mobile No.* :</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" name="mobile" id="mobile" placeholder="Mobile No" data-original-title="" class="span8 tip">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Email Id *:</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" name="email" id="email" placeholder="Email" data-original-title="" class="span8 tip">
											</div>
										</div>
										
										
												
										
										
<!--
										<div class="control-group">
											<label class="control-label" for="basicinput">Address :</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="text" placeholder="Dum Dum, Kolkata, West Bengal." data-original-title="" class="span8 tip">
											</div>
										</div>
										-->
										
										
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Message*</label>
											<div class="controls">
												<textarea class="span8" name="commnents" id="comments" rows="3"></textarea>
											</div>
										</div>
										
										
										 <div class="control-group">
											<label class="control-label" for="basicinput">Captcha*</label>
											<div class="controls"><input type="text" id="mainCaptcha" readonly style="background:#FFCC33; color:#000000; width: 26%"/>
             <input type="text" id="txtInput" placeholder="Enter Code."  style="width: 36%"/></div>
    </div>
    
										
										<div class="control-group">
											<div class="controls">
												<input name="submit" type="submit" class="btn btn-primary btn-large" value="Submit" onClick="return ValidateForm();"/>
											</div>
										</div>
										
									</form>
                                    
                                    


<script type="text/javascript">
	 function ValidateForm()
{

if (document.getElementById('name').value=="")
    {
        alert("Please enter your   name"); 
        document.getElementById('name').focus();
        return false;
    }
	var str=document.getElementById('name').value;
        for (var i = 0; i < str.length; i++)
{
var ch = str.substring(i, i + 1);
    if (((ch < "a" || "z" < ch) && (ch < "A" || "Z" < ch)) && ch != ' ')
    {
    alert("The   name field only accepts letters & spaces.");
    document.getElementById('name').focus();
    return false;
    }
}



	

	
if (document.getElementById('mobile').value =="")
    {
        alert("Please enter your Contact Number"); 
       document.getElementById('mobile').focus();
        return false;
    }
//if (document.getElementById('phone').value !="")
   // {	
	var phoneexp1 =/^[0-9]+$/;
	if (! document.getElementById('mobile').value.match(phoneexp1))
	{
	alert("Please enter digit only for Mobile Number field");
	 document.getElementById('mobile').value='';
	document.getElementById('mobile').focus();
	return false ;
	}
//}	
	
	 if (document.getElementById('email').value =="")
    {
        alert("Please enter your  email address"); 
        document.getElementById('email').focus();
        return false;
    }
	var x=document.getElementById('email').value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }




	
	
	 if (document.getElementById('comments').value =="")
    {
        alert("Please enter your  Comments"); 
        document.getElementById('comments').focus();
        return false;
    }
	
if(document.getElementById('txtInput').value=='')
{
  alert("Please enter the   capcha code");
document.getElementById('txtInput').focus();
                        return false;
}
  var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
                      var string2 = removeSpaces(document.getElementById('txtInput').value);
                      if (string1 != string2)
					  {
					  alert("Please enter the  Valid capcha code");
document.getElementById('txtInput').focus();
                        return false;
                      }
            
	return true;
}
</script>

									<p>&nbsp;</p>
					
				</div>


<div class="module-login span4 ">
			<h2 style="color: #0067b3;"><!--Pay the easy & smart way--><!--Aim of Payur fees-->Contact Us</h2>
			
			<h3 style="color: #8cc63e;">Pay Your Fees</h3>
			<p style="color: #000; font-weight: bold; font-size: 15px;">Synergic Softek Solutions Pvt.Ltd.<br>
			55 D, Deshapran Sasmal Road <br>
			kolkata 700033<br>
			West Bengal,<br>
			India<br>
			<br>
			Helpline: +91 33 46024723 / +91 33 24244745<br>			
			Mobile: +91 33 9903373948 <br>
			Email: <a href="mailto:info@payurfees.com">info@payurfees.com</a> / <a href="mailto:info@synergicsoftek.com">info@synergicsoftek.com</a><br>
</p>
			<!--<ul>
				<li>Lorem Ipsum is simply dummy text of the printing </li>
				<li>Ipsum is simply dummy text of the printing </li>
				<li>Simply dummy text of the printing </li>
				<li>Lorem Ipsum is simply dummy text of  </li>
			</ul>-->
			

				</div>


<!--
				<div class="module-login span8">
				<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3685.9893785163795!2d88.34344751449693!3d22.504581685217794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s+satyam+building+55+D+Deshapran+Sasmal+Road+kolkata+70033!5e0!3m2!1sen!2sin!4v1519127099577" width="100%" height="350" frameborder="0" style="border:solid 3px #fff" allowfullscreen></iframe>
				</div>-->
				
			</div>
			
			<div class="row">
				
				<div class="module-login span12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3685.9893785163795!2d88.34344751449693!3d22.504581685217794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s+satyam+building+55+D+Deshapran+Sasmal+Road+kolkata+70033!5e0!3m2!1sen!2sin!4v1519127099577" width="100%" height="350" frameborder="0" style="border:solid 3px #fff" allowfullscreen></iframe>
				</div>
				
			</div>
			
			
		</div>
	</div><!--/.wrapper-->
	<div>&nbsp;</div>

	<?php include("footer.php");?>