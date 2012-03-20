<?php

class Eventish
{
	public static $config = array();

	public static $instance = false;

	private $_eventbrite;

	public $event;

	public $gravatar;

	/**
	 * The constructor
	*/
	private function __construct($config = array())
	{
		self::$config = $config;
		//self::load('vendor/eventbrite/Eventbrite', self::$config);
		self::load('vendor/gravatar-crepezzi/helpers/gravatar_helper');
		self::load('vendor/eventbrite-shiflett/eventbrite');
		$this->_eventbrite = new Eventbrite(
			array(
				'app_key' => $config['app_key'],
				'user_key' => $config['user_key']
			)
		);

		$attendees = $this->_eventbrite->eventListAttendees(array('id' => $config['event_id']));
		$event_get = (object) $this->_eventbrite->eventGet( array('id' => $config['event_id']) );

		$this->event = (object) $event_get->event;
		$attendees =  (object) $this->_eventbrite->eventListAttendees(array('id' => $config['event_id']));
		$this->event->attendees = $attendees->attendees;
	}

	/**
	 * Get the instance
	*/
	public static function instance($config = array())
	{
		if(self::$instance === false)
		{
			self::$instance = new Eventish($config);
		}

		return self::$instance;
	}

	/**
	  * Load a resource and extracts vars into that resource.
	*/
	public static function load($file, $vars = null)
	{
		$base_dir = dirname(__DIR__);
		$path = $base_dir.'/'.$file.'.php';
		if(!is_file($path)) die("$path does not exist.");
		ob_start();
		if($vars) extract($vars);
		include_once($path);
		return ob_get_clean();	
	}
}
