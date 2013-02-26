<!DOCTYPE html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta charset="utf-8" >
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php wp_head(); ?>
    <style type="text/css">

      div.imageSub { position: relative; }
      div.imageSub img { z-index: 1; }
      div.imageSub div {
        position: absolute;
        left: 0%;
        right: 0%;
        bottom: 0;
        padding: 6px;
        height: 1196px;
        line-height: 16px;
 
        overflow: hidden;
      }
      div.imageSub div.blackbg {
        z-index: 2;
        background-color: #000000;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: alpha(opacity=0);
        opacity: 0.0;
      }
      div.imageSub div.label {
        z-index: 3;
        color: white;
      }

 </style>



<link rel="stylesheet" type="text/css" href="http://luxxboutiquehotel.com/wp-content/uploads/2013/02/shadowbox.css">
<script type="text/javascript" src="http://luxxboutiquehotel.com/wp-content/uploads/2013/02/shadowbox.js"></script>
<script type="text/javascript">
    Shadowbox.init({
        handleOversize: "resize", 
        onOpen: function() { 
                if((navigator.userAgent.match(/iPhone/i))||(navigator.userAgent.match(/iPad/i))) { 
                        $("#sb-container").css("top", $(window).scrollTop()); 
                        $(window).bind('scroll', function() { 
                                $("#sb-container").css("top", $(window).scrollTop()); 
                        }); 
                } 
        }, 
        onClose: function() { 
                if((navigator.userAgent.match(/iPhone/i))||(navigator.userAgent.match(/iPad/i))) { 
                        $(window).unbind('scroll'); 
                } 
        } 
}); 


</script>

<?php
	if ( $_POST['submit'] == "send" ) {
		class phpmailerAppException extends Exception {
			public function errorMessage() {
				$errorMsg = '<strong>' . $this->getMessage() . "</strong><br />";
				return $errorMsg;
			}
		}
		try {
			$to = "luxxboutiquehotel@gmail.com";
			if(filter_var($to, FILTER_VALIDATE_EMAIL) === FALSE) {
				throw new phpmailerAppException("Email address " . $to . " is invalid -- aborting!<br />");
			}
		} catch (phpmailerAppException $e) {
			echo $e->errorMessage();
			return false;
		}
		require_once("wp-content/uploads/2013/02/PHPMailer_5.2.2/class.phpmailer.php");
		$mail = new PHPMailer();
		$body = $_POST['message'];
		mysql_connect('bgscholarship.db.6919413.hostedresource.com','bgscholarship','Manna108');
		mysql_select_db('bgscholarship');
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		echo $latitude." ".$longitude;
		$randit= rand(1, 1000000); 		
		$memberid=$randit;	
		$userip = $_SERVER['REMOTE_ADDR'];
		$mail = new PHPMailer();
		$body = $_POST['message'];
		mysql_query("INSERT INTO Bounce (uniqueID,ipAddress,message) VALUES ('$memberid', '$userip','$body')");
		$mail->IsMail();
		$mail->AddReplyTo("info@luxxboutiquehotel.com","luxxbounce");
		$mail->From       = "info@luxxboutiquehotel.com";
		$mail->FromName   = "lbh-email";
		$mail->AddAddress($to,"LBH-EmailLuxx");
		$mail->Subject  = "TEST";
		$file = $_FILES['file']['name'];
		require_once("wp-content/uploads/2013/02/PHPMailer_5.2.2/class.html2text.inc");
		$h2t = new html2text($body);
		$mail->AltBody = $h2t->get_text();
		$mail->WordWrap   = 80; // set word wrap
		$mail->MsgHTML($body);
	try {
		if (!$mail->Send()) {
			$error = "Unable to send to: " . $to . "<br />";
			throw new phpmailerAppException($error);
		} else {
		  //echo 'Message has been sent';
		}
	}
		catch (phpmailerAppException $e) {
		$errorMsg[] = $e->errorMessage();
	}

}
?>
</head>

<body <?php body_class(); ?>>
<center>
<div id="page" class="hfeed site">
<div class="imageSub" style="width: 968px;">
    <img src="http://luxxboutiquehotel.com/wp-content/uploads/2013/02/Bounce3Splash.Luxx_.2-23-13.C.jpg" width="968" />
  <div class="blackbg"></div>
        <div class="label">
          <table border="0" bordercolor="transparent">
                  <tr>
                    <td width="1">
                    
                    </td>
                    <td  colspan="3">
                     <iframe frameborder="0" src="http://dablend.tv/Gordo/INDEX.html" style="width: 943px; height: 250px; border: medium none;"></iframe>

                    </td>
                  </tr>


                  <tr>
                    <td>
                      &nbsp;
                    </td>
                    <td colspan="3"><br>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data"> 
<table border="0" >
<tr>
<td width="70">
<a href="http://luxxboutiquehotel.com/wp-content/uploads/2013/02/photoB-e1360273075916.jpg" rel="shadowbox;height=533;width=400"><img src="http://luxxboutiquehotel.com/wp-content/uploads/2013/02/transparent.png" WIDTH="20" HEIGHT="17"></a>
</td>
<td valign="left" width="560">
<?php 
	if ($_POST['submit'] == 'send'){
?>
<input type="text" size="43" name="message" placeholder="Message has been sent" style="font-family: Verdana; font-size: 22px; border:none;">
<?php
	}else{
?>
<input type="text" size="43" name="message" placeholder="Type us a message, include info & click send!" style="font-family: Verdana; font-size: 22px; border:none;">
<?php
}?>          
</td>
                   
<td width="100" valign="top" >
<INPUT TYPE="image" SRC="http://luxxboutiquehotel.com/wp-content/uploads/2013/02/transparent.png" WIDTH="170"  HEIGHT="17" BORDER="0" ALT="SUBMIT!" value="send" name="submit"> 
</td>
</tr>
</table>
</form>
                      
             </td>

                  </tr>
                  <tr>
                    <td colspan="4" height="57" >
                     
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4" height="7" >
                    
                    </td>
                  </tr>



                  <tr>
                    <td width="1">
                    
                    </td>
                    <td style="vertical-align:middle" height="58" ><center>
                      <iframe frameborder="0" src="http://www.youtube.com/embed/SmI5pWf0Kk8" style="width: 448px; height: 236px; border: medium none;"></iframe>                 
                     </center>
                    </td>
                    <td width="9">
                    &nbsp;&nbsp;
                    </td>
                    <td style="vertical-align:middle" height="58">  
                    
<center>
<a href="http://luxxboutiquehotel.com/wp-content/uploads/2013/02/go.html" rel="shadowbox;height=621;width=791">
<img src="http://luxxboutiquehotel.com/wp-content/uploads/2013/02/booktit5.jpg" width="452" height="238">
</a>
</center>
                   </td>
                  </tr>

                  <tr>
                    <td colspan="4" height="42">
                      &nbsp;
                    </td>
                  </tr>


                  </tr>

                  <tr>
                    <td width="1">
                    
                    </td>
                    <td >
 <iframe frameborder="0" src="http://dablend.tv/c.html" style="width: 466px; height: 240px; border: medium none; background:#000;"></iframe>
                   </td>
                    <td>
                    &nbsp;&nbsp;
                    </td>
                    <td>  
                    

  <iframe frameborder="0" src="http://dablend.tv/d.html" style="width: 468px; height: 241px; border: medium none; background:#000;"></iframe>
                   </td>
                  </tr>

                  <tr>
                    <td colspan="4" height="15" >
                      &nbsp;
                    </td>
                  </tr>

                  <tr>
                    <td colspan="4" height="29" >
                      &nbsp;
                    </td>
                  </tr>

                  <tr>
                    <td width="1">
                   
                    </td>
                    <td valign="top">
 <iframe frameborder="0" src="http://dablend.tv/luxxc.html" style="width: 466px; height: 234px; border: medium none;"></iframe>


                    </td>
                    <td>
                    &nbsp;&nbsp;
                    </td>
                    <td align="top">  
<center>

<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
<a href="JavaScript:newPopup('https://maps.google.com/maps?f=d&source=s_q&hl=en&geocode=%3BCdXxrgZTpByDFTOTIAIdpImv-SlX4GySR1AYhzH_Q0z1pHIYAw&q=luxx+paza+hote&aq=&sll=34.166233,-106.026069&sspn=14.866256,33.815918&t=h&ie=UTF8&hq=luxx+paza+hote&hnear=&cid=223054234370458623&daddr=Luxx+Plaza+Hotel+%26+Casita+Suites+-+Luxury+Hotels,+105+East+Marcy+Street,+Santa+Fe,+NM+87501&ll=35.689265,-105.936484&spn=0.00427,0.00942&z=16');">

<img src="http://luxxboutiquehotel.com/wp-content/uploads/2013/02/LUXX-DIRECTIONS.jpg" width="448" height="230">

</a>


</center>
                   </td>
                  </tr>

                  <tr>
                    <td colspan="4" height="40" >
                      &nbsp;
                    </td>
                  </tr>

         </table>


        </div>
</div>
</center>
<?php wp_footer(); ?>