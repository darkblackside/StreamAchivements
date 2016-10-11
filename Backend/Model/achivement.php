<?php
class Achivement
{
    private $AchivementID;
    private $Title;
    private $Text;
    private $Values = array();
    private $Author;
    private $ValidatedBy;
    private $ValidatedTime;
    private $Streamers = array();
    private $StartTime;
    private $GoalTime;

    public function GetID()
    {
        return $this->AchivementID;
    }
    public function SetID($AchivementID)
    {
        $this->AchivementID = $AchivementID;
    }

    public function GetTitle()
    {
        return $this->Title;
    }
    public function SetTitle($Title)
    {
        $this->Title = $Title;
    }

    public function GetText()
    {
        return $this->Text;
    }
    public function SetText($Text)
    {
        $this->Text = $Text;
    }

    public function GetValues()
    {
        return $this->Values;
    }
    public function SetValues($Values)
    {
        $this->Values = $Values;
    }

    public function GetAuthor()
    {
        return $this->Author;
    }
    public function SetAuthor($Author)
    {
        $this->Author = $Author;
    }

    public function GetValidatedBy()
    {
        return $this->ValidatedBy;
    }
    public function SetValidatedBy($ValidatedBy)
    {
        $this->ValidatedBy = $ValidatedBy;
    }

    public function GetValidatedTime()
    {
        return $this->ValidatedTime;
    }
    public function SetValidatedTime($ValidatedTime)
    {
        $this->ValidatedTime = $ValidatedTime;
    }

    public function GetStreamers()
    {
        return $this->Streamers;
    }
    public function SetStreamers($Streamers)
    {
        $this->Streamers = $Streamers;
    }

    public function GetStartTime()
    {
        return $this->StartTime;
    }
    public function SetStartTime($StartTime)
    {
        $this->StartTime = $StartTime;
    }

    public function GetGoalTime()
    {
        return $this->GoalTime;
    }
    public function SetGoalTime($GoalTime)
    {
        $this->GoalTime = $GoalTime;
    }

    public function ToJson()
    {
        
        $response = "{";
        $response .= "\"id\":".$this->GetAchivementID();
        $response .= "\"title\":\"".$this->GetTitle()."\",";
        $response .= "\"text\":\"".$this->GetText()."\",";
        $response .= "\"values\":[";
        foreach($this->GetValues() as $value)
        {
            $response .= $value->ToJson();
        }
        $response .= "],";
        $response .= "\"author\":\"".$this->GetAuthor()->ToJson()."\",";
        $response .= "\"validatedBy\":\"".$this->GetValidatedBy()."\",";
        $response .= "\"validatedTime\":\"".$this->GetValidatedTime()."\",";
        $response .= "\"streamers\":[";
        foreach($this->GetStreamers() as $AchivementStreamer)
        {
            $response .= $AchivementStreamer->ToJson();
        }
        $response .= "],";
        $response .= "\"startTime\":\"".$this->GetStartTime()."\",";
        $response .= "\"goalTime\":\"".$this->GetGoalTime()."\"";
        $response .= "}";

        return response;
    }
}
?>