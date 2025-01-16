
<?php
// include('include/connect.php');
include('include/sendmail.php');

if(isset($_POST['email']))
{
    if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']!="")
    {
        include('include/db.php');

        $data = array(
            'secret' => RECAPTCHA_SECRET_KEY,
            'response' => $_POST['g-recaptcha-response']
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($curl);
        $response = json_decode($response, true);


          // Success        
        if($response['success']){
            $arr['name'] = $_POST['firstName'];
            $arr['lastName'] = $_POST['lastName'];
            $arr['email'] = $_POST['email'];
            $arr['subject'] = $_POST['subject'];
            $arr['message'] = $_POST['message'];
            $arr['phone'] = $_POST['phone'];
            $arr['company'] = $_POST['company'];
            $to = ADMIN_MAIL;


           // $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

            $sql = "INSERT INTO `contactdata` (`id`, `firstname`, `lastname`, `company`, `email`, `phone`, `subject`, `message`) 
                                            VALUES (NULL, '".$arr['name']."', '".$arr['lastName']."', '".$arr['company']."', '".$arr['email']."', '".$arr['phone']."', '".$arr['subject']."', '".$arr['message']."')";
            $result = mysqli_query($conn, $sql);
            
            /* conent AP */

            /* Database entry */
            $subject1= "Thank you for Contact in ".$SITE_NAME;
            $mailcontent1 = '<table align="center" style="border:1px solid #cfcfcf;padding:10px;font-family:Verdana;font-size:12px" width="100%" cellpadding="5">
                <tbody>
                <tr style="">
                    <td colspan="2" style="padding:10px;"><img src="'.$SITE_URL.LOGO.'"></td>
                </tr>
                <tr>
                    <td colspan="2"><b>Dear '.$arr['name'].',</b></td>
                </tr>
                <tr>
                    <td colspan="2">Thank you for contact. Your contact has been submitted. We will get back to you soon.</td>
                </tr>

                <tr>
                    <td colspan="2" style="font-family:Verdana;font-size:12px">
                        Thank you,<br><a href="'.$SITE_URL.'" target="_blank">'.$SITE_URL.'</a>
                    </td>
                </tr>
            </tbody></table>';
            //SendHTMLMail($arr['email'],$subject1,$mailcontent1,$to);


            $subject= "New Contact mail";
            $mailcontent = '<table align="center" style="border:1px solid #cfcfcf;padding:10px;font-family:Verdana;font-size:12px" width="100%" cellpadding="5">
                <tbody>
                    <tr style="">
                            <td colspan="2" style="padding:10px;"><img src="'.$SITE_URL.LOGO.'"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Dear Admin,</b></td>
                    </tr>
                    <tr>
                        <td colspan="2">'.$arr['name'].' <a href="'.$arr['email'].'" target="_blank">'.$arr['email'].'</a> send you a contact mail</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <table style="font-family:Verdana,Geneva,sans-serif;font-size:12px;width:100%;border-collapse:collapse;border:1px solid #cfcfcf">
                        <tbody>                            
                            <tr>
                                <th width="80" style="background:#f47420;color:#fff;border:1px solid #ccc;font-size:1.1em;text-align:left;padding:5px 10px;display:table-cell;vertical-align:top"><b>Name </b></th>
                                <td width="782" style="font-size:12px;font-family:Verdana,Geneva,sans-serif;border:1px solid #ccc;padding:3px 7px 2px 7px">'.$arr['name'].' '.$arr['lastName'].'</td>
                            </tr>
                            <tr>
                                <th width="80" style="background:#f47420;color:#fff;border:1px solid #ccc;font-size:1.1em;text-align:left;padding:5px 10px;display:table-cell;vertical-align:top"><b>Email</b></th>
                                <td width="782" style="font-size:12px;font-family:Verdana,Geneva,sans-serif;border:1px solid #ccc;padding:3px 7px 2px 7px"><a href="mailto:'.$arr['email'].'" target="_blank">'.$arr['email'].'</a></td>
                            </tr>
                            
                            <tr>
                            <th width="80" style="background:#f47420;color:#fff;border:1px solid #ccc;font-size:1.1em;text-align:left;padding:5px 10px;display:table-cell;vertical-align:top"><b>Subject</b></th>
                            <td width="782" style="font-size:12px;font-family:Verdana,Geneva,sans-serif;border:1px solid #ccc;padding:3px 7px 2px 7px">'.$arr['subject'].'</td>
                            </tr>
                            <tr>
                            <th style="background:#f47420;color:#fff;border:1px solid #ccc;font-size:1.1em;text-align:left;padding:5px 10px;display:table-cell;vertical-align:top"><b>Company</b></th>
                            <td style="font-size:12px;font-family:Verdana,Geneva,sans-serif;border:1px solid #ccc;padding:3px 7px 2px 7px;text-align:justify">'.$arr['company'].'</td>
                            </tr>
                            
                            
                            <tr>
                            <th style="background:#f47420;color:#fff;border:1px solid #ccc;font-size:1.1em;text-align:left;padding:5px 10px;display:table-cell;vertical-align:top"><b>Phone no : </b></th>
                            <td style="font-size:12px;font-family:Verdana,Geneva,sans-serif;border:1px solid #ccc;padding:3px 7px 2px 7px;text-align:justify">'.$arr['phone'].'</td>
                            </tr>
                            <tr>
                            <th style="background:#f47420;color:#fff;border:1px solid #ccc;font-size:1.1em;text-align:left;padding:5px 10px;display:table-cell;vertical-align:top"><b>Message</b></th>
                            <td style="font-size:12px;font-family:Verdana,Geneva,sans-serif;border:1px solid #ccc;padding:3px 7px 2px 7px;text-align:justify">'.$arr['message'].'</td>
                            </tr>
                        </tbody>
                        </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="font-family:Verdana;font-size:12px">
                            Thank you,<br><a href="'.$SITE_URL.'" target="_blank">'.$SITE_URL.'</a>
                        </td>
                    </tr>
                </tbody>
                </table>';                    
            
            
                //SendHTMLMail($to, $subject, $mailcontent, $SITE_NAME.' <'.FROM_EMAIL.'>');
                $status = sendSMTPEmail($to, $subject, $mailcontent, FROM_EMAIL );

                if ( $status ){
                    header('location:'.$SITE_URL.'contact/send');exit;

                }else{
                    header('location:'.$SITE_URL.'contact/incorrect');exit;

                }

        } else {
            // Failure
            header('location:'.$SITE_URL.'contact/incorrect');
            exit;
        }
    }else{
        header('location:'.$SITE_URL.'contact/incorrect');exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
	<title>Get in Touch: Contact Mindforce for Expert Market Research Solutions</title>
	<meta name="description" content="Connect with Mindforce for all your market research needs. Our experienced team is here to assist you with high-quality research solutions tailored to your requirements. Reach out to us today to discuss your project and explore how we can help you achieve your research goals." />

<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Contact | Mindforce" />
<meta property="og:If you are on the lookout for a trusted research partner or aspiring to build your career with us, please share your requirement/profile with us./>
<meta property="og:url" content="https://mindforceresearch.com/contact" />
<meta property="og:site_name" content="mindforceresearch" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:label1" content="Est. reading time">
<meta name="twitter:data1" content="4 minutes">
    <!-- Mobile Specific Metas -->
    <?php include('./view/head.php');?>
<link rel="canonical" href="<?php echo $SITE_URL;?>contact" />
<style>
.main-panel__content {
  width: 100%;
  min-width: 400px;
  max-width: 650px;
  text-align: center;
  clear: both;
  box-shadow: 0px 0px 13px #0c0c0c7a;
  margin-left: auto;
  margin-right: auto;
  padding: 20px 20px;
  background: #fff;
  border-radius: 10px;
}
.frmlgn .main-panel__title, .main-panel__title {
  color: #f2f2f2;
  font-weight: 600;
}
.frmlgn .main-panel__title {
  font-size: 28px;
  color: #094990;
  margin-top: 10px;
  margin-bottom: 10px;
  text-align: center;
}
.main-panel__title {
  font-size: 30px;
  color: #323945;
  margin: 0 0 14px;
    margin-top: 0px;
    margin-bottom: 14px;
}
</style>
</head>
<body>
 	<?php include('./view/header.php');?>
    
    <div class="main" id="main">
        <section class="our-purpose our-what-we overflow">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="research-img wow fadeInLeft">
                            <img data-src="<?php echo $SITE_URL;?>images/connect.jpg" class="image-redius lozad " alt="connect">
                            <img data-src="<?php echo $SITE_URL;?>images/dot.svg" alt="Dot" class="dot-svg wow fadeInRight lozad ">
                            <div class="image-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 flex-align justify-right">
                        <div class="gray-round light_bg_round connect-round wow fadeInRight">
                            <div class="section-headding color-headding">
                                <h1 class="section-topik">Contact us</h1>
                                <h2 class="section-title"><span>Every great partnership begins</span> with a collective vision to do things differently</h2>
                                <p>If you are on the lookout for a trusted research partner or aspiring to build your career with us, please share your requirement/profile with us and we will be in touch with you soon.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-detail-main">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-md-12 order-r-2 flex-align z-index">
                        <div class="roundcircle wow fadeInLeft">
                            <div class="roundcircle-content color-wihte">  
                                <div class="section-headding">
                                    <h2 class="section-title"><span>Our</span> Offices</h2>
                                </div> 
                                <ul class="contaect-des">
                                    <li>
                                <label>India</label>
                                                                
                                <span class="label-icon" style="padding-left: 0px;">
                                    <span class="row"><span class="col-md-1"><i class="fa fa-building" aria-hidden="true"></i></span>							  
                                        <span class="col-md-11">Tower 5, Assotech Business Cresterra, Sector 135 Noida - 201305, India</span>						  
                                    </span> 
                                    <span class="phone label-icon">+91-0120 516 3900</span>							
                                </span>          
				        
                     </li>
                    <li>            
							<label>USA – Sales</label>			
                           <span class="label-icon" style="padding-left: 0px;">
								<span class="row"><span class="col-md-1"><i class="fa fa-building" aria-hidden="true"></i></span>							  
									<span class="col-md-11">7047 E. Greenway Parkway, Suite 250 Scottsdale, Arizona, 85254, US</span>						  
								</span> 
								<span class="phone label-icon">+1-480-993-1928</span>							
							</span> 																			
										
                   </li>
                    
					<li>
                     <label>Europe – Sales</label>
									
                           <span class="label-icon" style="padding-left: 0px;">
								<span class="row"><span class="col-md-1"><i class="fa fa-building" aria-hidden="true"></i></span>							  
									<span class="col-md-11">Mindforce Research Limited, 128 City Rd, London EC1V 2NX, UK
									
									<br>Company Number - 13424197
									</span>						  
								</span> 
								<span class="phone label-icon">+44-7950-457-222</span></span> 										
										
										
										
                                    </li>
                                </ul>
                                <ul class="contaect-des inquiries-mail">
                                    <li>
                                        <label>For general inquiries</label>
                                        <a href="mailto: info@mindforceresearch.com" class="mail label-icon">info@mindforceresearch.com</a>
                                    </li>
                                    <li>
                                        <label>For sales inquiries</label>
                                        <a href="mailto: sales@mindforceresearch.com" class="mail label-icon">sales@mindforceresearch.com</a>
                                    </li>
                                    <li>
                                        <label>For current openings</label>
                                        <a href="mailto: careers@mindforceresearch.com" class="mail label-icon">careers@mindforceresearch.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-12 order-r-1 flex-align justify-right" id="main-contact">
                         <div class="contact-form wow fadeInRight">
                         <div class="section-headding color-headding">
                        <h2 class="section-title">Get in touch<span> with us</span></h2>
                        </div>
                           <?php if ( isset($_GET['msg']) && $_GET['msg'] == 'send' ){ ?>
                              <div class="alert alert-success" >Thanks! Message sent successfully. We will contact you soon.</div>
                           <?php } ?>

                           <?php if ( isset($_GET['msg']) && $_GET['msg'] == 'incorrect' ){ ?>
                              <div class="alert alert-danger">Sorry! You message could not be sent. PLease try after some time.</div>
                           <?php } ?>
                           <div id="resultMessage" class="alert alert-danger" style="color:red"></div>

                            <form id="contact-form" class="contact-form" method="post" name="contact-form" action="contact" onsubmit="return check_contact(this)">
                              <input type="hidden" name="chkcont" id="chkcont" value="" />
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name*" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="lastName" id="lastName" class="form-control" placeholder="last Name*" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="company" id="company"  class="form-control" placeholder="Company*" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email*" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone*" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject*" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control"  name="message" id="message"  placeholder="MESSAGE*"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 contact-us-captha">
                                        <div class="form-group">
                                            <div id="recaptcha-demo" class="g-recaptcha margi-y15" data-sitekey="<?php echo RECAPTCHA_SITE_KEY; ?>" data-callback="onSuccess"></div>
                                         </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12" id="ahtml">
                                        <!-- <input type="hidden" value="1" name="submit" />  -->

                                        <button type="button" name="submitcontact" id="submitcontact" value="1" class="btn-oreng form-submit">SUBMIT <i class="fa fa-angle-right" aria-hidden="true"></i></button> 
                                        <!-- <input type="submit" value="SUBMIT " name="submit" class="btn-oreng form-submit"><i class="fa fa-angle-right" aria-hidden="true"></i> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <div class="col-xl-5 col-lg-5 col-md-12 order-r-1" id="confirm-consent" style="display:none">
                         <div class="contact-form  fadeInRight">
                         <div class="section-headding color-headding">
                        <h2 class="section-title">Get in touch<span> with us</span></h2>
                        </div>

							<section  style="margin-top: 110px; z-index: 3;">
								<div class=" panel-wrapper frmlgn sgnup mb-auto w-50 ml-5 mt-5  css-69d1u9">
									<div class="main-panel__content main-panel__content--login">
										<div class="text-left">
											<h1 class="main-panel__title mb-1">CONSENT NOTICE</h1>
											<!-- <div style="height: 270px; overflow-y: auto; position: inherit;">
												<ul style="margin: 0px; padding: 15px;">
													<li><i class="fa fa-hand-o-right" aria-hidden="true" style="color:#094990"></i> We need your explicit consent to process your personal data necessary to process your personal data with us in order to invite you to in participating our surveys and help us with your valuable insights while earning rewards for
														your participation.</li>
													<li><i class="fa fa-hand-o-right" aria-hidden="true" style="color:#094990"></i> You have read, and understood our <a class="signupbtn" href="/privacy-notice" target="_blank">Privacy Notice</a></li>
													<li><i class="fa fa-hand-o-right" aria-hidden="true" style="color:#094990"></i> You have a right to withdraw your consent at any time. You can withdraw your consent by send an email to <a href="mailto:dpo@mindforcereaserach.com">dpo@mindforcereaserach.com</a></li>
													<li><i class="fa fa-hand-o-right" aria-hidden="true" style="color:#094990"></i> For any issue concerning your personal data processing, please reach out to our Data protection office at <a href="mailto:dpo@mindforcereaserach.com">dpo@mindforcereaserach.com</a></li>
													<li><i class="fa fa-hand-o-right" aria-hidden="true" style="color:#094990"></i> We will do our best to address your concerns within a reasonable period or period specified by the Data protection law applicable to you.</li>
													<li><i class="fa fa-hand-o-right" aria-hidden="true" style="color:#094990"></i> In case you are not satisfied with our redressal efforts, you may (if you so desire) approach regional Data Protection Board.</li>
												</ul>
											</div> -->
											<!-- <div style="margin-top: 10px;">I have read and understood the terms and conditions of this notice, I am clicking this Agree button to give my explicit consent to Mindforce Research to use/continue to use my personal data collected by them for the purpose(s) specified
												in this notice.</div><br> -->
                                            <div style="height: 270px; overflow-y: auto; position: inherit;">
												<ul style="margin: 0px; padding: 15px;">
                                                    <li><i class="fa fa-hand-o-right" aria-hidden="true" style="color:#094990"></i>
                                                        We respect your privacy and are dedicated to safeguarding your personal data. Before proceeding, we require your informed consent to collect, process, and store your information.
                                                    </li>
                                                    <li><i class="fa fa-hand-o-right" aria-hidden="true" style="color:#094990"></i>

                                                        Our Privacy Notice will be sent to your phone or email, explaining your rights, and detailing how your data will be used.
                                                        You have the right to withdraw consent or exercise your data protection rights at any time by accessing the Principal Rights section on our homepage.
                                                    </li>
                                                    <li><i class="fa fa-hand-o-right" aria-hidden="true" style="color:#094990"></i>
                                                        For any concerns regarding the handling of your personal data, please contact us through the Principal Rights section on our homepage, and we will promptly address your inquiries.
                                                    </li>
                                                    <li><i class="fa fa-hand-o-right" aria-hidden="true" style="color:#094990"></i>
                                                        If our response does not meet your expectations, you may also contact your local Data Protection Authority.
                                                    </li>

                                                </ul>
											</div>
                                            <div style="margin-top: 10px;">
                                                By proceeding, you confirm that you have read, understood, and agree to the collection and use of your personal data in line with our Privacy Notice.
                                            </div>

										</div>
                                        <div id="consentResultMessage" class="alert alert-danger" style="color:red; padding:10px;font-size:14px;"></div>

										<div class="pf-form__textfield1">
											<button type="button" class="btn-common" value="agree" style="width: 40%;" onclick="return agree();">Agree</button>
											<button type="button" class="btn-oreng" value="disagree" style="width: 40%;" onclick="return disagree();">Disagree</button>
										</div>
									</div>
								</div>
							</section>
                        </div>
                    </div>
                			
				
				</div>
            </div>
        </section>

    </div> <?php include('./view/footer.php');?>
   
    <script type="text/javascript" src="<?php echo $SITE_URL;?>js/contact.js"></script> 
<script>

$( document ).ready(function() {
    $("#submitcontact").click(function(){
        $("#consentResultMessage").html("");
        $("#resultMessage").html("");

        if($("#firstName").val()=="" || $("#lastName").val()=="" || $("#company").val()=="" || $("#email").val()=="" ||$("#phone").val()=="" || $("#subject").val()=="" 
        || $("#message").val()==""){ 
            $('#submitcontact button').trigger('click');
            $("#contact-form").submit();
        }else{
            $("#main-contact").hide();
            $("#confirm-consent").show();
        }
    }); 
   
});


function agree(){
   
    $.post("http://192.168.2.219/main-website/consent",
    {
        name: $("#firstName").val()+" "+$("#lastName").val(),
        email: $("#email").val(),
        phone: $("#phone").val()
    },
    function(data, status){
        console.log(data)
        data = JSON.parse(data);
        if(data.status ===1){ 
           
            $("#chkcont").val('ok');
            // $("#main-contact").show();
            // $("#confirm-consent").hide();
            $("#contact-form").submit();
        }else{
            $("#consentResultMessage").html("Sorry! Something went wrong while submitting consent!<br> PLease try after sometime");
        }
    });

	
}

function disagree(){
    $("#confirm-consent").hide();
    $("#main-contact").show();
    $('html, body').animate({
        scrollTop: $("#main-contact").offset().top
    }, 500);
    $("#resultMessage").html("You need to give consent to submit the enquiry!");
    
}

</script>   


</body>
</html>