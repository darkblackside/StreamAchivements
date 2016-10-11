import { Streamer } from './Streamer';

export class StreamerAchivement
{
  id: number;
  startTime: string;
  endTime: string;
  streamer: Streamer;

  public GetStartTime()
  {
    let result: string;
    let a: Date;
    a = new Date(this.startTime);
    result = a.getDate()+"."+(a.getMonth()+1)+"."+a.getFullYear();
    return result;
  }

  public GetEndTime()
  {
    let result: string;
    let a: Date;
    a = new Date(this.endTime);
    result = a.getDate()+"."+(a.getMonth()+1)+"."+a.getFullYear();
    return result;
  }
}
