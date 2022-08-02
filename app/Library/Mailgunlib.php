<?php 
// namespace \App\Library;
namespace App\Library;

class Mailgunlib{

    
    function get_templates() {

        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, 'api:b864d2baf16d93244836e11136c1b185-835621cf-440ab6cf');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/sandbox3964ff7105f841c599a2b4ab73bb659c.mailgun.org/templates');

        $result = curl_exec($ch);
        curl_close($ch);
      
        return json_decode($result);
      }

     function send_email($first_name,$last_name,$template){

          $variables = [ 'first_name' =>$first_name,$last_name];

          // Generated @ codebeautify.org
          $ch = curl_init();

          curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/sandbox3964ff7105f841c599a2b4ab73bb659c.mailgun.org/messages');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POST, 1);
          $post = array(
              'from' => 'Mailgun Sandbox <postmaster@sandbox3964ff7105f841c599a2b4ab73bb659c.mailgun.org>',
              'to' => 'Sachhidanand <sachin.gupta@paynet.co.in>',
              'subject' => 'Hello',
              'template' => $template,
              'h:X-Mailgun-Variables' => json_encode($variables)
          );
          curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
          curl_setopt($ch, CURLOPT_USERPWD, 'api' . ':' . 'b864d2baf16d93244836e11136c1b185-835621cf-440ab6cf');
          
          $result = curl_exec($ch);
          if (curl_errno($ch)) {
              echo 'Error:' . curl_error($ch);
          }
          curl_close($ch);
              
         return  $result ;




     } 

}