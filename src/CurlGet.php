<?php
namespace Kanxpack\CurlGet;

class CurlGet {

	private static $instance;
	protected static $result;
	protected static $defaults;
	protected static $handle;
	protected static $options;

    public static function getInstance() : self
    { 
    	return empty(self::$instance) ? (new self()) : self::$instance; 
    }

    protected static function setDefaults(string $url, array $get = NULL)
    {
		$this->defaults = [
	        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
	        CURLOPT_HEADER => 0,
	        CURLOPT_RETURNTRANSFER => TRUE,
	        CURLOPT_TIMEOUT => 4
    	];
    }

    protected static function initialiseHandle() : self
    {
    	$this->handle = curl_init();
    	return self::getInstance();
    }

    protected static function getHandle() : CurlHandle|false
    {
    	return $this->handle;
    }

    protected static function getDefaults() : array|false
    {
    	return $this->defaults;
    }

    protected static function getOptions() : array|false
    {
    	return $this->options;
    }

    protected static function setOptions(array $options = array()) : self
    {
    	$this->options = $options;
    	return self::getInstance();
    }

    protected static function setResult(string|bool $result) : self
    {
    	$this->result = $result;
    	return self::getInstance();
    }

    public static function getResult(string|bool $result) : string|false
    {
    	return self::$result;
    }

    protected static function setOptionsArray(array $options = array()) : self
    {
    	self::setOptions($options);
    	curl_setopt_array(self::getHandle(), (self::getOptions() + self::getDefaults()));
    	return self::getInstance();
    }

    protected static function getError() : string
    {
    	trigger_error(curl_error(self::getHandle()));
    	return self::getInstance();
    }

    protected static function executeSession() : self
    {
    	if (!$result = curl_exec(self::getHandle())) {
	        self::getError();
	    }

	    $this->setResult($result);
	    return self::getInstance();
    }

	public static function get(string $url, array $get = NULL, array $options = array()) : self
	{
		self::setDefaults($url, $get);
		self::initialiseHandle();
		self::setOptionsArray($options);
    	self::executeSession();
		return self::getInstance();
	}


}
