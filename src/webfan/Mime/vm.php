<?php
namespace webfan\Mime;
use frdl;
define('___BLOCK_WEBFAN_MIME_VM_RUNNING_STUB___', true);
/**
 * Copyright  (c) 2017, Till Wehowski
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 * 3. Neither the name of frdl/webfan nor the
 *    names of its contributors may be used to endorse or promote products
 *    derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY frdl/webfan ''AS IS'' AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL frdl/webfan BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * 
 * 
 */
	/*
 if('cli' === PHP_SAPI){
  
 	chdir(dirname( $_SERVER['argv'][0]));
 }

  */
$included_files = get_included_files();  
if(!___BLOCK_WEBFAN_MIME_VM_RUNNING_STUB___ && !in_array(__FILE__, $included_files) || __FILE__===$included_files[0]) {
    run(__FILE__);
} 

  
 function run($file = null){
 	$args = func_get_args();
 	header_remove();
 	$MimeVM = new vm($args[0]);
 	$MimeVM('run');
 }


class Context
{
	
}


class Env
{
	
}


class Response
{
	
}





 class vm
 {
 	
 	const TOK = '__halt_compiler();';
 	
 	public $e_level = E_USER_ERROR;
  	protected $_exportNamespace = false;	
 	protected $Request = false;
  	protected $Response = false;	
 	
 	protected $raw = false;
 	protected $MIME = false;
 	
 	protected $__FILE__ = false;
 	protected $buf;
 	
 	//stream
 	protected $IO = false;
 	protected $file = false;
 	protected $host = false;
 	protected $mode = false;
 	protected $offset = false;
 	
 	
 	protected $Context = false; 	
 	protected $Env = false;
 	
 	protected $initial_offset = 0;
 	
 	protected $php = array();

 	
 	public function __construct($file = null, $offset = 0){
 		$this->buf = &$this;
 		
 	 	if(null===$file)$file=__FILE__;
 	 	$this->__FILE__ = $file;
 	 	if(__FILE__===$this->__FILE__){
			$this->offset = $this->getAttachmentOffset(); 
		}else{
			$this->offset = $offset;
		}

        $this->initial_offset = $this->offset;
		
		
		$this->php = array(
		     '<?' => array(
		     
		     ),
		     '#!' => array(
		     
		     ),
		     '#' => array(
		     
		     ),
		);
		
		MimeStubApp::God()->addStreamWrapper( 'frdl', 'mime', $this,  true  ) ;
 	}
 	
 	
 	
 	
 	final public function __destruct(){
			
		try{
			 if(is_resource($this->IO))fclose($this->IO);

		}catch(\Exception $e){
			trigger_error($e->getMessage(). ' in '.__METHOD__,  $this->e_level);
		}
	}
	
	
	
	
   public function __set($name, $value)
    {
    	if('location'===$name){
    		$code =$this->__toString();
			file_put_contents($value, $code);
			return null;
		}
    	
         $trace = debug_backtrace();
         trigger_error(
            'Undefined property via __set(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
            
            
         return null;
    }    
    	 
	 
	 
    public function getAttachmentOffset(){
	    return __COMPILER_HALT_OFFSET__;
    } 
    
    
   public function __toString()
   {
 	 	  // 	$document = $this->document;	
	 		  $code = $this->exports;	
	 		  if(__FILE__ === $this->__FILE__) 	{
			   	 $php = substr($code, 0, $this->getAttachmentOffset());
			  }else{
			  	 $php = substr($code, 0, $this->initial_offset);
			  }
	 		 
	 		 
	 		 $php = str_replace('define(\'___BLOCK_WEBFAN_MIME_VM_RUNNING_STUB___\', true);', 'define(\'___BLOCK_WEBFAN_MIME_VM_RUNNING_STUB___\', false);', $php);
    		
    		 $php = preg_replace("((\r\n|\n)?namespace\swebfan;(\r\n|\n)use\sfrdl;(\r\n|\n))", "\r\n", $php);
	 		 
           //   $mime = substr($code, $this->initial_offset, strlen($code));
              $mime = $this->document;
           
	 	 //   $new_raw = 'TEST';//$p[0];
	 	 //   $new_raw .= "\r\n";
	 	 //   $new_raw .= self::TOK;
	 	  //  $new_raw .= $this->MIME;
	 	// 	return $this->getFileAttachment($this->__FILE__, $this->initial_offset);   	
	 	//return $php."\r\n".self::TOK.$mime;
	 	return $php.$mime;
   }   
     
  public function __get($name)
    {
       // echo "Getting '$name'\n";
      //  if (array_key_exists($name, $this->data)) {
      //      return $this->data[$name];
      //  }
     switch($name){
	 	case 'exports':	 
	 		return $this->getFileAttachment($this->__FILE__, 0);
	 	break;
	 	case 'location':	 
	 		return $this->__FILE__;
	 	break;
	 	case 'document':
	 		if(false===$this->raw){
	 			$this->raw=$this->getFileAttachment($this->__FILE__, $this->initial_offset);
	 		}
	 		if(false===$this->MIME){
	 			$this->MIME=MimeStub::create($this->raw);
	 		}
	 		return $this->MIME;
	 	break;
	 	default:
         return null;	 	
	 	break;
	 }

         $trace = debug_backtrace();
         trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
            
            
         return null;
    }
   
   
	
    public function __invoke()
    {
    	$args = func_get_args();
 	
 	 if(false===$this->raw)	{
	 	$this->raw = $this->getFileAttachment($this->__FILE__, $this->initial_offset);
	 }
 		
		   	
 		$this->Request = new Request();
 		$this->Env = new Env();
		$this->Context = new Context();
		$this->Response = new Response();
		$res = &$this;
		
        if(0<count($args)){
        $i=-1;
		foreach($args as $arg){
		  $i++;
		  	
				if(is_object($arg) && get_class($this->Request)===get_class($arg)){
					$this->Request = &$arg;
				}elseif(is_object($arg) && get_class($this->Env)===get_class($arg)){
					$this->Env = &$arg;
				}elseif(is_object($arg) && get_class($this->Context)===get_class($arg)){
					$this->Context = &$arg;
				}elseif(is_object($arg) && get_class($this->Response)===get_class($arg)){
					$this->Response = &$arg;
				}
				
	    if(is_array($arg)){
             $this->Context = new Context($arg);
		}if(is_string($arg)){
    		$cmd = $arg;
    		if('run'===$arg){
				$res = call_user_func_array(array($this, '_run'), $args);
			}else{
    		
			$u = parse_url($cmd);
			$c = explode('.',$u['host']);
		    $c = array_reverse($c);
		    $tld = array_shift($c);
		    $f = false;
			if('frdl'===$u['scheme']){
				if('mime'===$tld){
					if(!isset($args[$i+1])){
						$res = $this->getFileAttachment($cmd, 0);
						$f = true;
					}else if(isset($args[$i+1])){
						//@todo write
					}
				}
			}	
			
			 if(false===$f){
			 	//todo...
			 	if('#'===substr($cmd, 0, 1)){
                     $this->php['#'][]=$cmd;
				}elseif('#!'===substr($cmd, 0, 2)){
				     $this->php['#!'][]=$cmd;
				}elseif('<?'===substr($cmd, 0, 2)){
				    $this->php['<?'][]=$cmd;
				}else{
			 		$parent = (isset($this->MIME->parent) && null !== $this->MIME->parent) ? $this->MIME->parent : null;
					$this->MIME=MimeStub::create($cmd, $parent);					
				}
			 }
			}

		}			
				
			}
		}elseif(0===count($args)){
			$res = &$this->buf;
		}
				      	

 	
    	
       return $res;
    }      
 	protected function _run(){
 	 	die('test');
 	} 	
 	

    public function getFileAttachment($file = null, $offset = null){
    	if(null === $file)$file = &$this->file;
    	if(null === $offset)$offset = $this->offset;
    	
		$IO = fopen($file, 'r');
		
        fseek($IO, $offset);
        try{
			$buf =  stream_get_contents($IO);
			if(is_resource($IO))fclose($IO);
		}catch(\Exception $e){
			$buf = '';
			if(is_resource($IO))fclose($IO);
			trigger_error($e->getMessage(),  $this->e_level);
		}
        
        return $buf;
	}	
	
	
     public function stream_open($url, $mode, $options = STREAM_REPORT_ERRORS, &$opened_path = null){
    	$u = parse_url($url);
    	$this->file = str_replace('/', DIRECTORY_SEPARATOR, $u['path']);
    	//$this->file = $u['path']; 
    	// $this->offset = $u['fragment'];
    	$this->offset = 0;
    	$this->host = $u['host'];
    	$this->mode = $mode;
    	
    	echo '<pre>Test: '.$this->mode.':'.print_r($u, true);
    	return false;
    	
        $this->IO = fopen($this->file, $this->mode);
          if(!$this->IO)return false;	
  		
  		fseek($this->IO, $this->offset);
  		
  		 
		 $this->pos = $this->stream_tell();      
		 $this->eof = $this->stream_eof();  
          			  
	    return true;					  
    }
    public function dir_closedir(){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function dir_opendir($path , $options){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function dir_readdir(){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function dir_rewinddir(){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function mkdir($path , $mode , $options){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function rename($path_from , $path_to){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function rmdir($path , $options){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
 	public function stream_cast($cast_as){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
 	public function stream_close(){
       fclose($this->IO);
	}
    public function stream_eof(){
    	return feof($this->IO);
	}
    public function stream_flush(){
		return fflush($this->IO);
	}
    public function stream_lock($operation){return flock($this->IO, $operation);}
    public function stream_set_option($option , $arg1 , $arg2){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function stream_stat(){
		 return array(  
		          'mode' => $this->mode,
		          'size' => filesize($this->file),
		 );
	}
    public function unlink($path){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function url_stat($path , $flags){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function stream_read($count){
        return fread($this->IO, $count);
	}
    public function stream_write($data){
    	return fwrite($this->IO, $data);
    }
    public function stream_tell(){
     	return ftell($this->IO);
    }
    public function stream_seek($offset, $whence){
 		return fseek($this->IO, $offset);
	}
    public function stream_metadata($path, $option, $var){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
	
/*
    public function stream_open($url, $mode, $options = STREAM_REPORT_ERRORS, &$opened_path = null){
    	$u = parse_url($url);
	    $c = explode('.',$u['host']);
		$c = array_reverse($c);
		
		$this->mode = $mode;
		
		if($c[0]==='code')$tld = array_shift($c);
		
		
        if(class_exists('\webdof\wHTTP') && class_exists('\webdof\Http\Client') && class_exists('\webdof\Webfan\APIClient')){ 
	      $this->Client = new \webdof\Webfan\APIClient();
		  $this->Client->prepare( 'http',
                          'interface.api.webfan.de',
                          'GET',
                          self::$id_interface,  //  i1234 
                          'software',
                          array(),  //post
                          array(),  //cookie
                          self::$api_user,
                          self::$api_pass,
                          'class',
                          'php',   //format ->hier: "php"
                          'source',
                           array(self::$id_repositroy,implode(".",array_reverse($c))),
                           array(), //get
                          1,
                          E_USER_WARNING);
						  
		 $this->eof = false;
		 $this->pos = 0;
    	 try{
               $r = $this->Client->request();
			   if(intval($r['status']) !== 200)return false;
			   $this->data = $r['body'];
	
		 }catch(Exception $e){
			trigger_error('Cannot process the request to '.$url, E_USER_WARNING);
			return false;
		 }  	
	   }else{
	      $url = 'http://interface.api.webfan.de/v1/'.self::$id_interface.'/software/class/'.self::$id_repositroy.'/'.implode(".",array_reverse($c)).'/source.php';
		  $data = file_get_contents($url);
		  if(false === $data){
		  	 return false;			  
		  }else{
		  	 $this->data = $data;
		  }
	   }
				  
	    return true;					  
    }
    public function dir_closedir(){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function dir_opendir($path , $options){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function dir_readdir(){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function dir_rewinddir(){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function mkdir($path , $mode , $options){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function rename($path_from , $path_to){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function rmdir($path , $options){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
 	public function stream_cast($cast_as){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
 	public function stream_close(){
         $this->Client = null;
	}
    public function stream_eof(){
    	$this->eof = ($this->pos >= strlen($this->data));
    	return $this->eof;
	}
    public function stream_flush(){
    	//echo $this->data;
    	$this->pos  = strlen($this->data);
		return $this->data;
	}
    public function stream_lock($operation){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function stream_set_option($option , $arg1 , $arg2){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function stream_stat(){
		 return array(  
		          'mode' => $this->mode,
		          'size' => strlen($this->data) * 8,
		 );
	}
    public function unlink($path){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function url_stat($path , $flags){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function stream_read($count){
    	 if($this->stream_eof())return  '';
		
    	 $maxReadLength = strlen($this->data) - $this->pos;
         $readLength = min($count, $maxReadLength);

        $p=&$this->pos;
        $ret = substr($this->data, $p, $readLength);
        $p +=  $readLength;
        return (!empty($ret)) ? $ret : '';  	
	}
    public function stream_write($data){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function stream_tell(){return $this->pos;}
    public function stream_seek($offset, $whence){
    	
		
		
		$l=strlen($this->data);
        $p=&$this->pos;
        switch ($whence) {
            case SEEK_SET: $newPos = $offset; break;
            case SEEK_CUR: $newPos = $p + $offset; break;
            case SEEK_END: $newPos = $l + $offset; break;
            default: return false;
        }
        $ret = ($newPos >=0 && $newPos <=$l);
        if ($ret) $p=$newPos;
        return $ret;
	}
    public function stream_metadata($path, $option, $var){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
   
   */
 }




 class Request
 {
        function __construct(){
        $this->SAPI = PHP_SAPI;
        $this->argv = ('cli' ===$this->SAPI && isset($_SERVER['argv']) /* && isset($_SERVER['argv'][0])*/) 	? $_SERVER['argv'][0] : false;
       	$this->protocoll = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? 'https' : 'http';
		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->server_name = $_SERVER['SERVER_NAME'];
		$this->origin = $_SERVER['HTTP_ORIGIN'];
		$this->get = $_GET;
		$this->post = $_POST;
		$this->cookies = $_COOKIE;
		$this->session = $_SESSION;
		$this->uri = $_SERVER['REQUEST_URI'];
		$this->parsed = parse_url($this->protocoll.'://'.$this->server_name.$this->uri);
		switch($this->method){
		       case 'HEAD' :
		       case 'GET' :
		           $this->request = $_GET;
		          break;
		        case 'POST' : 
		        case 'PUT' : 
		        case 'DELETE' : 
		           $this->request = $_POST;
		          break;
		        default : 
		            $this->request = $_REQUEST;	
		          break;	
		}
         }
         
 }

/**
namespace Riverline\multipart;


*  https://github.com/Riverline/multipart-parser 
* 
 * Class Part
 * @package Riverline\MultiPartParser
 * 
Copyright (c) 2015-2016 Romain Cambien

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"),
to deal in the Software without restriction, including without limitation
the rights to use, copy, modify, merge, publish, distribute, sublicense,
and/or sell copies of the Software, and to permit persons to whom the Software
is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included
in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
 */


 
class MimeStub
{
 const NS = __NAMESPACE__;
 const DS = DIRECTORY_SEPARATOR;
 const FILE = __FILE__;
 const DIR = __DIR__;
		
 const numbers = '0123456789';
 const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
 const specials = '!$%^&*()_+|~-=`{}[]:;<>?,./';
 	
	protected static $__i = -1;


	//protected $_parent;
    
    
    protected $_id = null;
    protected $_p = -1;   
    
    
    /**
     * @var array
     */
    protected $headers;

    /**
     * @var string
     */
    protected $body;
    
    protected $_parent = null;

    /**
     * @var Part[]
     */
    protected $parts = array();

    /**
     * @var bool
     */
    protected $multipart = false;


    protected $modified = false;
    
    protected $contentType = false;
    protected $encoding = false;
    protected $charset = false;
    protected $boundary = false;
    



 
   
   
   
protected function _defaultsRandchars ($opts = array()) {
  $opts = array_merge(array(
      'length' =>  8
  ), $opts);
  return array(
    'length' =>  (is_int($opts['length'])) ? $opts['length'] : 8,
    'numeric' => (is_bool($opts['numeric'])) ? $opts['numeric'] : true,
    'letters' => (is_bool($opts['letters'])) ? $opts['letters'] : true,
    'special' =>  (is_bool($opts['special'])) ? $opts['special'] : false
  );
}

protected function _buildRandomChars ($opts = array()) {
   $chars = '';
  if ($opts['numeric']) { $chars += self::numbers; }
  if ($opts['letters']) { $chars += self::letters; }
  if ($opts['special']) { $chars += self::specials; }
  return $chars;
}

public function generateBundary($opts = array()) {
  $opts = $this->_defaultsRandchars($opts);
  $i = 0;
  $rn = '';
      $rnd = '';
      $len = $opts['length'];
      $randomChars = $this->_buildRandomChars($opts);
  for ($i = 1; $i <= $len; $i++) {
    $rnd += substr($randomChars, ($rn = mt_rand(1, strlen($randomChars))), ($rn + 1));
  }
  return $rnd;
}   
    
    
    public function __set($name, $value)
    {
         $trace = debug_backtrace();
         trigger_error(
            'Undefined property via __set(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
            
            
         return null;
    }    
    
    
  public function __get($name)
    {
       // echo "Getting '$name'\n";
      //  if (array_key_exists($name, $this->data)) {
      //      return $this->data[$name];
      //  }
     switch($name){
	 	case 'parent':	 
	 		return $this->_parent;
	 	break;
	 	case 'id':	 
	 		return $this->_id;
	 	break;
	 	case 'nextChild':	
	 	    $this->_p=++$this->_p;
	 	    if($this->_p >= count($this->parts)/* -1*/)return false; 
	 		return (is_array($this->parts)) ? $this->parts[$this->_p] : null;
	 	break;
	 	case 'next':	 
	 		return $this->nextChild;
	 	break;
	 	case 'rewind':	 
	 	    $this->_p=-1;
	 		return $this;
	 	case 'root':	 
	 	    if(null === $this->parent || (get_class($this->parent) !== get_class($this)))return $this;
	 		return $this->parent->root;
	 	break;
	 	case 'isRoot':	 
	 		return ($this->root->id === $this->id) ? true : false;
	 	break;
	 	case 'lastChild':	 
	 		return (is_array($this->parts)) ? $this->parts[count($this->parts)-1] : null;
	 	break;
	 	case 'firstChild':	 
	 		return (is_array($this->parts) && isset($this->parts[0])) ? $this->parts[0] : null;
	 	break;
	 	default:
         return null;	 	
	 	break;
	 }

         $trace = debug_backtrace();
         trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
            
            
         return null;
    }
   
     public function __call($name, $arguments)
    {
    	

    	if('append'===$name){
    		if(!isset($arguments[0]))$arguments[0]='';
			$this->parts[] = new self($arguments[0], $this);
			return $this;
		}
    	
        // Note: value of $name is case sensitive.
         $trace = debug_backtrace();
         trigger_error(
            'Undefined property via __call(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
            
            
         return null;
    }

    /**  As of PHP 5.3.0  */
    public static function __callStatic($name, $arguments)
    {
    	
     	if('run'===$name){
			return call_user_func_array('run', $arguments);
		}
    	   	
    	
     	if('vm'===$name){
     		if(0===count($arguments)){
				return new vm();
			}elseif(1===count($arguments)){
				return new vm($arguments[0]);
			}elseif(2===count($arguments)){
				return new vm($arguments[0], $arguments[1]);
			}
     	  // return call_user_func_array(array(webfan\MimeVM, '__construct'), $arguments);
     	   return new vm();
		}
    	
	
    	
    	 if('create'===$name){
    	 	if(!isset($arguments[0]))$arguments[0]='';
    	 	if(!isset($arguments[1]))$arguments[1]=null;
		 	return new self($arguments[0], $arguments[1]);
		 }
        // Note: value of $name is case sensitive.
         $trace = debug_backtrace();
         trigger_error(
            'Undefined property via __callStatic(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
            
            
         return null;
    }  
   
    public function getContentType()
    {
    	$this->contentType=$this->getMimeType();
        return $this->contentType;
    }
    
    
    public function headerName($headName)
    {
      $headName = str_replace('-', ' ', $headName);
      $headName = ucwords($headName);
      return preg_replace("/\s+/", "\s", str_replace(' ', '-', $headName));
    }
 
 


    /**
     * @param string $input A base64 encoded string
     *
     * @return string A decoded string
     */
    public static function urlsafeB64Decode($input)
    {
        $remainder = strlen($input) % 4;
        if ($remainder) {
            $padlen = 4 - $remainder;
            $input .= str_repeat('=', $padlen);
        }
        return base64_decode(strtr($input, '-_', '+/'));
    }

    /**
     * @param string $input Anything really
     *
     * @return string The base64 encode of what you passed in
     */
    public static function urlsafeB64Encode($input)
    {
        return str_replace('=', '', strtr(base64_encode($input), '+/', '-_'));
    }
    
    
 
 
 
    /**
    static public function getHeaderOptions($header)
    {
        list(,$options) = self::parseHeaderContent($header);

        return $options;
    }
     * MultiPart constructor.
     * @param string $content
     * @throws \InvalidArgumentException
     */
    protected function __construct($content, &$parent = null)
    {
    	$this->_id = ++self::$__i;
    	$this->_parent = $parent;
    	
        // Split headers and body
        $splits = preg_split('/(\r?\n){2}/', $content, 2);

        if (count($splits) < 2) {
            throw new \InvalidArgumentException("Content is not valid, can't split headers and content");
        }

        list ($headers, $body) = $splits;

        // Regroup multiline headers
        $currentHeader = '';
        $headerLines = array();
        foreach (preg_split('/\r?\n/', $headers) as $line) {
            if (empty($line)) {
                continue;
            }
            if (preg_match('/^\h+(.+)/', $line, $matches)) {
                // Multi line header
                $currentHeader .= ' '.$matches[1];
            } else {
                if (!empty($currentHeader)) {
                    $headerLines[] = $currentHeader;
                }
                $currentHeader = trim($line);
            }
        }

        if (!empty($currentHeader)) {
            $headerLines[] = $currentHeader;
        }

        // Parse headers
        $this->headers = array();
        foreach ($headerLines as $line) {
            $lineSplit = explode(':', $line, 2);
            if (2 === count($lineSplit)) {
                list($key, $value) = $lineSplit;
                // Decode value
                $value = mb_decode_mimeheader(trim($value));
            } else {
                // Bogus header
                $key = $lineSplit[0];
                $value = '';
            }
            // Case-insensitive key
            $key = strtolower($key);
            if (!isset($this->headers[$key])) {
                $this->headers[$key] = $value;
            } else {
                if (!is_array($this->headers[$key])) {
                    $this->headers[$key] = (array)$this->headers[$key];
                }
                $this->headers[$key][] = $value;
            }
        }

        // Is MultiPart ?
        $contentType = $this->getHeader('Content-Type');
        $this->contentType=$contentType;
        if ('multipart' === strstr(self::getHeaderValue($contentType), '/', true)) {
            // MultiPart !
            $this->multipart = true;
            $boundary = self::getHeaderOption($contentType, 'boundary');
            $this->boundary=$boundary;

            if (null === $boundary) {
                throw new \InvalidArgumentException("Can't find boundary in content type");
            }

            $separator = '--'.preg_quote($boundary, '/');

            // Get multi-part content
            if (0 === preg_match('/'.$separator.'\r?\n(.+?)\r?\n'.$separator.'--/s', $body, $matches)) {
                throw new \InvalidArgumentException("Can't find multi-part content");
            }

            // Get parts
            $parts = preg_split('/\r?\n'.$separator.'\r?\n/', $matches[1]);

            foreach ($parts as $part) {
                //$this->parts[] = new self($part, $this);
                $this->append($part);
            }
        } else {
        	
            // Decode
            $encoding = $this->getEcoding();
            switch ($encoding) {
                case 'base64':
                    $body = $this->urlsafeB64Decode($body);
                    break;
                case 'quoted-printable':
                    $body = quoted_printable_decode($body);
                    break;
            }

            // Convert to UTF-8 ( Not if binary or 7bit ( aka Ascii ) )
            if (!in_array($encoding, array('binary', '7bit'))) {
                // Charset
                $charset = self::getHeaderOption($contentType, 'charset');
                if (null === $charset) {
                    // Try to detect
                    $charset = mb_detect_encoding($body) ?: 'utf-8';
                }
                $this->charset=$charset;
            
                // Only convert if not UTF-8
                if ('utf-8' !== strtolower($charset)) {
                    $body = mb_convert_encoding($body, 'utf-8', $charset);
                }
            }

            $this->body = $body;
        }
    }


      
    public function __toString()
    {
    	$boundary = $this->getBoundary($this->isMultiPart());
    	$s='';
    	foreach($this->headers as $hname => $hvalue){
			$s.= $this->headerName($hname).': '.$hvalue."\r\n";
		}
		
		$s.= "\r\n" ;
		if ($this->isMultiPart()) $s.=  "--" ;
		$s.= $boundary ;
		if ($this->isMultiPart()) $s.= "\r\n" ;	
		
		
		if ($this->isMultiPart()) {
            foreach ($this->parts as $part) {            	
               $s.=  (get_class($this) === get_class($part)) ? $part : $part->__toString() . "\r\n" ;
            }
             $s.= "\r\n"."--" . $boundary .  '--';
	    }else{

			$s.= $this->getBody(true, $encoding);
        }		
		
	     if (null!==$this->parent && $this->parent->isMultiPart() && $this->parent->lastChild->id !== $this->id){
            $s.= "\r\n" . "--" .$this->parent->getBoundary() . "\r\n";		
	     }
        return $s;
    }   
    
    public function getEcoding()
    {
    	$this->encoding=strtolower($this->getHeader('Content-Transfer-Encoding'));
        return $this->encoding;
    }
    
    public function getCharset()
    {
      //  return $this->charset;
       $charset = self::getHeaderOption($this->getMimeType(), 'charset');
        if(!is_string($charset)) {
          // Try to detect
          $charset = mb_detect_encoding($this->body) ?: 'utf-8';
        }
      $this->charset=$charset;
      return $this->charset;       
    }
    
    
    public function getBoundary($generate = true)
    {
        $this->boundary = self::getHeaderOption($this->getHeader('Content-Type'), 'boundary');
        if(true === $generate && $this->isMultiPart() 
           && (!is_string($this->boundary) || 0===strlen(trim($this->boundary))) 
        ){
			$size = 8;
			if(8 < count($this->parts))$size = 16;
			if(16 < count($this->parts))$size = 24;
			if(75 < count($this->parts))$size = 32;
			if(200 < count($this->parts))$size = 64;
			$opts = array(
			  'length' => $size
			);
			$this->boundary =$this->generateBundary($opts);
			$this->setHeaderOption('Content-Type', $this->boundary, 'boundary');
		}
        return $this->boundary;
    }   
        /** 
     * @param string $key
     * @param mixed  $default
     * @return mixed
     */
    public function mod()
    {
       $this->modified = true;
       return $this;
    }     
    
    public function setHeader($key, $value)
    {
       $this->mod();
       $this->headers[$key]=$value;
       return $this;
    }     
    
   public function setHeaderOption($headerName, $value = null, $opt = null)
    {
       $this->mod();
    	$old_header_value = $this->getHeader($headerName);
        
        if(null===$opt && null !==$value){
			 $this->headers[$headerName]=$value;
		}else if(null !==$opt && null !==$value){
             list($headerValue,$options) = self::parseHeaderContent($old_header_value);
             $options[$opt]=$value;
			 $new_header_value = $headerValue;
			 foreach($options as $o => $v){
			 	$new_header_value .= ';'.$o.'="'.$v.'"';
			 }
			 $this->setHeader($headerName, $new_header_value);
		} 
         

       return $this;
    }
    
              

    /**
     * @return bool
     */
    public function isMultiPart()
    {
        return $this->multipart;
    }

    /**
     * @return string
     * @throws \LogicException if is multipart
     */
    public function getBody($reEncode = false, &$encoding = null)
    {
        if ($this->isMultiPart()) {
            throw new \LogicException("MultiPart content, there aren't body");
        } else {
	    	$body = $this->body;
	    	
	     if(true===$reEncode){
            $encoding = $this->getEcoding();
            switch ($encoding) {
                case 'base64':
                    $body = $this->urlsafeB64Encode($body);
                    break;
                case 'quoted-printable':
                    $body = quoted_printable_encode($body);
                    break;
            }

            // Convert to UTF-8 ( Not if binary or 7bit ( aka Ascii ) )
            if (!in_array($encoding, array('binary', '7bit'))) {
                // back de-/encode 
                if (    'utf-8' !== strtolower(self::getHeaderOption($this->getMimeType(), 'charset'))
                     && 'utf-8' === mb_detect_encoding($body)) {
                    $body = mb_convert_encoding($body, self::getHeaderOption($this->getMimeType(), 'charset'), 'utf-8');
                }elseif (    'utf-8' === strtolower(self::getHeaderOption($this->getMimeType(), 'charset'))
                     && 'utf-8' !== mb_detect_encoding($body)) {
                    $body = mb_convert_encoding($body, 'utf-8', mb_detect_encoding($body));
                }
            }   		 	
		 }	
         
            
            return $body; 
        }
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string $key
     * @param mixed  $default
     * @return mixed
     */
    public function getHeader($key, $default = null)
    {
        // Case-insensitive key
        $key = strtolower($key);
        if (isset($this->headers[$key])) {
            return $this->headers[$key];
        } else {
            return $default;
        }
    }

    /**
     * @param string $content
     * @return array
     */
    static protected function parseHeaderContent($content)
    {
        $parts = explode(';', $content);
        $headerValue = array_shift($parts);
        $options = array();
        // Parse options
        foreach ($parts as $part) {
            if (!empty($part)) {
                $partSplit = explode('=', $part, 2);
                if (2 === count($partSplit)) {
                    list ($key, $value) = $partSplit;
                    $options[trim($key)] = trim($value, ' "');
                } else {
                    // Bogus option
                    $options[$partSplit[0]] = '';
                }
            }
        }

        return array($headerValue, $options);
    }

    /**
     * @param string $header
     * @return string
     */
    static public function getHeaderValue($header)
    {
        list($value) = self::parseHeaderContent($header);

        return $value;
    }

    /**
     * @param string $header
     * @return string
     */
    static public function getHeaderOptions($header)
    {
        list(,$options) = self::parseHeaderContent($header);

        return $options;
    }

    /**
     * @param string $header
     * @param string $key
     * @param mixed  $default
     * @return mixed
     */
    static public function getHeaderOption($header, $key, $default = null)
    {
        $options = self::getHeaderOptions($header);

        if (isset($options[$key])) {
            return $options[$key];
        } else {
            return $default;
        }
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        // Find Content-Disposition
        $contentType = $this->getHeader('Content-Type');

        return self::getHeaderValue($contentType) ?: 'application/octet-stream';
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        // Find Content-Disposition
        $contentDisposition = $this->getHeader('Content-Disposition');

        return self::getHeaderOption($contentDisposition, 'name');
    }

    /**
     * @return string|null
     */
    public function getFileName()
    {
        // Find Content-Disposition
        $contentDisposition = $this->getHeader('Content-Disposition');

        return self::getHeaderOption($contentDisposition, 'filename');
    }

    /**
     * @return bool
     */
    public function isFile()
    {
        return !is_null($this->getFileName());
    }

    /**
     * @return Part[]
     * @throws \LogicException if is not multipart
     */
    public function getParts()
    {
        if ($this->isMultiPart()) {
            return $this->parts;
        } else {
            throw new \LogicException("Not MultiPart content, there aren't any parts");
        }
    }

    /**
     * @param string $name
     * @return Part[]
     * @throws \LogicException if is not multipart
     */
    public function getPartsByName($name)
    {
        $parts = array();

        foreach ($this->getParts() as $part) {
            if ($part->getName() === $name) {
                $parts[] = $part;
            }
        }

        return $parts;
    }
}



/**
 * 
 * Copyright  (c) 2015, Till Wehowski
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 * 3. All advertising materials mentioning features or use of this software
 *    must display the following acknowledgement:
 *    This product includes software developed by the frdl/webfan.
 * 4. Neither the name of frdl/webfan nor the
 *    names of its contributors may be used to endorse or promote products
 *    derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY frdl/webfan ''AS IS'' AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL frdl/webfan BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
//namespace frdl\webfan\Autoloading;
 
abstract class MimeStubLoader
{
     abstract function  autoload_register  ();
     abstract function  addLoader  ( $Autoloader ,  $throw  =  true ,  $prepend  =  true );
     abstract function  unregister  ( $Autoloader );
     abstract function  addPsr0  ( $prefix ,  $base_dir ,  $prepend  =  true );
     abstract function  addNamespace  ( $prefix ,  $base_dir ,  $prepend  =  true );
     abstract function  addPsr4  ( $prefix ,  $base_dir ,  $prepend  =  true ) ;
     abstract function  Psr4  ( $class ) ;
     abstract function  loadClass  ( $class );
     abstract function  Psr0  ( $class ) ;
     abstract function  routeLoadersPsr0  ( $prefix ,  $relative_class ) ;
     abstract function  setAutloadDirectory  ( $dir ) ;
     abstract function  routeLoaders  ( $prefix ,  $relative_class );
     abstract protected function  inc  ( $file );
     abstract function  classMapping  ( $class ) ;
     abstract function  class_mapping_add  ( $class ,  $file , & $success  =  null );
     abstract function  class_mapping_remove  ( $class ) ;
     abstract function  autoloadClassFromServer  ( $className ) ;
    
   
}



class MimeLoader extends MimeStubLoader
{
    const NS = __NAMESPACE__;
    const DS = DIRECTORY_SEPARATOR;
    const SESSKEY = __CLASS__;			
	/**
	 * PKI
	 */
    const DISABLED = 0;
    const OPENSSL = 1;
    const PHPSECLIB = 2;

    const E_NORSA = 'No RSA library selected or supported';
    const E_NOTIMPLEMENTED = 'Sorry thisd is not implemented yet';    
    

    const B_SIGNATURE = "-----BEGIN SIGNATURE-----\r\n";
    const E_SIGNATURE = "-----END SIGNATURE-----";

    const B_CERTIFICATE = "-----BEGIN CERTIFICATE-----\r\n";
    const E_CERTIFICATE = "-----END CERTIFICATE-----";

    const B_PUBLIC_KEY = "-----BEGIN PUBLIC KEY-----\r\n";
    const E_PUBLIC_KEY = "-----END PUBLIC KEY-----";

    const B_RSA_PRIVATE_KEY = "-----BEGIN RSA PRIVATE KEY-----\r\n";
    const E_RSA_PRIVATE_KEY = "-----END RSA PRIVATE KEY-----";

    const B_KEY = "-----BEGIN KEY-----\r\n";
    const E_KEY = "-----END KEY-----";
 
    const B_LICENSEKEY = "-----BEGIN LICENSEKEY-----\r\n";
    const E_LICENSEKEY = "-----END LICENSEKEY-----";


    public $sid;
	
    protected $lib;
	
	
	 
	/**
	 * Stream Properties
	 */
	protected $Client;
	public $context = array();
	protected $data;
	protected $chunk;
	public $buflen;
	protected $pos = 0;
	protected $read = 0; 
	public static $id_repositroy;
	public static $id_interface;	
	public static $api_user;
	public static $api_pass;	
	protected $eof = false;
	protected $mode;
	
	
        protected $dir_autoload;
	protected static $config_source;
        protected $autoloaders = array();
        protected $autoloadersPsr0 = array();
	protected $classmap = array();
	protected $isAutoloadersRegistered = false;
		
	protected $interface;
	
	/**
	 *  "Run Time Cache" / Buffer
	 */
	protected static $rtc;
	
	protected static $instances = array();
	
	 
	protected $buf = array(
	  'config' => array(),
          'opt' => array(),
          'sources' => array(),
	);
	
	function __construct($pass = null) 
	 {
	   $this->sid = count(self::$instances);
	   self::$instances[$this->sid] = &$this;	
	   
	   $this->interface = null;	
	   self::$config_source = array( 
	 'install' =>  false,
         'dir_lib' => false,
         'session' => false,
         'zip_stream' => false,
         'append_eval_to_file' => false,
         
	   );
	   $this->dir_autoload = '';	
	   self::repository(((!isset($_SESSION[self::SESSKEY]['id_repository']))?'frdl':$_SESSION[self::SESSKEY]['id_repository']));	 
	   self::$id_interface =  'public';	 
	   self::$api_user = '';
	   self::$api_pass = '';
	   $this->Defaults(true);
	   $this->set_pass($pass);
	 }


  public function j(){
  	 return App::God();
  }
	 
	 
  public static function top(){
  	  if(0 === count(self::$instances))return new self;
  	  return self::getStream(0);
  }	 
	 
	 
  public static function getStream($sid){
  	  return (isset(self::$instances[$sid])) ? self::$instances[$sid] : null;
  }	 	 
	 
  public static function repository($id = null){
  	if($id !== null)$_SESSION[self::SESSKEY]['id_repository'] = $id;
	self::$id_repositroy = &$_SESSION[self::SESSKEY]['id_repository'];
	return self::$id_repositroy;
  }	 
	 
  public function set_interface(Array &$interface = null){
  	 $this->interface = (is_array($interface)) ? $interface : null;
	 return $this;
  }	 
	 
  public function config_source($key = null, $value = null){
  	   if(!is_string($key))return self::$config_source;
	   if(!isset(self::$config_source[$key]))return false;
	   self::$config_source[$key] = $value;
	   return true;
  }  
	 

	 
  public function Defaults($set = false){
          $config = array( 
  'host' => null,
  'IP' => null,
  'uid' => 0,
  'encrypted' => true,
  'e_method' => 2,
  'c_method' => 1,
  'source' => $this->config_source(),
  'ERROR' => E_USER_WARNING,
  'ini' => array( 
      'display_errors_details' => false,
      'pev' => array( 
           'CUSTOM' => null,
           'REQUEST' => true,
	       'HOST' => $_SERVER['SERVER_NAME'],
	     //  'IPs' => $App->getServerIp(),
	       'PATH' => null,
	   ),
	  ), 
 
     
	); 
	
	
		  
		  if($set === true){
		  	  $this->set_config($config); 	
		  }
		  
		  return array(
		     'config' => $config,
		  );
		
	} 

	protected function set_pass($pass = null){
	   $this->pass = (is_string($pass)) ? $pass : mt_rand(10000,9999999).sha1($_SERVER['SERVER_NAME']).'faldsghdfshfdshjfdhjr5nq7q78bg2nda  jgf jtrfun56m8rtjgfjtfjtzurtnmrt tr765  $bbg r57skgmhmh';
	} 
	
	public function mkp(){
		
		$this->set_pass(null);
	     return $this;
	}
	
	public function set_config(&$config){
		$this->config = (is_array($config)) ? $config : $this->buf['config'];
		if(isset($this->config['source']) && is_array($this->config['source']))self::$config_source = &$this->config['source'];
        return $this;		
	}
	 



    public function installSource($class,&$code, &$error ='', &$config_source = null){
    	if($config_source === null)$config_source = &self::$config_source;
		if($config_source['install'] !== true)return null;
		if(!isset($code['php']))return false;
		if(isset($code['installed']) && $code['installed'] === true)return true;
		
	     $bs = new \frdl\webfan\Serialize\Binary\bin();
		 $code['doc'] = $bs->unserialize($this->unpack_license($code['d']));
			 		
		 $error = '';
		 $r = false;
		 
	    if(isset($config_source['dir_lib']) && is_string($config_source['dir_lib']) && is_dir($config_source['dir_lib'])){
	         $dir  = rtrim($config_source['dir_lib'],  self::DS . ' '). self::DS ;	
		     $filename = $dir.str_replace('\\', self::DS, $class).'.php'; 
			 $dir = realpath(dirname($filename)).self::DS;	
			 if(!is_dir($dir)){
			   if(!mkdir($dir, 0755, true)){
			   	  $error = 'Cannot create directory '.$dir.' and cannot save class '.$class.' in '.__METHOD__.' '.__LINE__;
			   	  trigger_error($error,E_USER_WARNING);
			   }
			 }		
             
			 if($error === ''){
               $file_header = "/**\n* File generated by frdl Application Composer : class : ".__CLASS__."\n**/\n";
			   $code = '<?php '."\n".$file_header."\n\$filemtime = ".time().";\n\$class_documentation = ".var_export($code['doc'], true).";\n".$code['php']."\n";
			 
			   $fp = fopen($filename, 'wb+');
	           fwrite($fp,$code);
	           fclose($fp);
			   if(file_exists($filename)){
			     $code['installed'] = true;
				 $r = true;  
			   }else{
			      $error = 'Cannot create file '.$filename.' and cannot save class '.$class.' in '.__METHOD__.' '.__LINE__;
			   	  trigger_error($error,E_USER_WARNING);
			   }
			 }
		}
			 
			 
			 
			 
	   return $r;	
    }



	
	public function patch_autoload_function($class){
		if(function_exists('__autoload'))return __autoload($class);
	}
		 
	public function autoload_register(){
		if(false !== $this->isAutoloadersRegistered){
		      trigger_error('Autoloadermapping is already registered.',E_USER_NOTICE);
			  return $this;
		}
        $this->addLoader(array($this,'Psr4'), true, true);	
        $this->addLoader(array($this,'Psr0'), true, false);				
	    $this->addLoader(array($this,'classMapping'), true, false);	
        $this->addLoader(array($this,'patch_autoload_function'), true, false);	
        $this->addLoader(array($this,'autoloadClassFromServer'), true, false);	
        $this->isAutoloadersRegistered = true;
        return $this;
	} 
    
    public function addLoader($Autoloader, $throw = true, $prepend = false){
       spl_autoload_register($Autoloader, $throw, $prepend);
	   return $this;
    }

    public function unregister( $Autoloader)
     {
        spl_autoload_unregister($Autoloader);
		return $this;
     } 	
	 
	 
	/**
	 * Psr-0
	 */ 				 
    public function addPsr0($prefix, $base_dir, $prepend = false)
    {
       $prefix = trim($prefix, '\\') . '\\';
       $base_dir = rtrim($base_dir, self::DS) . self::DS;	   
       if(isset($this->autoloadersPsr0[$prefix]) === false) {
            $this->autoloadersPsr0[$prefix] = array();
        }

      if($prepend) {
            array_unshift($this->autoloadersPsr0[$prefix], $base_dir);
        } else {
            array_push($this->autoloadersPsr0[$prefix], $base_dir);
        }
		
		return $this;
    }
	
	/**
	 * Psr-4
	 */ 			 
    public function addNamespace($prefix, $base_dir, $prepend = false)
    {
       return $this->addPsr4($prefix, $base_dir, $prepend);
    }
    public function addPsr4($prefix, $base_dir, $prepend = false)
    {
    
       $prefix = trim($prefix, '\\') . '\\';
       $base_dir = rtrim($base_dir, self::DS) . self::DS;	   
       if(isset($this->autoloaders[$prefix]) === false) {
            $this->autoloaders[$prefix] = array();
        }
	
      if($prepend) {
            array_unshift($this->autoloaders[$prefix], $base_dir);
        } else {
            array_push($this->autoloaders[$prefix], $base_dir);
        }
		
		return $this;
	}	 
    


    
    public function Psr4($class)
    {
    
        $prefix = $class;
        while (false !== $pos = strrpos($prefix, '\\')) {
            $prefix = substr($class, 0, $pos + 1);
            $relative_class = substr($class, $pos + 1);
            $file = $this->routeLoaders($prefix, $relative_class);
			if ($file) {
                return $file;
            }
            $prefix = rtrim($prefix, '\\');   
        }
		
        return false;       
    } 
    public function loadClass($class)
    {
       return $this->Psr4($class);
    }	
	
	
	
   public function Psr0($class)
    {
        $prefix = $class;
        while (false !== $pos = strrpos($prefix, '\\')) {
            $prefix = substr($class, 0, $pos + 1);
            $relative_class = substr($class, $pos + 1);
            $file = $this->routeLoadersPsr0($prefix, $relative_class);
            if ($file) {
                return $file;
            }
            $prefix = rtrim($prefix, '\\');   
        }
        return false;  
    }
  		
   public function routeLoadersPsr0($prefix, $relative_class)
    {
        if (!isset($this->autoloadersPsr0[$prefix])) {
            return false;
        }
        foreach ($this->autoloadersPsr0[$prefix] as $base_dir) {		
          if (null === $prefix || $prefix.'\\' === substr($relative_class, 0, strlen($prefix.'\\'))) {
            $fileName = '';
            $namespace = '';
            if (false !== ($lastNsPos = strripos($relative_class,  '\\'))) {
                $namespace = substr($relative_class, 0, $lastNsPos);
                $relative_class = substr($relative_class, $lastNsPos + 1);
                $fileName = str_replace('\\', self::DS, $namespace) . self::DS;
            }
            $fileName .= str_replace('_', self::DS, $relative_class) /* . '.php'  */;
            $file = ($base_dir !== null ? $base_dir . self::DS : '') . $fileName;
            if ($this->inc($file)) {
                return $file;
            }
          }
		}
	   return false;
    }		


    public function setAutloadDirectory($dir){
  	   if(!is_dir($dir))return false;
	   $this->dir_autoload = $dir;
	   if(substr($this->dir_autoload,-1,1) !== self::DS)$this->dir_autoload.=self::DS;
	   return true;	
    }	 
  		
    public function routeLoaders($prefix, $relative_class)
    {

        if (!isset($this->autoloaders[$prefix])) {
            return false;
        }
        foreach ($this->autoloaders[$prefix] as $base_dir) {
        	
            $file = $base_dir
                  . str_replace('\\', self::DS, $relative_class)
                  /* . '.php'  */
				   ;

		
            if ($this->inc($file)) {
                return $file;
            }
        }
        return false;
    }	
	
    protected function inc($file)
    {
    	if(substr($file,-4,4) === '.php'){
    		$file = $file; 
    	}else{
    		$file.= '.php';
    	}
		$file2= substr($file,0,-4).'.inc';
	
       if(file_exists($file)) {
             require $file;
            return true;
        }elseif(file_exists($file2)) {
             require $file2;
            return true;
        }
		
		
        return false;
    }	
		 
		 
	
	public function classMapping($class){
		if(isset($this->classmap[$class])){
            if ($this->inc($this->classmap[$class])) {
                return $this->classmap[$class];
            }			
		}
		
		return false;
	}
	
	
	public function class_mapping_add($class, $file, &$success = null){
		if(file_exists($file)){
		    $this->classmap[$class] = $file;
			$success = true;
	    }else{
			$success = false;
	    }
		
	   return $this;
	}
    
	public function class_mapping_remove($class){
		if(isset($this->classmap[$class]))unset($this->classmap[$class]);
	    return $this;
	}	
    		 
		 
		 
	protected function source_check($str){	 
		 $start = 'array';
		 $badwords = array('$',';', '?', '_', 'function ', 'class ');
	
		 foreach($badwords as $num => $s){
		 	if(strpos($str, $s)!== false)return false;
		 }
		 
		 if(substr($str,0,strlen($start)) !== $start)return false;
		 if(!preg_match('/[a-f0-9]{40}/', $str))return false;
		 
		 
		 return true;
	} 
	public function autoloadClassFromServer($className){
	
		  $classNameOrig = $className;
		  if(class_exists($className))return;	
		  if (!in_array('webfan', stream_get_wrappers())){
		  	trigger_error('Streamwrapper webfan is not registered. Call to App::init() required.', E_USER_ERROR);
			return;
		  }
		  $className = str_replace('\\', '.', $className);
		  $className = ltrim($className, ' .');
		  $RessourceFileName = 'webfan://'.$className.'.code';
		   
		  $fp = fopen($RessourceFileName, 'r');
		  $source = '';
		  if($fp){
		  	clearstatcache(); 
			clearstatcache(true,$RessourceFileName);   
			$stat = fstat($fp);
			$bufsize = ($stat['size'] <= 8192) ? $stat['size'] : 8192;
		  	while(!feof($fp) ){
		        $source .= fread($fp, $bufsize);
			}
		     fclose($fp);
		  }else{
		  	return false;
		  }
		  
		  
		if($source ===false || $source ==='' ){
	   			trigger_error('Cannot get source from the webfan code server ('.$RessourceFileName.')! '.__METHOD__.' '.__LINE__, E_USER_WARNING);
		     	return false;
            }
				  
	    $scheck = $this->source_check($source);			  
		if($scheck !== true){
	   			trigger_error('The source loaded from the code server looks malicious ('.$scheck.' '.$RessourceFileName.')! '.__METHOD__.' '.__LINE__, E_USER_WARNING);
		     	return false;			
		}  
		
		if(eval('$data = '.$source.';')===false){
	   			trigger_error('Cannot process the request to the source server by APIDClient ('.$RessourceFileName.')! '.__METHOD__.' '.__LINE__, E_USER_WARNING);
		     	return false;
            }
		
		$_defaults = $this->Defaults();
		$config = $_defaults["config"];
		$opt = (isset($data['opt'])) ? $data['opt'] : $this->getOpt();
		$code = $data['source'];

        $sources = array();
		$sources[$classNameOrig] = $code; 

        if(is_array($this->interface)){
        	$opt['pass'] = $this->interface['API_SECRET'];
			$opt['rot1'] = $this->interface['rot1'];
			$opt['rot2'] = $this->interface['rot2'];
        }
        

		if($this->loadSources($sources,$opt, $config )===false){
		   		trigger_error('Cannot process the request to the source server by APIDClient ('.$className.')! '.__METHOD__.' '.__LINE__, E_USER_WARNING);
		     	return false;		
		}
		
		return $RessourceFileName;	  
	}
	 

    public function make_pass_3(&$opt){
             if(isset($opt['pwdstate']) && $opt['pwdstate'] === 'decrypted')return true;
             if(isset($opt['pwdstate']) && $opt['pwdstate'] === 'error')return false;
            if(!isset(self::$rtc['CERTS']))self::$rtc['CERTS'] = array();
            $hash = sha1($opt['CERT']);
            $u = parse_url($opt['CERT']);
          $url = $opt['CERT'];
           if(!isset(self::$rtc['CERTS'][$hash]) && ($u === false || !isset(self::$rtc['CERTS'][$url])))
               {
                    if($u !== false && count($u) >1 && !preg_match("/CERTIFICATE/", $opt['CERT']) ){
                     if(isset($u['scheme']) && isset($u['host'])){
                $h = explode('.',$u['host']);
                 $h = array_reverse($h);
                 if($h[0] === 'de' && ($h[1] === 'webfan' || $h[1] === 'frdl' )){
                 if(class_exists('\webdof\Http\Client')){
                 $Http = new \webdof\Http\Client();
                $post = array();
                $send_cookies = array();
                $r = $Http->request($opt['CERT'], 'GET', $post, $send_cookies, E_USER_WARNING);
                }else{
                	$c = file_get_contents($opt['CERT']);
					$r = array();
					$r['status'] = (preg_match("/CERTIFICATE/",$c)) ? 200 : 400;
					$r['body'] = $c;
                }
				
                if(intval($r['status'])===200){
               $CERT = trim($r['body']);
               }else{
                 $opt['pwdstate'] = '404';
                return false;
              }
               }
           }else{
                   $CERT = trim(file_get_contents($opt['CERT']));
                }
                   $key = $url;
                  if(!isset(self::$rtc['CERTS'][$key]))self::$rtc['CERTS'][$key] = array();
                 self::$rtc['CERTS'][$key]['crt'] = $CERT;
             }elseif(preg_match("/CERTIFICATE/", $opt['CERT'])){
             	    $key = $hash;
                    if(!isset(self::$rtc['CERTS'][$key]))self::$rtc['CERTS'][$key] = array();
                    $CERT = utf8_encode($opt['CERT']);
					$CERT=$this->loadPK($CERT);
					if($CERT===false){
				   	  trigger_error('Cannot procces certificate info in '.__METHOD__.' line '.__LINE__, E_USER_WARNING);
					  return false;
				   }
					$CERT=$this->save($CERT, self::B_CERTIFICATE, self::E_CERTIFICATE);
					self::$rtc['CERTS'][$key]['crt'] =$CERT;
				   
              }else{
				   	  trigger_error('Cannot procces certificate info in '.__METHOD__.' line '.__LINE__, E_USER_WARNING);
					  return false;
				   }
                 }elseif(isset(self::$rtc['CERTS'][$hash])){
                     $key = $hash;
                  }elseif(isset(self::$rtc['CERTS'][$url])){
                      $key = $url;
                  }else{
                  	 trigger_error('Cannot procces certificate info in '.__METHOD__.' line '.__LINE__, E_USER_WARNING);
					 return false;
                  }


            $this->setLib(1);
        if(!isset(self::$rtc['CERTS'][$key]['PublicKey'])){
              $PublicKey = $this->getPublKeyByCRT(self::$rtc['CERTS'][$key]['crt']);
             self::$rtc['CERTS'][$key]['PublicKey'] = $PublicKey;
           }
            $success = $this->decrypt($opt['pass'],self::$rtc['CERTS'][$key]['PublicKey'],$new_pass) ;
          if($success === true){
            $opt['pass'] = $new_pass;
           $opt['pwdstate'] = 'decrypted';
            }else{
               $opt['pwdstate'] = 'error';
		      // unset(self::$rtc['CERTS'][$key]);
            }
           return $success;
    } 

    protected function load(&$code, Array &$config = null, &$opt = array('pass' => null, 'rot1' => 5, 'rot2' => 3), $class = null){
	      $p = $this->_unwrap_code(((is_string($code)) ? $code : $code['c']));
		  
		  if(isset($opt['e']) && is_bool($opt['e']))$config['encrypted'] = $opt['e'];
		  if(isset($opt['m']))$config['e_method'] = $opt['m'];		   
		  
 	      if($config['encrypted'] === true && intval($config['e_method']) === 1){
 		   	 trigger_error('The options encryption method is deprecated in '.__METHOD__.' '.__LINE__,$config['ERROR']);
		     return false;		     
 	      }	 
		  
 	      if($config['encrypted'] === true && intval($config['e_method']) === 2){
 		     $p = trim($this->crypt($p, 'decrypt', $opt['pass'], $opt['rot1'], $opt['rot2']));
 	      }	 	
		  
 	      if($config['encrypted'] === true && intval($config['e_method']) === 3){
 	      	 if($this->make_pass_3($opt) == false){
		   	 trigger_error('Cannot decrypt password properly [1] from '.self::$id_repositroy.' for '.$class.' in '.__METHOD__.' '.__LINE__,$config['ERROR']);
		       return false;	      	 	
 	      	 }
 		     $p = trim($this->crypt($p, 'decrypt', $opt['pass'], $opt['rot1'], $opt['rot2']));
 	      }	
		  		  		  	
		   if(isset($code['s']) && $code['s'] !== sha1($p)){
	          	 $errordetail = ($config['ini']['display_errors_details'] === true)
			                  ? '<pre>'.sha1($p).'</pre><pre>'.$code['s'].'</pre><pre>'.$opt['pass'].' '.$opt['rot1'].' '.$opt['rot2'].'</pre>'
			                  : '';	   	
													  
		   	   trigger_error('Cannot decrypt source properly [2] from '.self::$id_repositroy.' for '.$class.' in '.__METHOD__.' '.__LINE__.$errordetail,$config['ERROR']);

			   return false;
		   }
		  
 	       $p = $this->unwrap_namespace($p);	   
		   $code['php'] = $p;
		   try{
	             $parsed = eval($p);
		   }catch(Exception $e){
		   	  $parsed = false;
		   }
          if($parsed === false){
          	 $errordetail = ($config['ini']['display_errors_details'] === true)
			                  ? '<pre>'.htmlentities($p).'</pre>'
			                  : '';
		     trigger_error('Parse Error in '.__METHOD__.' '.__LINE__.$errordetail,$config['ERROR']);
		     return false;
	      } else {
			   unset($code['c']);
		  } 
		  
		  $error = '';
		  $config_source = (isset($config['source'])) ? $config['source'] : self::$config_source;
		  $installed = $this->installSource($class,$code, $error, $config_source);
		  
		  usleep(75);
		  return true; 	
    }


    public function loadSource(&$code, Array &$config = null, &$opt = array('pass' => null, 'rot1' => 5, 'rot2' => 3), $class = null){
    	 return $this->load($code, $config, $opt, $class );
    }

    public function loadSources(&$sources, &$opt = array('pass' => null, 'rot1' => 5, 'rot2' => 3), Array &$config = null){
       $this->set_config($config); 	
       $this->mkp($config);	
       foreach($sources as $class => $code){
       	  if(class_exists($class))continue;
	      if($this->load($code, $config, $opt, $class) === false){
	      	return false;
	      }
       }
    	
       return true;	
    }
	
	
    public function crypt($data, $command = 'encrypt', $Key = NULL, $offset = 5, $chiffreBlockSize = 3)
	{
	   if($command ===  'encrypt'){
	    	$data = sha1(trim($data)).$data;	
			
			    $k = sha1($Key).$Key;
				
				$str = $data;
				$data = '';
				
				
				for($i=1; $i<=strlen($str); $i++)
				{
					$char 		= substr($str, $i-1, 1);
					$keychar 	= substr($k, ($i % strlen($k))-1, 1);
					$char 		= chr(ord($char)+ord($keychar));
					$data		.= $char;
				}
       }
	   if(!is_numeric($offset)||$offset<0)$offset=0;if(!isset($data)||$data==""||!isset($Key)||$Key==""){return FALSE;}$pos="0";for($i=0;$i<=(strlen($data)-1);$i++){$shift=($offset+$i)*$chiffreBlockSize;while($shift>=256){$shift-=256;}$char=substr($data,$i,1);$char=ord($char)+$shift;if($pos>=strlen($Key)){$pos="0";}$key=substr($Key,$pos,1);$key=ord($key)+$shift;if($command=="decrypt"){$key=256-$key;}$dataBlock=$char+$key;if($dataBlock>=256){$dataBlock=$dataBlock-256;}$dataBlock=chr(($dataBlock-$shift));if(!isset($crypted)){$crypted=$dataBlock;}else{$crypted.=$dataBlock;}$pos++;}
       if($command ===  'decrypt'){
 				$decrypt 	= '';
                $k = sha1($Key).$Key;
			
				for($i=1; $i<=strlen($crypted); $i++)
				{
					$char 		= substr($crypted, $i-1, 1);
					$keychar 	= substr($k, ($i % strlen($k))-1, 1);
					$char 		= chr(ord($char)-ord($keychar));
					$decrypt   .= $char;
				}      	   
       	   $crypted = substr($decrypt,strlen(sha1("1")),strlen($decrypt));
		   $hash_check = substr($decrypt,0,strlen(sha1("1")));
		   if(trim($hash_check) !== sha1($crypted) || sha1($crypted)==='da39a3ee5e6b4b0d3255bfef95601890afd80709'){
		   	 $crypted = false;
		   	 trigger_error('Broken data consistence in '.__METHOD__, E_USER_NOTICE);
		   }
	   }
       return $crypted;
	}	

   
    public function unwrap_namespace($s){
    	$s = preg_replace("/^(namespace ([A-Za-z0-9\_".preg_quote('\\')."]+);){1}/", '${1}'."\n", $s);
		return preg_replace("/(\nuse ([A-Za-z0-9\_".preg_quote('\\')."]+);)/", '${1}'."\n", $s);
    }
    	
    public function _unwrap_code($c){return trim(gzuncompress(gzuncompress(base64_decode(str_replace("\r\n\t","", $c))))," \r\n");}		
    public function unpack_license($l){return gzuncompress(gzuncompress(base64_decode(str_replace("\r\n", "", $l))));} 	
	function __destruct() {foreach(array_keys(get_object_vars($this)) as $value){unset($this->$value);}}
	
	
	/**
	 * PKI
	 */ 

   public function setLib($lib)
     {
        $this->lib = $lib;
	   return $this;
     } 

   public function save($data, $begin = "-----BEGIN SIGNATURE-----\r\n", $end = '-----END SIGNATURE-----')
     {
        return $begin . chunk_split(base64_encode($data)) . $end;
     }


   public function loadPK($str)
     {
       $data = preg_replace('#^(?:[^-].+[\r\n]+)+|-.+-|[\r\n]#', '', $str);
       return preg_match('#^[a-zA-Z\d/+]*={0,2}$#', $data) ? utf8_decode (base64_decode($data) ) : false;
     }

  public function error($error, $mod = E_USER_ERROR, $info = TRUE)
    {
      trigger_error($error.(($info === TRUE) ? ' in '.__METHOD__.' line '.__LINE__ : ''), $mod);
      return FALSE;
    }
    
    
  public function verify($data, $sigBin, $publickey, $algo = 'sha256WithRSAEncryption')
     {
        switch($this->lib)
          {
           case self::OPENSSL :
                  return $this->verify_openssl($data, $sigBin, $publickey, $algo);
                break;

           case self::PHPSECLIB :
                  return $this->verify_phpseclib($data, $sigBin, $publickey, $algo);
                break;
           case self::DISABLED :
           default :
                  return $this->error(self::E_NORSA, E_USER_ERROR);
                break;

          }

     }
    
	    
  public function getPublKeyByCRT($cert)
     {
        switch($this->lib)
          {
           case self::OPENSSL :
                  return $this->getPublKeyByCRT_openssl($cert);
                break;

           case self::PHPSECLIB :
                  return $this->error(self::E_NOTIMPLEMENTED, E_USER_ERROR);
                break;
           case self::DISABLED :
           default :
                  return $this->error(self::E_NORSA, E_USER_ERROR);
                break;

          }

     }
	 
  public function encrypt($data,$PrivateKey,&$out)
     {
        switch($this->lib)
          {
           case self::OPENSSL :
                  return $this->encrypt_openssl($data,$PrivateKey,$out);
                break;
        case self::PHPSECLIB :
                  return $this->error(self::E_NOTIMPLEMENTED, E_USER_ERROR);
                break;
           case self::DISABLED :
           default :
                  return $this->error(self::E_NORSA, E_USER_ERROR);
                break;

          }

     }
	 

  public function decrypt($decrypted,$PublicKey,&$out)
     {
        switch($this->lib)
          {
           case self::OPENSSL :
                  return $this->decrypt_openssl($decrypted,$PublicKey,$out);
                break;
        case self::PHPSECLIB :
                  return $this->error(self::E_NOTIMPLEMENTED, E_USER_ERROR);
                break;
           case self::DISABLED :
           default :
                  return $this->error(self::E_NORSA, E_USER_ERROR);
                break;

          }

     }
	 	 
  protected function encrypt_openssl($data,$PrivateKey,&$out) {  
     $PrivKeyRes = openssl_pkey_get_private($PrivateKey);
     return openssl_private_encrypt($data,$out,$PrivKeyRes); 
  }
  
  protected function decrypt_openssl($decrypted,$PublicKey,&$out) {  
        $pub_key = openssl_get_publickey($PublicKey);
        $keyData = openssl_pkey_get_details($pub_key);
        $pub = $keyData['key'];
        $successDecrypted = openssl_public_decrypt(base64_decode($decrypted),$out,$PublicKey, OPENSSL_PKCS1_PADDING);
		return $successDecrypted; 
  }
  


  protected function getPublKeyByCRT_openssl($cert)
    {
       $res = openssl_pkey_get_public($cert);
       $keyDetails = openssl_pkey_get_details($res);
       return $keyDetails['key'];
    }

     

  protected function verify_phpseclib($data, $sigBin, $publickey, $algo = 'sha256WithRSAEncryption')
      {
         $isHash = preg_match("/^([a-z]+[0-9]).+/", $algo, $hashinfo);
         $hash = ($isHash) ? $hashinfo[1] : 'sha256';

         $rsa = new Crypt_RSA();
         $rsa->setHash($hash);
         $rsa->setSignatureMode(CRYPT_RSA_SIGNATURE_PKCS1);
         $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
         $rsa->loadKey($publickey);
         return (($rsa->verify($data, $sigBin) === TRUE) ? TRUE : FALSE);
      }



   protected function verify_openssl($data, $sigBin, $publickey, $algo = 'sha256WithRSAEncryption')
      {
        return ((openssl_verify($data, $sigBin, $publickey, $algo) == 1) ? TRUE : FALSE);
      }
	  
	  
	  	
	
	/**
	 * Streaming Methods
	 */
    public function init(){$args = func_get_args(); /** todo ... */ return $this;}
    public function DEFRAG(){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function stream_open($url, $mode, $options = STREAM_REPORT_ERRORS, &$opened_path = null){
    	$u = parse_url($url);
	    $c = explode('.',$u['host']);
		$c = array_reverse($c);
		
		$this->mode = $mode;
		
		if($c[0]==='code')$tld = array_shift($c);
		
		
		
		/**
		 * ToDo: APICLient
		 *    $this->Client = new \frdl\Client\RESTapi();
		 * 
		 *  URL Pattern / e.g. this Class:
		 *  http://interface.api.webfan.de/v1/public/software/class/webfan/frdl.webfan.Autoloading.SourceLoader/source.php
		 * 
		 */
        if(class_exists('\webdof\wHTTP') && class_exists('\webdof\Http\Client') && class_exists('\webdof\Webfan\APIClient')){ 
	      $this->Client = new \webdof\Webfan\APIClient();
		  $this->Client->prepare( 'http',
                          'interface.api.webfan.de',
                          'GET',
                          self::$id_interface,  //  i1234 
                          'software',
                          array(),  //post
                          array(),  //cookie
                          self::$api_user,
                          self::$api_pass,
                          'class',
                          'php',   //format ->hier: "php"
                          'source',
                           array(self::$id_repositroy,implode(".",array_reverse($c))),
                           array(), //get
                          1,
                          E_USER_WARNING);
						  
		 $this->eof = false;
		 $this->pos = 0;
    	 try{
               $r = $this->Client->request();
			   if(intval($r['status']) !== 200)return false;
			   $this->data = $r['body'];
	
		 }catch(Exception $e){
			trigger_error('Cannot process the request to '.$url, E_USER_WARNING);
			return false;
		 }  	
	   }else{
	      $url = 'http://interface.api.webfan.de/v1/'.self::$id_interface.'/software/class/'.self::$id_repositroy.'/'.implode(".",array_reverse($c)).'/source.php';
		  $data = file_get_contents($url);
		  if(false === $data){
		  	 return false;			  
		  }else{
		  	 $this->data = $data;
		  }
	   }
				  
	    return true;					  
    }
    public function dir_closedir(){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function dir_opendir($path , $options){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function dir_readdir(){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function dir_rewinddir(){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function mkdir($path , $mode , $options){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function rename($path_from , $path_to){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function rmdir($path , $options){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
 	public function stream_cast($cast_as){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
 	public function stream_close(){
         $this->Client = null;
	}
    public function stream_eof(){
    	$this->eof = ($this->pos >= strlen($this->data));
    	return $this->eof;
	}
    public function stream_flush(){
    	//echo $this->data;
    	$this->pos  = strlen($this->data);
		return $this->data;
	}
    public function stream_lock($operation){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function stream_set_option($option , $arg1 , $arg2){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function stream_stat(){
		 return array(  
		          'mode' => $this->mode,
		          'size' => strlen($this->data) * 8,
		 );
	}
    public function unlink($path){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function url_stat($path , $flags){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function stream_read($count){
    	 if($this->stream_eof())return  '';
		
    	 $maxReadLength = strlen($this->data) - $this->pos;
         $readLength = min($count, $maxReadLength);

        $p=&$this->pos;
        $ret = substr($this->data, $p, $readLength);
        $p +=  $readLength;
        return (!empty($ret)) ? $ret : '';  	
	}
    public function stream_write($data){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
    public function stream_tell(){return $this->pos;}
    public function stream_seek($offset, $whence){
    	
		
		
		$l=strlen($this->data);
        $p=&$this->pos;
        switch ($whence) {
            case SEEK_SET: $newPos = $offset; break;
            case SEEK_CUR: $newPos = $p + $offset; break;
            case SEEK_END: $newPos = $l + $offset; break;
            default: return false;
        }
        $ret = ($newPos >=0 && $newPos <=$l);
        if ($ret) $p=$newPos;
        return $ret;
	}
    public function stream_metadata($path, $option, $var){trigger_error('Not implemented yet: '.get_class($this).' '.__METHOD__, E_USER_ERROR);}
   
}


 
 abstract class MimeStubA{
 	
  const FN_ASPECTS = 'aspects';	
     /**
    *  default $SEMR´s
	*  const  SERVER_ROUTER = {$cmd=SERVER} . {$format} . {$modul} . {$outputbuffers = explode(',')} 
	*/
	const TPL_SERVER_ROUTE = '{$cmd}.{$responseformat}.{$modul}.{$responsebuffers}';
    const SERVER_PAGE = 'SERVER.html.PAGE.buffered';
    const SERVER_HTML = 'SERVER.html.HTML.buffered';
    const SERVER_API = 'SERVER.?.API.format';
    const SERVER_404 = 'SERVER.html.404.buffered';
    const SERVER_JS = 'SERVER.js.JS.compressed,pragma';
    const SERVER_CSS = 'SERVER.css.CSS.compressed,pragma';
    const SERVER_IMG = 'SERVER.img.IMG.compressed,pragma';
	
    const SERVER_DEFAULT = self::SERVER_PAGE;
    	
  protected $ns_pfx = array('?' => array('frdl' => true),
              '$'=> array('frdl' => true), 
              '$'=> array('frdl' => true),
              '!'=> array('frdl' => true), 
              '#'=> array('frdl' => true), 
              '-'=> array('frdl' => true),
              '.'=> array('frdl' => true), 
              '+'=> array('frdl' => false), 
              ',' => array('frdl' => true)
          );	
  protected $wrappers;
  protected $shortcuts;
 	
  
 
  public function addShortCut ($short,  $long, $label = null){

		 
  	 array_walk($this->ns_pfx,function(&$v){
  	 	  if(!isset($v[\frdl\A::FN_ASPECTS])) $v[\frdl\A::FN_ASPECTS] = array(); 	 	
  	 });
  	 
  	    $ns = substr($short, 0, 1);
  	     if(!is_array($this->shortcuts))$this->shortcuts = array();
        $this->shortcuts[$short] = $long;
          
          if(isset($this->ns_pfx[$ns])){
		  	 if(!isset($this->ns_pfx[$ns][self::FN_ASPECTS]) || !is_array($this->ns_pfx[$ns][self::FN_ASPECTS])) $this->ns_pfx[$ns][self::FN_ASPECTS] = array(); 	
		  	 $aspect = array(
		  	   'label' => (is_string($label)) ? $label : $short,
		  	   'short' => $short,
		  	   'long' => $long
		  	 );
		  	$this->ns_pfx[$ns][self::FN_ASPECTS][$short] = $aspect;
		  }
		  
		 return $this;
  } 
	 
	
 /**
 * todo...
 * 
 */	
  protected function apply_fm_flow(){
  	 $args  = func_get_args();
     $THIS = &$this;
     $SELF = &$this;
         	
   MimeStubApp::God() 	
      -> {'$'}('?session_started', (function($startIf = true) use ($THIS, $SELF) {
       	$r = false; 
        if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            $r =  session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
          } else {
             $r =  '' === session_id()  ? FALSE : TRUE;
          }
        }
        
        if(true === $startIf && false === $r){
          if(!session_start()){	
            if(isset($THIS) && isset($THIS->debug) && true === $THIS->debug) trigger_error('Cannot start session in '.basename(__FILE__).' '.__LINE__, E_USER_WARNING);
          }
		}
        
        
       return $r ;
        }) );
     

     $func_jsonP = (function($str) use ($THIS, $SELF) {
		 		       	 $r = (isset($THIS) && isset($THIS->data['data_out'])) ? $THIS->data['data_out'] : new \stdclass;
		 		       	 $r->type = 'print';
		 		       	 $r->out = $str;
      	                 $fnregex = "/^[A-Za-z0-9\$\.-_\({1}\){1}]+$/";
      	                 $callback = (isset($_REQUEST['callback']) && preg_match($fnregex, $_REQUEST['callback']))
		                   ? strip_tags($_REQUEST['callback'])
		                   : '';
		                   
		                   
                if($callback === ''){
         	            $o = json_encode($r);
                }  else {
                	       $r->callback = $callback;
                           $o = $callback.'(' . json_encode($r) . ')';
		                }
		                
		        return $o;
		 	});
		 	
		 	
   /**
   * http://php.net/manual/en/function.apache-request-headers.php#116645
   */      	
   MimeStubApp::God() 	
      -> {'$'}('?request_headers', function() {
      	     if( function_exists('apache_request_headers') )return apache_request_headers();
                  foreach($_SERVER as $K=>$V){$a=explode('_' ,$K);
                        if(array_shift($a)==='HTTP'){
                           array_walk($a,function(&$v){$v=ucfirst(strtolower($v));});
                           $retval[join('-',$a)]=$V;}
                  } 
             return $retval;
          }
      );
        	
        	
	     MimeStubApp::God() 
            -> {'$'}('$.sem.parse', function($sem) use ($THIS, $SELF) {
            	    $str = $SELF::TPL_SERVER_ROUTE;
            	    foreach($sem as $k => $v){
						$s = (is_array($v)) ? implode(',', $v) : $v;
						$str = str_replace('{$'.$k.'}', $s, $str);
					}
            	    return $str;
            	})
            	// '{$cmd}.{$responseformat}.{$modul}.{$responsebuffers}'; 	
            -> {'$'}('$.sem.unparse', function(&$sem, $route) use ($THIS, $SELF) {
            	    $seg = explode('.', $route);
            	    $sem['cmd'] =  array_shift($seg);
            	    $sem['responseformat'] =  array_shift($seg);
            	    $sem['modul'] =   array_shift($seg);
            	    $sem['responsebuffers'] = explode(',',array_shift($seg));
            	    $sem['.nodes'] =$seg;
                    return $THIS;
            	})
            	
            	
            -> {'$'}('$.sem->getFomatterMethod', (function($format){
            	 if('jsonp' !== $format && 'json' !== $format)return false;
                     return '$.sem.format->'.$format;
            	}))	
            -> {'$'}('$.sem.format->json', $func_jsonP )
            -> {'$'}('$.sem.format->jsonp', $func_jsonP)  
            /**
			* todo   css,txt,php,bin,dat,js,img,....
			*/
            -> {'$'}('$.sem.get->mime', (function($format = null, $file = null, $apply = true, $default = '') use ($THIS, $SELF) {
            $file = ((null===$file || !is_string($file)) ? \webdof\wURI::getInstance()->getU()->file : $file); 	
            if(true === $apply)$THIS->format = $default;
            
   	        $mime_types = array(
            '' =>array( 'text/html',),
            'frdl' =>array( 'application/frdl-bin',),
            'jpg' => array('image/jpeg', ),
            'jpeg' => array('image/jpeg',),
            'jpe' => array('image/jpeg',),
            'gif' => array('image/gif',),
            'png' => array('image/png',),
            'bmp' =>array( 'image/bmp',),
            'flv' => array('video/x-flv',),
            'js' => array('application/x-javascript',),
            'json' =>array( 'application/json',),
            'jsonp' =>array( 'application/x-javascript',),
            'tiff' => array('image/tiff',),
            'css' =>array( 'text/css',),
            'xml' => array('application/xml',),
            'doc' => array('application/msword',),
            'docx' => array('application/msword',),
            'xls' =>array( 'application/vnd.ms-excel',),
            'xlm' => array('application/vnd.ms-excel',),
            'xld' => array('application/vnd.ms-excel',),
            'xla' => array('application/vnd.ms-excel',),
            'xlc' => array('application/vnd.ms-excel',),
            'xlw' => array('application/vnd.ms-excel',),
            'xll' => array('application/vnd.ms-excel',),
            'ppt' => array('application/vnd.ms-powerpoint',),
            'pps' => array('application/vnd.ms-powerpoint',),
            'rtf' => array('application/rtf',),
            'pdf' => array('application/pdf',),
            'html' =>array( 'text/html',),
            'htm' => array('text/html',),
            'php' => array('text/html',),
            'txt' => array('text/plain',),
            'mpeg' => array('video/mpeg',),
            'mpg' => array('video/mpeg',),
            'mpe' => array('video/mpeg',),
            'mp3' =>array( 'audio/mpeg3',),
            'wav' => array('audio/wav',),
            'aiff' =>array('audio/aiff',),
            'aif' =>array( 'audio/aiff',),
            'avi' => array('video/msvideo',),
            'wmv' => array('video/x-ms-wmv',),
            'mov' => array('video/quicktime',),
            'zip' =>array( 'application/zip',),
            'tar' => array('application/x-tar',),
            'swf' => array('application/x-shockwave-flash',),
            'odt' => array('application/vnd.oasis.opendocument.text',),
            'ott' => array('application/vnd.oasis.opendocument.text-template',),
            'oth' =>array( 'application/vnd.oasis.opendocument.text-web',),
            'odm' => array('application/vnd.oasis.opendocument.text-master',),
            'odg' => array('application/vnd.oasis.opendocument.graphics',),
            'otg' => array('application/vnd.oasis.opendocument.graphics-template',),
            'odp' =>array( 'application/vnd.oasis.opendocument.presentation',),
            'otp' => array('application/vnd.oasis.opendocument.presentation-template',),
            'ods' => array('application/vnd.oasis.opendocument.spreadsheet',),
            'ots' => array('application/vnd.oasis.opendocument.spreadsheet-template',),
            'odc' => array('application/vnd.oasis.opendocument.chart',),
            'odf' => array('application/vnd.oasis.opendocument.formula',),
            'odb' => array('application/vnd.oasis.opendocument.database',),
            'odi' => array('application/vnd.oasis.opendocument.image',),
            'oxt' => array('application/vnd.openofficeorg.extension',),
            'docx' => array('application/vnd.openxmlformats-officedocument.wordprocessingml.document',),
            'docm' => array('application/vnd.ms-word.document.macroEnabled.12',),
            'dotx' => array('application/vnd.openxmlformats-officedocument.wordprocessingml.template',),
            'dotm' => array('application/vnd.ms-word.template.macroEnabled.12',),
            'xlsx' => array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',),
            'xlsm' => array('application/vnd.ms-excel.sheet.macroEnabled.12',),
            'xltx' => array('application/vnd.openxmlformats-officedocument.spreadsheetml.template',),
            'xltm' => array('application/vnd.ms-excel.template.macroEnabled.12',),
            'xlsb' => array('application/vnd.ms-excel.sheet.binary.macroEnabled.12',),
            'xlam' => array('application/vnd.ms-excel.addin.macroEnabled.12',),
            'pptx' => array('application/vnd.openxmlformats-officedocument.presentationml.presentation',),
            'pptm' => array('application/vnd.ms-powerpoint.presentation.macroEnabled.12',),
            'ppsx' =>array( 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',),
            'ppsm' => array('application/vnd.ms-powerpoint.slideshow.macroEnabled.12',),
            'potx' => array('application/vnd.openxmlformats-officedocument.presentationml.template',),
            'potm' => array('application/vnd.ms-powerpoint.template.macroEnabled.12',),
            'ppam' => array('application/vnd.ms-powerpoint.addin.macroEnabled.12',),
            'sldx' => array('application/vnd.openxmlformats-officedocument.presentationml.slide',),
            'sldm' => array('application/vnd.ms-powerpoint.slide.macroEnabled.12',),
            'thmx' => array('application/vnd.ms-officetheme',),
            'onetoc' => array('application/onenote',),
            'onetoc2' =>array( 'application/onenote',),
            'onetmp' =>array( 'application/onenote',),
            'onepkg' => array('application/onenote',),
            
            'po' => array( 
			         "Content-Type: text/plain; charset=UTF-8;", "Content-Transfer-Encoding: 8bit\n",
			   ),
			//http://pki-tutorial.readthedocs.org/en/latest/mime.html
            'key' => array('application/pkcs8',), 
            'crt' => array('application/x-x509-ca-cert',), //VIRTUAL !!!!
           // 'crt' => array('application/x-x509-user-cert',),
      
            'cer' => array('pkix-cert',), 
           // 'pkicrt' => array('application/x-x509-user-cert',),
            'crl' => array('application/x-pkcs7-crl',),
			'pfx' => array('application/x-pkcs12',),
                        
			'bin' => array( 
			         "Content-Type: application/octet-stream", "Content-Transfer-Encoding: binary\n",
			   ),
			'dat' => array( 
			         "Content-Type: application/octet-stream", "Content-Transfer-Encoding: binary\n",
			         'Content-Disposition:attachment; filename="' . $file. '"',
			   ),
        );            
            
             
        $fnFromatFromHeaders = function() use($mime_types){
        	/**
			* 
			* @todo
			* 
			*/
		    return false;
		    
			  $headers = MimeStubApp::God()-> {'?request_headers'}();
            	  if(isset($headers['Accept'])){
					$accepts = explode(',', $headers['Accept']);
					if(count($accepts) === 1){
						$_ = explode('/', $accepts[0]);
						$_ = explode(';', $_[1]);
						$_ = explode('+', $_[0]);
						if('*' !== $_s[0]){
							return ((isset($mime_types[$_s[0]])) ? $_s[0] : false) ;
						}
						
					}				  	
				  }
		    return false;		  
		};
		    
            
           if(null === $format || false === $format || !isset($mime_types[$format])){
           	
           	$fromHeaders = $fnFromatFromHeaders();
           	
		    $_e = explode('.', $file);
            $_e = array_reverse($_e);
            $extension = (count($_e) > 1) ? $_e[0] : '';
            if('?' === $format){
            	$format = $extension;
            	if( !isset($mime_types[$format]) && false !== $fromHeaders){
            	  $format = $fromHeaders;
            	}
            }elseif('?:extension' === $format){
            	$format = $extension;
            }elseif('?:headers' === $format){
            	$format = $fromHeaders;
            }

		   } 
		
		

		if(null !== $format && false !== $format){
			if(true === $apply)$THIS->format = $format;
			return ((isset($mime_types[$format])) ? $mime_types[$format] : false);
		}else{
			return $mime_types;
	    }
     }))
     
     ;
        
         
    
   
        	
       return $this;
	}
 	
 } 





class MimeStubApp extends MimeStubA
{
		
	const NS = __NAMESPACE__;
	const DS = DIRECTORY_SEPARATOR;
	
	const LOADER = 'webfan\MimeLoader';
	
	protected static $instance = null;
	
	protected $app;
	
	protected $E_CALL = E_USER_ERROR;
	protected $wrap;
	/**
	* 
	* @public _ - current shortcut [mixed]
	* 
	*/
	public $_; 
	
	/**
	 * Stream Properties
	 */
	public $context = array();
	protected $data;
	protected $chunk;
	public $buflen;
	protected $pos = 0;
	protected $read = 0; 	
	protected $Controller;
	

	
	protected $LoaderClass =null;
	
	protected $public_properties_read =  array('app', 'wrap', 'wrappers', 'shortcuts' ,'LoaderClass');
	
	

	
	protected function __construct($init = false, $LoaderClass = self::LOADER, $name = '', $branch = 'dev-master', 
	   $version = 'v1.0.2-beta.1', $meta = array())
	 {
	    $this->app = new \stdclass;	
            $this->app->name = $name;
	    $this->app->branch = $branch;
	    $this->app->version = $version;
	    $this->app->meta = $meta;
	    $this->wrap = array();
	    $this->shortcuts = array();
            $this->setAutoloader($LoaderClass);
	    if($init === true)$this->init();
	}
	
	
    public function &__get($name)
    {
    	
      $retval = null;	
      if (in_array($name, $this->public_properties_read )){
           $retval = $this->{$name};
           return $retval;
	  }
      
        trigger_error('Not fully implemented yet or unaccesable property: '.get_class($this).'->'.$name,  $this->E_CALL);	

        return $retval;
    }		 


    public static function God($init = false, $LoaderClass = self::LOADER, $name = '', $branch = 'dev-master', 
	   $version = 'v1.0.2-beta.1', $meta = array()){
        return self::getInstance( $init, $LoaderClass, $name, $branch ,   $version, $meta );
   }
	 

  	public function init(){
	 $this->addShortCut('$', array($this,'addShortCut'))
	   
	  ;		
	  
	$this->_ = (function(){
			     return call_user_func_array(array($this,'$'), func_get_args());
		   });
	
     $this->wrap = array( 
		         'c' => array(
				        self::LOADER=>  array($this->LoaderClass, null), 
         		        'MimeStubApp' =>  array(__CLASS__, null),
				 ),
		         'f' => array( ),
		);

      $this ->applyAliasMap(true)
            ->mapWrappers(null)
			->init_stream_wrappers(true) 
			->Autoloader(true) 
		       ->autoload_register() 
		       -> j()
	        ;
                /**
                 * ToDo: Load Application Config and Components...
                 * */
                 
                 
		return $this;
    }
	
	  
	public function setAlias($component, $alias, $default, $abstract_parent, $interfaces = array()){
		$this->wrap['aliasing']['schema'][$component] = array(
		   'alias' => $alias, 'default' => $default, 'abstract_parent' =>$abstract_parent, 
		   'interfaces' => $interfaces
		 );
		return $this;
	}
	
	//todo : compinent registry
	public function setAliasMap($aliasing = null){
		$this->wrap['aliasing'] = (is_array($aliasing)) ? $aliasing
		 : array( 
				      'schema' => array(
					      '1.3.6.1.4.1.37553.8.1.8.8.5.65.8.1.1' => array('name' => 'Autoloader', 'alias' => self::LOADER, 'default' => &$this->LoaderClass,
					                           'abstract_parent' => 'frdl\webfan\Autoloading\SourceLoader', 
					                           'interfaces' => array() ),
					      '1.3.6.1.4.1.37553.8.1.8.8.5.65.8.1.2' => array('name' => 'Application Main Controller', 'alias' => 'webfan\MimeStubApp','default' => 'webfan\MimeStubApp',
					                           'abstract_parent' => 'MimeStubA', 
					                           'interfaces' => array() ),
					      '1.3.6.1.4.1.37553.8.1.8.8.5.65.8.1.3' => array('name' => 'cmd parser', 'alias' => 'webfan\Terminal','default' =>'frdl\aSQL\Engines\Terminal\Test',
					                           'abstract_parent' => 'frdl\aSQL\Engines\Terminal\CLI', 
					                           'interfaces' => array() ),
					      '1.3.6.1.4.1.37553.8.1.8.8.5.65.8.1.4' => array('name' => 'BootLoader', 'alias' => 'frdl\AC','default' => 'frdl\ApplicationComposer\ApplicationComposerBootstrap',
					                           'abstract_parent' => 'frdl\ApplicationComposer\ApplicationComposerBootstrap', 
					                           'interfaces' => array() ),
						  '1.3.6.1.4.1.37553.8.1.8.8.5.65.8.1.5' => array('name' => 'API REST CLient', 'alias' => 'frdl\Client\RESTapi', 'default' => 'webdof\Webfan\APIClient',
					                           'abstract' => null, 
					                           'interfaces' => array() ), 
					  ),
				 );
				 
		return $this;		 
	}


    public function mapWrappers($wrappers  = null){
    	$this->wrappers = (is_array($wrappers)) ? $wrappers
    	  : array(  
	     'webfan' => array(
		         'tld' => array(   
				        'code' => 'webfan\Loader',
 
                  ),
		  ),
	      'frdl' => array(  
		  
		  ),
	      'homepagespeicher' => array(
		  
		  ),
	      'frdlweb' => array(  
		  
		  ),
	      'outshop' => array(  
		  
		  ),
	      'startforum' => array(  
		  
		  ),	 
	      
	      'wehowski' => array(  
		  
		  ),		
	      'till' => array(  
		  
		  ),		        
	  );
		
		return $this;		 
   }
	

   public function setAutoloader($LoaderClass = self::LOADER, &$success = false){
      $this->LoaderClass = $LoaderClass;
	  return $this;
   }



    public function init_stream_wrappers($overwrite = true){
 		 foreach($this->wrappers as $protocoll => $wrapper){
		       $this->_stream_wrapper_register($protocoll, $overwrite); 	
	     }
		return $this;
    }
	
		
	public function mapAliasing($apply = false){
		foreach($this->wrap['aliasing']['schema'] as $OID => $map){
			$this->wrap['c'][$map['alias']] = array($map['default'],null, $OID);
			if(true===$apply){
				$this->addClass($map['default'], $map['alias'],TRUE, $success );
			}
		}
		return $this; 	
	}
	
	
   public function Autoloader($expose = false){
     $component = '1.3.6.1.4.1.37553.8.1.8.8.5.65.8.1.1';
	 
	 if(null===$this->LoaderClass){
	  foreach($this->wrap['c'] as $alias => $info){
	 	if($component !== $info[2] || true !== $info[1] )continue;
             $this->LoaderClass = $info[0];
		 break;
	  }
	 }
	$Loader = (class_exists('\\'.$this->LoaderClass) ) ? call_user_func('\\'.$this->LoaderClass.'::top') 
		          : call_user_func('\\'.$this->wrap['aliasing']['schema'][$component]['default'].'::top') ;
				 
	 return (true === $expose) ? $Loader : $this;
   }
	
		
	public function applyAliasMap($retry = false){
    	foreach($this->wrap['c'] as $v => $o){
			if(null === $o[1] || (true === $retry && false === $o[1]))$this->addClass($o[0], $v,true, $success);
		}		 
		return $this; 	
	}

	
	 		
	public function __toString(){
		return (string)$this->app->name;
	}		
	
	
	
   public static function getInstance($init = false, $LoaderClass = self::LOADER, $name = '', $branch = 'dev-master', 
	   $version = 'v1.0.2-beta.1', $meta = array())
     {
       if (NULL === self::$instance) {
           self::$instance = new self($init, $LoaderClass, $name, $branch, $version , $meta);
       }
       return self::$instance;
     }
	 	
		
		
   protected function _fnCallback($name){
		// A
		  if(isset($this->shortcuts[$name])){
		  	   if(is_callable($this->shortcuts[$name]))return $this->shortcuts[$name];
		  } 
			  
			  
			  
		 //B 	  
		  	
		 $name = str_replace('\\','.',$name);

		 if(strpos($name,'.')!==false || strpos($name,'->')!==false || strpos($name,'::')!==false){
		 	  
			 if(strpos($name,'->')===false && strpos($name,'::')===false){
			   $n = explode('.', $name);
			   $method =  array_pop($n);
			   $name = implode('\\', $n);		 	
			   return array($name, $method);
			 }elseif( strpos($name,'->')!==false){
			 	 $n = explode('->', $name, 2);
				 $static = false;
			 }elseif(strpos($name,'::')!==false){
			 	 $n = explode('::', $name, 2);
				 $static = true;
			 }
             
			   $method =  array_pop($n);
			   $n = explode('.', $n[0]);
			   $name = implode('\\', $n);			 
			   return ($static === false) ? array($name, $method) : $name.'::'.$method;
		      		    
		 }
	} 
	 
    public function __call($name, $arguments)
    {
    	
		if(isset($this->wrap['f'][$name])){
    	try{
    	     return call_user_func_array($this->wrap['f'][$name],$arguments);
		}catch(Exeption $e){
		     trigger_error($e->getMesage().' '.__METHOD__.' '.__LINE__, $this->E_CALL);
		}
		}

   
    	try{
    		  $c = $this->_fnCallback($name);
    	      if(is_callable($c))call_user_func_array($c,$arguments);
			  return $this;
		}catch(Exeption $e){
		     trigger_error($e->getMesage().' '.__METHOD__.' '.__LINE__, $this->E_CALL);
			 return $this;
		}		
		
		
		 trigger_error($name.' not defined in '.__METHOD__.' '.__LINE__, $this->E_CALL);
		 return $this;
    }	 
	
	
	
	
	
    public static function __callStatic($name, $arguments)
    {
    	if(isset(self::God(false)->wrap['f'][$name])){
    	try{
    	       return call_user_func_array(self::God(false)->wrap['f'][$name],$arguments);
		}catch(Exeption $e){
		     trigger_error($e->getMesage().' '.__METHOD__.' '.__LINE__, self::God(false)->E_CALL);
		}
		}
		
	
	    try{
	    	  $c = self::God()->_fnCallback($name);
    	      if(is_callable($c))call_user_func_array($c,$arguments);
			  return self::God();
		}catch(Exeption $e){
		     trigger_error($e->getMesage().' '.__METHOD__.' '.__LINE__, self::God(false)->E_CALL);
			  return self::God();
		}	
		
		
		 trigger_error($name.' not defined in '.__METHOD__.' '.__LINE__, $this->E_CALL);
		 return self::God();
    }	
	
	

   public function addStreamWrapper( $protocoll, $tld, $class, $overwrite = true  ) {
          if(!isset($this->wrappers[$protocoll]))$this->wrappers[$protocoll] = array();
          if(!isset($this->wrappers[$protocoll]['tld']))$this->wrappers[$protocoll]['tld'] = array();		  
          $this->wrappers[$protocoll]['tld'][$tld] = $class; 
		  $this->_stream_wrapper_register($protocoll, $overwrite);
          return $this;
    }	
   
   
   public function addClass($Instance, $Virtual, $autoload = TRUE, &$success = null  ) {
    	$success =  ($Instance !== $Virtual) ? class_alias( $Instance, $Virtual, $autoload) : true;
		$this->wrap['c'][$Virtual]= array( (is_object($Instance)) ? get_class($Instance) : $Instance, $success);
        return $this;
    }
   
	public function addFunc($name, \Closure $func){
		$this->wrap['f'][$name] = $func; 
		return $this; 	
	}
	
   
   protected function _stream_wrapper_register($protocoll, $overwrite = true, &$success = null){
   		         if (in_array($protocoll, stream_get_wrappers())) {
		         	        if(true !== $overwrite){
                                $success = false;
								return $this;
						    }		         	        		
		         	        stream_wrapper_unregister($protocoll);	
				 }
		        $success = stream_wrapper_register($protocoll, get_class($this));	 
		return $this; 	
   }


	
	
	
	/**
	 * Streaming Methods
	 */	
   public function stream_open($url, $mode, $options = STREAM_REPORT_ERRORS, &$opened_path = null){
    	$u = parse_url($url);
	    $c = explode('.',$u['host']);
		$c = array_reverse($c);
		
		$this->Controller = null;
		$cN = (isset(self::God()->wrappers[$u['scheme']]['tld'][$c[0]]))
		          ?self::God()->wrappers[$u['scheme']]['tld'][$c[0]]
				  :false;
		
		if(false!==$cN){
			try{
			  $this->Controller = new $cN;
			}catch(Exception $e){
				trigger_error($e->getMessage(), E_USER_NOTICE);
				return false;
			}
		}else{
				trigger_error('Stream handler for '.$url.' not found.', E_USER_NOTICE);
				return false;	
		}
				
    	return  call_user_func(array($this->Controller, __FUNCTION__),$url, $mode, $options, $opened_path );
    }
    public function dir_closedir(){return  call_user_func(array($this->Controller, __FUNCTION__) );}
    public function dir_opendir($path , $options){return  call_user_func(array($this->Controller, __FUNCTION__), $path , $options );}
    public function dir_readdir(){return  call_user_func(array($this->Controller, __FUNCTION__) );}
    public function dir_rewinddir(){return  call_user_func(array($this->Controller, __FUNCTION__) );}
    public function mkdir($path , $mode , $options){return  call_user_func(array($this->Controller, __FUNCTION__), $path , $mode , $options );}
    public function rename($path_from , $path_to){return  call_user_func(array($this->Controller, __FUNCTION__), $path_from , $path_to );}
    public function rmdir($path , $options){return  call_user_func(array($this->Controller, __FUNCTION__), $path , $options );}
    public function stream_cast($cast_as){return  call_user_func(array($this->Controller, __FUNCTION__), $cast_as );}
    public function stream_close(){return  call_user_func(array($this->Controller, __FUNCTION__) );}
    function stream_eof(){return  call_user_func(array($this->Controller, __FUNCTION__) );}
    public function stream_flush(){return  call_user_func(array($this->Controller, __FUNCTION__) );}
    public function stream_lock($operation){return  call_user_func(array($this->Controller, __FUNCTION__), $operation );}
    public function stream_set_option($option , $arg1 , $arg2){return  call_user_func(array($this->Controller, __FUNCTION__), $option , $arg1 , $arg2 );}
    public function stream_stat(){return  call_user_func(array($this->Controller, __FUNCTION__) );}
    public function unlink($path){return  call_user_func(array($this->Controller, __FUNCTION__), $path );}
    public function url_stat($path , $flags){return  call_user_func(array($this->Controller, __FUNCTION__), $path , $flags );}
    function stream_read($count){return  call_user_func(array($this->Controller, __FUNCTION__), $count );}
    function stream_write($data){return  call_user_func(array($this->Controller, __FUNCTION__), $data) ;}
    function stream_tell(){return  call_user_func(array($this->Controller, __FUNCTION__) );}
    function stream_seek($offset, $whence){return  call_user_func(array($this->Controller, __FUNCTION__), $offset, $whence );}
    function stream_metadata($path, $option, $var){return  call_user_func(array($this->Controller, __FUNCTION__), $path, $option, $var);}
     
	
}


__halt_compiler();MIME-Version: 1.0
Content-Type: multipart/mixed;boundary=92ckNGfS
Message-Id: <1234qwerty>

--92ckNGfS
Content-Type: multipart/alternate;boundary=EVGuDPPT

--EVGuDPPT
Content-Type: text/html;charset=utf-8

<h1>Test</h1>
<p>This is the <strong>HTML</strong> version of the message.</p>


--EVGuDPPT
Content-Type: text/plain;charset=utf-8

This is the plain text version of the message.
--EVGuDPPT--
--92ckNGfS
Content-Type: image/png
Content-Transfer-Encoding: base64
Content-Disposition: inline ;filename="mypicture.png"

fVkVvYassFAAAABQAAAAIAAAAbWltZXR5cG==
--92ckNGfS--