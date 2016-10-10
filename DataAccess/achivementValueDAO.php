<?php
class ArchivementDAO
{
    public function Create($archivement)
    {
        $sql = "INSERT INTO Archivements (title, text, authorName, authorUrl, validatedBy, validatedTime, startTime, goalTime) VALUES ( 
        '".$archivement->GetTitle()."',
        '".$archivement->GetText()."',
        '".$archivement->GetAuthorName()."',
        '".$archivement->GetAuthorUrl()."',
        '".$archivement->GetValidatedBy()."',
        '".$archivement->GetValidatedTime()."',
        '".$archivement->GetStartTime()."',
        '".$archivement->GetGoalTime()."');";

        $archivement->SetArchivementID(DoSqlCommand("CREATE", $sql));
    }

    public function Read($archivement)
    {
        $sql = "SELECT * FROM Archivements";
        if($archivement)
        {
            $sql = "SELECT * FROM Archivements WHERE id = ".$archivement->GetArchivementID();
        }

        return DoSqlCommand("SELECT", $sql);
    }

    public function Update($archivement)
    {
        if($archivement)
        {
            $id = $archivement->GetArchivementID();

            if($id)
            {
                $sql = "UPDATE Archivements SET 
                title = '".$archivement->GetTitle()."',
                text = '".$archivement->GetText()."',
                authorName = '".$archivement->GetAuthorName()."',
                authorUrl = '".$archivement->GetAuthorUrl()."',
                validatedBy = '".$archivement->GetValidatedBy()."',
                validatedTime = '".$archivement->GetValidatedTime()."',
                startTime = '".$archivement->GetStartTime()."',
                goalTime = '".$archivement->GetGoalTime()."'
                WHERE id = ".$id;

                return DoSqlCommand("UPDATE", $sql);
            }
        }
    }

    public function Delete($archivement)
    {
        if($archivement)
        {
            $id = $archivement->GetArchivementID();

            if($id)
            {
                $sql = "DELETE FROM Archivements WHERE id = ".$id;

                return DoSqlCommand("DELETE", $sql);
            }
        }
    }


    private function DoSqlCommand($mode, $sql)
    {
        $response = "";

        $link = mysqli_connect('localhost', 'user', 'pass', 'dbname');
        mysqli_set_charset($link,'utf8');

        $result = mysqli_query($link,$sql);
 
        if (!$result)
        {
            http_response_code(404);
            die(mysqli_error());
        }
        else
        {
            if($mode == "DELETE")
            {
                $response = mysql_affected_rows($link);
            }
            else if($mode == "INSERT")
            {
                $response = mysql_inserted_id($link);
            }
            else if($mode == "UPDATE")
            {
                $response = mysql_affected_rows($link);
            }
            else if($mode == "SELECT")
            {
                //TODO
            }
        }

        mysqli_close($link);

        return $response;
    }
}
?>