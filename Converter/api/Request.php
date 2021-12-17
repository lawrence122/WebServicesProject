<?php
	/**
	 * Makes a request to the API
	 */
	class Request{
		public $verb;
		public $url_parameters;
		public $payload;
		public $contentType;
		public $payloadFormat;
		public $accept;

		public function __construct() {
			$this->verb = $_SERVER["REQUEST_METHOD"];
			$this->url_parameters = array();
			$this->accept = $_SERVER["HTTP_ACCEPT"];
			if ($this->verb == "POST") {
				$this->contentType = $_SERVER["CONTENT_TYPE"];
			}
			parse_str($_SERVER["QUERY_STRING"], $this->url_parameters);
		}
	}
?>