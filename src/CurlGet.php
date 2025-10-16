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

    protected static function setDefaults(string $url, array $get = array())
    {
		self::$defaults = [
	        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
	        CURLOPT_HEADER => 0,
	        CURLOPT_RETURNTRANSFER => TRUE,
	        CURLOPT_TIMEOUT => 4
    	];
    }

    protected static function initialiseHandle() : self
    {
    	self::$handle = curl_init();
    	return self::getInstance();
    }

    protected static function getHandle() : \CurlHandle
    {
    	return self::$handle;
    }

    protected static function getDefaults() : array|false
    {
    	return self::$defaults;
    }

    protected static function getOptions() : array|false
    {
    	return self::$options;
    }

    protected static function setOptions(array $options = array()) : self
    {
    	self::$options = $options;
    	return self::getInstance();
    }

    protected static function setResult(string|bool $result) : self
    {
    	self::$result = $result;
    	return self::getInstance();
    }

    public static function getResult() : string|false
    {
    	return self::$result;
    }

    public static function getResultArray() : array
    {
        return json_decode(self::getResult(), true);
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

	    self::setResult($result);
	    return self::getInstance();
    }

	public static function get(string $url, array $get = array(), array $options = array()) : self
	{
		self::setDefaults($url, $get);
		self::initialiseHandle();
		self::setOptionsArray($options);
    	self::executeSession();
		return self::getInstance();
	}
}