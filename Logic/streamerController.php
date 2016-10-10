<?php
class StreamerController
{
    public static $loadedStreamers = array();

    public static function GetStreamer($id)
    {
        $streamersDao = new StreamersDao();

        foreach(self::$loadedStreamers as $streamer)
        {
            if($streamer->GetID() == $id)
            {
                return $streamer->ToJson();
            }
        }

        $resultStreamers = $streamersDao->Read($id);
        
        if($resultStreamers)
        {
            if($resultStreamers[0])
            {
                array_push(self::$loadedStreamers, $resultStreamers[0]);
                echo $resultStreamers[0]->ToJson();
            }
        }

        return null;
    }

    public static function GetStreamers()
    {
        $first = true;

        echo "[";
        foreach(self::$loadedStreamers as $streamer)
        {
            if($first)
            {
                $first = false;
            }
            else
            {
                echo ",";
            }
            echo $streamer->ToJson();
        }
        echo "]";
    }

    public static function PostStreamers($streamer)
    {

        $streamersDao = new StreamerDao();
        if($streamer->GetID)
        {
            return $streamersDao->Update($streamer);
        }
        else
        {
            array_push(self::$loadedStreamers, $streamer);
            return $streamersDao->Create($streamer);
        }
    }

    public static function PostStreamersJson($streamerJson)
    {
        $object = json_decode($streamerJson);
        $streamerName = $object["name"];
        $streamerUrl = $object["url"];

        $streamer = new Streamer();
        $streamer->SetName($streamerName);
        $streamer->SetUrl($streamerUrl);

        return $this->PostStreamers($streamer);
    }

    public static function DeleteStreamer($id)
    {
        $streamersDao = new StreamerDao();
        $streamerToDelete = null;

        $index = 0;

        foreach(self::$loadedStreamers as $streamer)
        {
            if($streamer->GetAchivementID() == $id)
            {
                $streamerToDelete = $streamer;
            }
            $index++;
        }
        
        if($streamerToDelete)
        {
            array_splice(self::$loadedStreamers, $index, 1);
            $streamersDao->Delete($streamer);
        }

        return $streamerToDelete;
    }
}
?>