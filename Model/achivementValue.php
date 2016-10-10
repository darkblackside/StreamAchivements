<?php
class ArchivementValue
{
    private $ArchivementValueID;
    private $ValueName;
    private $ValueGoal;
    private $ValueActual;
    private $AchivementID;

    public function GetAchivementValueID()
    {
        return $this->AchivementValueID;
    }
    public function SetAchivementValueID($AchivementValueID)
    {
        $this->AchivementValueID = $AchivementValueID;
    }

    public function GetValueName()
    {
        return $this->ValueName;
    }
    public function SetValueName($ValueName)
    {
        $this->ValueName = $ValueName;
    }

    public function GetValueGoal()
    {
        return $this->ValueGoal;
    }
    public function SetValueGoal($ValueGoal)
    {
        $this->ValueGoal = $ValueGoal;
    }

    public function GetValueActual()
    {
        return $this->ValueActual;
    }
    public function SetValueActual($ValueActual)
    {
        $this->ValueActual = $ValueActual;
    }

    public function GetAchivementID()
    {
        return $this->AchivementID;
    }
    public function SetAchivementID($AchivementID)
    {
        $this->AchivementID = $AchivementID;
    }

    public function ToJson()
    {
        
        $response = "{";
        $response .= "\"id\":".$this->GetArchivementValueID();
        $response .= "\"name\":\"".$this->GetValueName()."\",";
        $response .= "\"goal\":\"".$this->GetValueGoal()."\",";
        $response .= "\"actual\":\"".$this->GetValueActual()."\"";
        $response .= "}";

        return response;
    }
}
?>