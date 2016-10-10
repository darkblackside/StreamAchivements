<?php
class StreamerArchivement
{
    private $StreamerArchivementID;
    private $Streamer;
    private $StreamerStartTime;
    private $StreamerEndTime;
    

    public function __construct($archivement, $streamer)
    {
        $this->StreamerID = $streamer;
        $this->ArchivementID = $archivement;
    }

    public function GetStreamerArchivementID()
    {
        return $this->StreamerArchivementID;
    }
    public function SetStreamerArchivementID($StreamerArchivementID)
    {
        $this->StreamerArchivementID = $StreamerArchivementID;
    }

    public function GetStreamer()
    {
        return $this->Streamer;
    }
    public function SetStreamer($Streamer)
    {
        $this->Streamer = $Streamer;
    }

    public function GetStreamerStartTime()
    {
        return $this->StreamerStartTime;
    }
    public function SetStreamerStartTime($StreamerStartTime)
    {
        $this->StreamerStartTime = $StreamerStartTime;
    }

    public function GetStreamerEndTime()
    {
        return $this->StreamerEndTime;
    }
    public function SetStreamerEndTime($StreamerEndTime)
    {
        $this->StreamerEndTime = $StreamerEndTime;
    }

    public function ToJson()
    {
        $response = "{";
        $response .= "\"id\":".$this->GetStreamerArchivementID();
        $response .= "\"streamer\":".$this->GetStreamer()->ToJson().",";
        $response .= "\"startTime\":\"".$this->GetStreamerStartTime()."\",";
        $response .= "\"endTime\":\"".$this->GetStreamerEndTime()."\",";
        $response .= "}";

        return $response;
    }
}
?>
