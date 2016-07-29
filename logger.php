<?php
/**
  * Class for logging to a file
  * Loggingformats with or without timestamp and loglevel
	* Output to file or file+console
	* @version 20090706
	
	rb: removed the php4 style constructor, gives an error message: Strict Standards: Redefining already defined constructor for class Logger ...
	
  */
class Logger
{
	/**
	  * Log file resource.
	  */
	protected $log_file_handler;
	
	/**
	  * Path to the file.
	  */
	protected $log_level;
	
	/**
	  * Log level
	  */
	protected $log_file_path;

	/**
	  * Message only , 
	  * 0=datestamp and loglevel is displayed
	  * 1=NO datestamp or loglevel is displayed
	  */
	protected $message_only;

	
	/**
	  * Constructor
	  *
	  * @param string Path to file which will be 
	  * 		          used as a log file.
	  */
	//~ public function Logger($log_file_path)
	//~ {
		//~ $this->__construct($log_file_path);
	//~ }
	
	public function __construct($log_file_path)
	{		
		$this->log_file_handler = @ fopen($log_file_path, 'ab');
		
		if (!is_resource($this->log_file_handler)) {
			throw new Exception('Logger Exception: Cannot open file on path: ' . $log_file_path . '.');
		}	
		$this->log_file_path = $log_file_path;
	}
		
	/**
	  * Main function which process user request
	  * by getting log message and priority, and 
	  * forwarding those data to preparation and 
	  * formating. After that, generated text will 
	  * be written in the log file.
	  *
	  * @param string $message that'll be logged.
	  * @param str $log_level (ERR, INF (default), WARN etc)
	  * @param int $message_type (0=all (default, includes dat+timestamp and loglevel) 1=message only,2=write a START seperator,3=write a END seperator)
	  * @param int $console (0=do not echo log (default) 1=echo log 2=echo log xml)
	  * @return void
	  * @access public
	  */
	public function log($message, $log_level='INF' , $message_type=0 , $console=0)
	{
		if ($message_type==0){
			$msg=date('Ymd-His') . ' ' . str_pad($log_level,5) . ' ' . $message . "\n";
			$this->write_log($msg);
		}
		elseif ($message_type==1){
			$msg=$message . "\n";
			$this->write_log($msg);
		}
		elseif ($message_type==2){
			$msg="******************START $message *******************\n";
			$this->write_log($msg);
		}
		elseif ($message_type==3){
			$msg="******************END $message *********************\n";
			$this->write_log($msg);
		}else{
			$msg=date('Ymd-His') . ' ' . 'UNKNOWN ' . ' ' . $message . "\n";
			$this->write_log($msg);
		}
			if ($console==1){echo $msg;}
			if ($console==2){echo "<logmsg>" . $msg . "</logmsg>" ;}
	}
	
	/**
	  * Function for doing the actual writing of 
	  * contents to the log file.
	  *
	  * @param string Text that will be appended.
	  * @return void
	  * @access protected
	  */
	protected function write_log($text)
	{		
		if (false === @fwrite($this->log_file_handler, $text)) {
            throw new Exception("Logger Exception: Unable to write to log file.");
        }
			
		//@ fclose($this->log_file_handler);
	}
}

/**
  * Wrapper Class for logging using a debuglevel
  * 
  * 
  */
class Loglevel extends Logger
{
  /**
  *  @param string Path to file which will be used as a log file.
  *  @const LOG_LEVEL when not defined elsewhere the LOG_LEVEL is set to 0 
  */
  public function __construct($logfile) 
  { 
      parent::__construct($logfile); 
      if (! defined('LOGLEVEL'))
      {
        define ('LOGLEVEL' ,0);
      }
  } 

  /**
  * @param string $message that'll be logged.
  * @param str $log_level (ERR, INF (default), WARN etc)
  * @param int $level , default=0 ERR or WARN are raised to level 10 so we consider this as a maximum
  * @return void
  * @access public
  */
  public function loglevel($message, $log_level='INF', $level=0) 
  { 
    if ($log_level=='WARN' || $log_level=='ERR'){
      $level=10;
    }
    if ($level>=LOGLEVEL){
      parent::log($message,$log_level);
    }
  } 
}
?>
