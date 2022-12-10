<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Monitoring Inatek Email class.
 *
 * @class swiftmailer
 * @author Rifal Ardiansyah
 */
class swiftmailer 
{
	var $CI;
    var $username;
    var $password;
    
	/**
	 * Constructor - Sets up the object properties.
	 */
	function __construct()
    {
        $this->CI       =& get_instance();
        require_once SWIFT_MAILSERVER;
        
        $this->username = 'admin@otc-indonesia.com';
        $this->password = 'bLEEXecVJFcYmWcRo7AbOQ';
	}
	
    /**
	 * Send email function.
	 *
     * @param string    $to         (Required)  To email destination
     * @param string    $subject    (Required)  Subject of email
     * @param string    $message    (Required)  Message of email
     * @param string    $from       (Optional)  From email
     * @param string    $from_name  (Optional)  From name email
	 * @return Mixed
	 */
	function send($to, $subject, $message, $from = '', $from_name = ''){       
		try{
            //Create the Transport
            $transport  = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587, 'ssl')
                ->setUsername($this->username)
                ->setPassword($this->password);
            //Create the message
            $mail       = Swift_Message::newInstance();
            //Give the message a subject
            $mail->setSubject($subject)
                 ->setFrom(array($from => $from_name))
                 ->setTo($to)
                 ->setBody($message->plain)
                 ->addPart($message->html, 'text/html');
                 
            //Create the Mailer using your created Transport
	        $mailer     = Swift_Mailer::newInstance($transport);
            //Send the message
	        $result     = $mailer->send($mail);	
			return $result;
		}catch (Exception $e){
            return false;
		}
	}
    
    /**
	 * Send email pesan function.
     * 
     * @param string    $to         (Required)  To email destination
     * @param string    $subjek     (Required)  Subject of message
     * @param string    $pesan      (Required)  Message content
	 * @return  Mixed
	 */
    function send_email_pesan($to,$subjek,$pesan){
        if ( !$to ) return false;
        if ( !$subjek ) return false;
        if ( !$pesan ) return false;
        
        $plain_down         = $pesan;
        $html_down          = $pesan;
        
        $message            = new stdClass();
        $message->plain     = $plain_down;
        $message->html      = $html_down;
        
        $send               = $this->send($to, $subjek, $message, "admin@inatek.com", 'Admin Monitoring Inatek');
        return $send;
    }
}

/*
CHANGELOG
---------
Insert new changelog at the top of the list.
-----------------------------------------------
Version	YYYY/MM/DD  Person Name		Description
-----------------------------------------------
1.0.0   2015/13/22  Rifal           - Created this changelog
*/