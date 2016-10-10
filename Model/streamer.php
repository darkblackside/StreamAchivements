<?php
class Streamer
{
    private $StreamerID;
    private $StreamerURL;
    private $StreamerName;

    public function __construct($name, $url)
    {
        $this->StreamerName = $name;
        $this->StreamerURL = $url;
    }

    public function GetStreamerName()
    {
        return $this->StreamerName;
    }
    public function SetStreamerName($name)
    {
        $this->StreamerName = $name;
    }

    public function GetStreamerURL()
    {
        return $this->StreamerURL;
    }
    public function SetStreamerURL($url)
    {
        $this->StreamerURL = $url;
    }

    public function GetStreamerID()
    {
        return $this->StreamerID;
    }
    public function SetStreamerID($id)
    {
        $this->StreamerID = $id;
    }

    public function ToJson()
    {
        $response = "{";
        $response .= "\"id\":".$this->GetStreamerID;
        $response .= "\"name\":\"".$this->GetStreamerName."\",";
        $response .= "\"url\":\"".$this->GetStreamerURL."\"";
        $response .= "}";

        return $response;
    }
}
?>