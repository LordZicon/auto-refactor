<?php

class Session
{
    private $store;

    public function __construct()
    {
        $this->store =& $_SESSION;
    }

    public function set($key, $value)
    {
        $this->store[$key] = $value;
    }

    public function get($key)
    {
        if (isset($this->store[$key])) {
            return $this->store[$key];
        } else {
            return null;
        }
        
    }

    public function getOnce($key)
    {
        $value = $this->get($key);
        $this->remove($key);

        return $value;
    }

    public function remove($key)
    {
        unset($this->store[$key]);
    }
}