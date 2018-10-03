<?php 
/**
 * It's used to turn foreign interface into common interface.
 * We have Facebook API and we have implemented functions liek getTokens and postUpdate
 * Now assume, client requests new Twitter API so you don't want to change your code again and gain
 * You can create an adapter class which implements a common interface 
 */

class Facebook {
    public function getUserToken($userToken) {
        //code for token...
    }

    public function postUpdate($message) {
        //cod eto post status...
    }
}

interface StatusUpdate {
    function getUserToken($userToken);
    function postUpdate($message);
}

// Now let's say Twitter has other methods than common interfac, we can create an adapter for Twitter
// which will adapt interface behaviour but do its own things
class TwitterAdapter implements StatusUpdate {
    protected $twitter;

    public function __construct(Twitter $twitter) {
        $this->twitter = $twitter;
    }

    public function getUserToken($userToken) {
        $this->twitter->checkUserToken($userToken);
    }

    public function postUpdate($message) {
        $this->twitter->setStatusUpdate($message);
    }
}


?>
