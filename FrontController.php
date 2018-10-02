<?php
/**
 * It's a design pattern where single component of your web application is responsible for handling all the request.
 * Templating, Routing and Security Middleware are some exmaple of Front Controller functionality
 * Below is exmaple of routing whiich is controlled by front controller.
 * 
 * .htaccess
 * RewriteEngine On
 * RewriteRule . /front-controller.php [L]
 */

switch ($_SERVER['REQUESt_URI']) {
    case '/help': //load help.php
        break;
    case '/about': //load about-us.php
        break;
    default: //load not-found.php
        break;
}
?>