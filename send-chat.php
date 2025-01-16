<?php 

include('include/connect.php');
include('include/sendmail.php');

if(isset($_POST['submit']))
{
    // if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']!="")
    // {

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

        if ( $response['success'] ) {

            // Success        
   
        $arr['email'] = $_POST['email'];
        $arr['message'] = $_POST['message'];
        
        $to = ADMIN_MAIL;

        $subject= "New Chat mail";
        $mailcontent = '<table align="center" style="border:1px solid #cfcfcf;padding:10px;font-family:Verdana;font-size:12px" width="100%" cellpadding="5">
            <tbody>
                <tr style="">
                        <td colspan="2" style="padding:10px;"><img src="'.$SITE_URL.LOGO.'"></td>
                </tr>
                <tr>
                    <td colspan="2"><b>Dear Admin,</b></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <table style="font-family:Verdana,Geneva,sans-serif;font-size:12px;width:100%;border-collapse:collapse;border:1px solid #cfcfcf">
                    <tbody>                            
                        <tr>
                            <th width="80" style="background:#f47420;color:#fff;border:1px solid #ccc;font-size:1.1em;text-align:left;padding:5px 10px;display:table-cell;vertical-align:top"><b>Email</b></th>
                            <td width="782" style="font-size:12px;font-family:Verdana,Geneva,sans-serif;border:1px solid #ccc;padding:3px 7px 2px 7px"><a href="mailto:'.$arr['email'].'" target="_blank">'.$arr['email'].'</a></td>
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
            echo json_encode(array('status'=> 'success','message' => 'Chat message sent successfully.') );
        }else{
            echo json_encode(array('status'=> 'error','message' => 'Chat message sending failed1.') );
        }

        //echo json_encode(array('status'=> 'success','message' => 'Chat message sent successfully.') );

        } else {
            echo json_encode(array('status'=> 'error','message' => 'Chat message sending failed2.') );
        }
    // }
    // else
    // {
    //     echo json_encode(array('status'=> 'error','message' => 'Chat message sending failed3.') );
    // }
}
?>