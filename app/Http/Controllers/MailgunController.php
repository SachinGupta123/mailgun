<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Library\Mailgunlib;
// use Mailgun\Mailgun;
class MailgunController extends Controller
{

    public function index()
    {
        // show all blog posts

        $mailgun=new Mailgunlib();
        $template=$mailgun->get_templates();        
        return view('test',['template'=>$template->items]);
       
    }

    public function send_mail(Request $request)
    {

        $first_name=$request->first_name;
        $last_name=$request->last_name   ;
        $template=$request->template   ;         
       
        $mailgun=new Mailgunlib();
        $template=$mailgun->send_email($first_name,$last_name,$template);     

        echo json_encode($template);
        

    }
    
    public function get_template_api(){
        $mailgun=new Mailgunlib();
        $template=$mailgun->get_templates();        
        echo json_encode($template->items);
    }
    
}
