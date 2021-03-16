<?php
// sets up all the redirects to be used in GCP
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
   case '/':                   
      break; 
   case '/event.php':     
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