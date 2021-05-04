<?php
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
      case '/':       
            require 'base.php';          
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
      case '/sign-in.php':
            require 'sign-in.php';
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
      case '/new-task.php':
            require 'new-task.php';
            break;
      case '/sign-out.php':
            require 'sign-out.php';
            break;
      case '/sign-up.php':
            require 'sign-up.php';
            break;
      case '/new-msg.php':
            require 'new-msg.php';
            break;
      case '/update-task.php':
            require 'update-task.php';
            break;
      case '/delete.php':
            require 'delete.php';
            break;
      case '/delete-msg.php':
            require 'delete-msg.php';
            break;
      case '/ngphp-post.php':
            require 'ngphp-post.php';
            break;
      case '/set_attending.php':
            require 'set_attending.php';
            break;
      case '/invite.php':
            require 'invite.php';
            break;
      case '/del-msg':
            require 'del-msg';
            break;
   default:
      http_response_code(404);
      exit('Not Found');
}
