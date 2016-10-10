<?php
class achivementDAO
{
    public function Create($achivement)
    {
        $sql = "INSERT INTO achivements (title, text, authorName, authorUrl, validatedBy, validatedTime, startTime, goalTime) VALUES ( 
        '".$achivement->GetTitle()."',
        '".$achivement->GetText()."',
        '".$achivement->GetAuthorName()."',
        '".$achivement->GetAuthorUrl()."',
        '".$achivement->GetValidatedBy()."',
        '".$achivement->GetValidatedTime()."',
        '".$achivement->GetStartTime()."',
        '".$achivement->GetGoalTime()."');";

        $achivement->SetachivementID(DoSqlCommand("CREATE", $sql));
    }

    public function Read($achivement = null)
    {
        $sql = "SELECT 
        a1.id, a1.title, a1.text, a1.validatedBy, a1.validatedTime, a1.startTime, a1.goalTime, s1.id as authorId, s1.name, s1.url
        FROM
        achivements a1
        INNER JOIN Streamers s1 ON a1.author = s1.id";

        if($id)
        {
            $sql = "SELECT
            a1.id, a1.title, a1.text, a1.validatedBy, a1.validatedTime, a1.startTime, a1.goalTime, s1.id as authorId, s1.name, s1.url
            FROM
            achivements a1
            INNER JOIN Streamers s1 ON a1.author = s1.id
            WHERE id = ".$id;
        }

        return DoSqlCommand("SELECT", $sql);
    }

    public function Update($achivement)
    {
        if($achivement)
        {
            $id = $achivement->GetachivementID();

            if($id)
            {
                $sql = "UPDATE achivements SET 
                title = '".$achivement->GetTitle()."',
                text = '".$achivement->GetText()."',
                authorName = '".$achivement->GetAuthorName()."',
                authorUrl = '".$achivement->GetAuthorUrl()."',
                validatedBy = '".$achivement->GetValidatedBy()."',
                validatedTime = '".$achivement->GetValidatedTime()."',
                startTime = '".$achivement->GetStartTime()."',
                goalTime = '".$achivement->GetGoalTime()."'
                WHERE id = ".$id;

                return DoSqlCommand("UPDATE", $sql);
            }
        }
    }

    public function Delete($achivement)
    {
        if($achivement)
        {
            $id = $achivement->GetachivementID();

            if($id)
            {
                $sql = "DELETE FROM achivements WHERE id = ".$id;

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
                $response = array();
                /* fetch object array */
                while ($row = $result->fetch_row())
                {
                    //a1.id, a1.title, a1.text, a1.validatedBy, a1.validatedTime, a1.startTime, a1.goalTime, s1.id as authorId, s1.name, s1.url
                    //--0--, ----1---, ----2--, -----3--------, -------4--------, -----5------, ------6----, --7--------------, ---8---, ---9--
                    printf ("%s (%s)\n", $row[0], $row[1]);
                    $achivement = new Achivement();

                    $author = new Streamer();
                    $author->SetStreamerID($row[7]);
                    $author->SetStreamerName($row[8]);
                    $author->SetStreamerUrl($row[9]);

                    $achivement->SetAchivementID($row[0]);
                    $achivement->SetTitle($row[1]);
                    $achivement->SetText($row[2]);
                    $achivement->SetAuthor($author);
                    $achivement->SetValidatedBy($row[3]);
                    $achivement->SetValidatedTime($row[4]);
                    $achivement->SetStartTime($row[5]);
                    $achivement->SetGoalTime($row[6]);

                    array_push($response);
                }

                /* free result set */
                $result->close();
            }
        }

        mysqli_close($link);

        return $response;
    }
}
?>