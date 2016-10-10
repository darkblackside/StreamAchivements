<?php
class AchivementController
{
    public static $loadedAchivements = array();

    public static function GetAchivement($id)
    {
        $achivementDAO = new AchivementDao();

        foreach(self::$loadedAchivements as $achivement)
        {
            if($achivement->GetAchivementID() == $id)
            {
                return $achivement->ToJson();
            }
        }

        $resultAchivements = $achivementDAO->Read($id);
        
        if($resultAchivements)
        {
            if($resultAchivements[0])
            {
                array_push(self::$loadedAchivements, $resultAchivements[0]);
                echo $resultAchivements[0]->ToJson();
            }
        }

        return null;
    }

    public static function GetAchivements()
    {
        $first = true;

        echo "[";
        foreach(self::$loadedAchivements as $achivement)
        {
            if($first)
            {
                $first = false;
            }
            else
            {
                echo ",";
            }
            echo $achivement->ToJson();
        }
        echo "]";
    }

    public static function PostAchivement($achivement)
    {

        $achivementDAO = new AchivementDao();
        if($achivement->GetID)
        {
            return $achivementDAO->Update($achivement);
        }
        else
        {
            array_push(self::$loadedAchivements, $achivement);
            return $achivementDAO->Create($achivement);
        }
    }

    public static function PostAchivementJson($achivementJson)
    {
        $object = jsonDecode($achivementJson);

        $achivementID = $object["id"];
        $achivementTitle = $object["title"];
        $achivementText = $object["text"];
        $achivementValues = $object["values"];
        $achivementAuthor = $object["author"];
        $achivementValidatedBy = $object["validatedBy"];
        $achivementValidatedTime = $object["validatedTime"];
        $achivementStreamers = $object["streamers"];
        $achivementStartTime = $object["startTime"];
        $achivementGoalTime = $object["goalTime"];

        $achivementValuesArray = array();
        $achivementStreamersArray = array();
        $achivementAuthorObject = new Streamer();

        foreach($object["streamers"] as $oneStreamer)
        {
            $streamer = new Streamer();
            $streamer->SetStreamerName($oneStreamer["streamer"]["name"]);
            $streamer->SetStreamerUrl($oneStreamer["streamer"]["url"]);

            $streamerAchivement = new StreamerAchivement();
            $streamerAchivement->SetStartTime($oneStreamer["startTime"]);
            $streamerAchivement->SetEndTime($oneStreamer["endTime"]);

            array_push($achivemntStreamersArray, $streamerAchivement);
        }

        foreach($object["values"] as $oneValue)
        {
            $value = new AchivementValue();
            $value->SetValueName($oneValue["name"]);
            $value->SetValueGoal($oneValue["goal"]);
            $value->SetValueActual($oneValue["actual"]);

            array_push($achivementValuesArray, $value);
        }

        $achivementAuthorObject->SetStreamerName($achivementAuthor["name"]);
        $achivementAuthorObject->SetStreamerUrl($achivementAuthor["url"]);

        $achivement = new Achivement();

        $achivement->SetID($achivementID);
        $achivement->SetTitle($achivementTitle);
        $achivement->SetText($achivementText);
        $achivement->SetValues($achivementValuesArray);
        $achivement->SetAuthor($achivementAuthorObject);
        $achivement->SetValidatedBy($achivementValidatedBy);
        $achivement->SetValidatedTime($achivementValidatedTime);
        $achivement->SetStreamers($achivementStreamersArray);
        $achivement->SetStartTime($achivementStartTime);
        $achivement->SetGoalTime($achivementGoalTime);

        return $this->PostAchivement($achivement);
    }

    
    public static function DeleteAchivement($id)
    {
        $achivementDAO = new AchivementDao();
        $achivementToDelete = null;

        $index = 0;

        foreach(self::$loadedAchivements as $achivement)
        {
            if($achivement->GetAchivementID() == $id)
            {
                $achivementToDelete = $achivement;
            }
            $index++;
        }
        
        if($achivementToDelete)
        {
            array_splice(self::$loadedAchivements, $index, 1);
            $achivementDAO->Delete($achivement);
        }

        return $achivementToDelete;
    }
}
?>