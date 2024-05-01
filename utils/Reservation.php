<?php

class Reservation
{
    public $id;
    public $client_name;
    public $room_size;
    public $duration;

    public function __construct($id, $client_name, $room_size, $duration)
    {
        $this->id = $id;
        $this->client_name = $client_name;
        $this->room_size = $room_size;
        $this->duration = $duration;
    }

    public function __toString()
    {
        return "{$this->id},{$this->client_name},{$this->room_size},{$this->duration}";
    }
}
