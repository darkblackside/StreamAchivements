"use strict";
var Achivement = (function () {
    function Achivement() {
        this.expanded = false;
    }
    Achivement.prototype.GetStartTime = function () {
        var result;
        var a = new Date(this.startTime);
        result = a.getDate() + "." + (a.getMonth() + 1) + "." + a.getFullYear();
        return result;
    };
    Achivement.prototype.GetGoalTime = function () {
        var result;
        var a;
        a = new Date(this.goalTime);
        result = a.getDate() + "." + (a.getMonth() + 1) + "." + a.getFullYear();
        return result;
    };
    Achivement.prototype.ShortText = function () {
        if (this.text.length <= 50) {
            return this.text;
        }
        else {
            return this.text.substring(0, 50) + "...";
        }
    };
    return Achivement;
}());
exports.Achivement = Achivement;
//# sourceMappingURL=Achivement.js.map