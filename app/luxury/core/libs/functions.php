<?php
	
	function debug($data)
	{
		echo '<pre style="color: #e1e0e0;background: #232323; margin:0; padding: 10px;">';
		print_r($data);
		echo '</pre>';
	}

	function sec_to_time($seconds) 
	{ 
		$hours = floor($seconds / 3600); 
		$minutes = floor($seconds % 3600 / 60); 
		$seconds = $seconds % 60; 
		return sprintf("%d:%02d:%02d", $hours, $minutes, $seconds); 
	}
