<?php 
/**
 * In this pattren, subject notifies the observer of a chnage in its state. Subject is Publisher and all other observers are subscribers.
 * Observer class' update() method is called inside the Subject class.
 * Auth class is Subject and when there's login/logout, set the state and notify all the observers
 */
abstract class Observer {
    public function __construct(Subject $subject) {
        $subject->attach($this);
    }

    public function update(Subject $subject) {
        echo 'In Obersever ' . $subject->getState();
    }
}

abstract class Subject  {
    private $observers;
    private $state;

    public function __construct() {
        $this->observers = [];
        $this->state = null;
    }

    private function getObserverIndex(Observer $observer) {
        return array_search($observer, $this->observers);
    }

    public function attach(Observer $observer) {
        $index = $this->getObserverIndex($observer);

        if ($index !== FALSE) {
            $this->observers[] = $observer;
        }
    }

    public function detach(Observer $observer) {
        $index = $this->getObserverIndex($observer);

        if ($index !== FALSE) {
            unset($this->observers[$index]);
        }
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
        $this->notify();
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}


class Auth extends Subject {
    public function login() {
        //login code...

        //notify all the obersers
        $this->setState('login');
    } 

    public function logout() {
        //logout code

        $this->setState('logout');
    }
}
?>