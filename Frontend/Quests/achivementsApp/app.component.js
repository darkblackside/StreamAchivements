"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var core_1 = require('@angular/core');
var http_1 = require('@angular/http');
var Achivement_1 = require('./models/Achivement');
require('rxjs/add/operator/map');
var AppComponent = (function () {
    function AppComponent(http) {
        var _this = this;
        this.http = http;
        this.achivements = new Array();
        var response = http.get('../test/quests.json')
            .subscribe(function (data) {
            for (var _i = 0, _a = data.json(); _i < _a.length; _i++) {
                var achivementJson = _a[_i];
                _this.achivements.push(Object.assign(new Achivement_1.Achivement(), achivementJson));
            }
        });
    }
    AppComponent = __decorate([
        core_1.Component({
            selector: 'achivements',
            templateUrl: 'achivementsApp/achivementsTemplate.html',
            styleUrls: ['style/mainstyle.css', 'style/ionicons.min.css']
        }), 
        __metadata('design:paramtypes', [http_1.Http])
    ], AppComponent);
    return AppComponent;
}());
exports.AppComponent = AppComponent;
//# sourceMappingURL=app.component.js.map