<?php
	
	namespace luxury\libs;
	
	use Symfony\Component\DomCrawler\Crawler;

	class Parser
	{
		private $html;
		private $data;

		public function __construct()
		{
			
		}

		public function loadData($html)
		{
			$this->html = new Crawler($html);
			$this->data = $html;
		}

		public function getDataFromSelector($sel)
		{
			$body = $this->html->filter($sel);
            if (!count($body))
                return $this->data;

			return trim($body->html());
		}

		public function clear()
		{
			$this->html->clear();
		}
		
	}