<?php
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
   case '/':                   // URL (without file name) to a default screen
      require 'base.php';
      break; 
   case '/event.php':     // if you plan to also allow a URL with the file name 
      require 'event.php';
      break;             
   case '/events.php':
      require 'events.php';
      break;
	case '/messages.php':
      require 'messages.php';
      break;
	case '/new-event.php':
      require 'new-event.php';
      break;
	case '/settings.php':
      require 'settings.php';
	  break;
	case '/settings.php':
      require 'settings.php';
	  break;
	case '/profile.php':
      require 'profile.php';
      break;
	case '/base.php':
      require 'base.php';
      break;
   default:
      http_response_code(404);
      exit('Not Found');
}  
?>