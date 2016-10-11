import { Component } from '@angular/core';
import { Http } from '@angular/http';
import { Achivement } from './models/Achivement';
import { Streamer } from './models/Streamer';
import { StreamerAchivement } from './models/StreamerAchivement';
import { AchivementValue } from './models/AchivementValue';
import 'rxjs/add/operator/map';

@Component({
  selector: 'achivements',
  templateUrl: 'achivementsApp/achivementsTemplate.html',
  styleUrls: ['style/mainstyle.css', 'style/ionicons.min.css']
})

export class AppComponent
{
  constructor(private http:Http)
  {
    this.achivements = new Array();

    let response = http.get('../test/quests.json')
        .subscribe(
          data => {
            for(let achivementJson of data.json())
            {
              this.achivements.push(Object.assign(new Achivement(), achivementJson));
            }
          }
        );
  }

  achivements: Achivement[];
}
