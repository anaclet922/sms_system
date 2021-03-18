<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Email_model extends CI_Model{


    public function mailAgent($email,$message, $subject){    

    // edit below
         $from = webSettings()['site_email'];
         $fromemail = webSettings()['site_name'];
         $reply = webSettings()['site_email'];

         $subject = $subject;
         $body = "$message";

    // send code, do not edit unless you know what your doing
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Reply-To: <$reply>\r\n"; 
        $header .= "Return-Path: Support <$reply>\r\n"; 
        $header .= "From: $from\r\n"; 
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
     
      
       if (mail("$email", "$subject", "$body", $header)) {
          return true;
       }
       else{
        return false;
       }
  }


}