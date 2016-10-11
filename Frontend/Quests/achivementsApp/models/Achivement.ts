import { Streamer } from './Streamer';
import { StreamerAchivement } from './StreamerAchivement';
import { AchivementValue } from './AchivementValue';

export class Achivement
{
  id: number;
  title: string;
  text: string;
  values: AchivementValue[];
  author: Streamer;
  validatedBy: string;
  validatedTime: string;
  streamers: StreamerAchivement[];
  startTime: string;
  goalTime: string;
  expanded: boolean = false;

  public GetStartTime() : string
  {
    let result: string;
    let a = new Date(this.startTime);
    result = a.getDate()+"."+(a.getMonth()+1)+"."+a.getFullYear();
    return result;
  }

  public GetGoalTime()
  {
    let result: string;
    let a: Date;
    a = new Date(this.goalTime);
    result = a.getDate()+"."+(a.getMonth()+1)+"."+a.getFullYear();
    return result;
  }

  public ShortText()
  {
    if(this.text.length <= 50)
    {
      return this.text;
    }
    else
    {
      return this.text.substring(0, 50) + "...";
    }
  }
}
