<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
use AfricasTalking\SDK\AfricasTalking;


class Sms_model extends CI_Model{


      public function send_sms($message, $recipients){


          // Set your app credentials
          $username   = $this->config->item('sms_username');
          $apiKey     = $this->config->item('sms_api_key');

          // Initialize the SDK
          $AT         = new AfricasTalking($username, $apiKey);

          // Get the SMS service
          $sms        = $AT->sms(); 

          // Set the numbers you want to send to in international format
          // $recipients = "+250727598920, +250727598920";

          // Set your message
          // $message    = $sms;

          // Set your shortCode or senderId
          $from       = $this->config->item('sms_short_code');

          try {
              // Thats it, hit send and we'll take care of the rest
              $result = $sms->send([
                  'to'      => $recipients,
                  'message' => $message,
                  'from'    => $from
              ]);

              // print_r($result);
              return TRUE;
          } catch (Exception $e) {
              return FALSE;
          }
      }
    public function fetch_sms($lastReceivedId){

          // Set your app credentials
          $username   = $this->config->item('sms_username');
          $apiKey     = $this->config->item('sms_api_key');

          // Initialize the SDK
          $AT       = new AfricasTalking($username, $apiKey);

          // Get the sms service
          $sms      = $AT->sms();

          // Our API will return 100 messages at a time back to you
          // starting with what you currently believe is the lastReceivedId.
          // Specify 0 for the first time you access the method
          // and the ID of the last message we sent you on subsequent calls
          // $lastReceivedId = 0;

          // $response = array();
          $i = 0;

          try {

              $messages = $sms->fetchMessages([
                  'lastReceivedId' => $lastReceivedId
              ]);
              // print_r($messages);die();
              return $messages;
          } catch (Exception $e) {
              // echo "Error: ".$e->getMessage();die();
              return FALSE;
          }


    }


}