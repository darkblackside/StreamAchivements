"use strict";
var StreamerAchivement = (function () {
    function StreamerAchivement() {
    }
    StreamerAchivement.prototype.GetStartTime = function () {
        var result;
        var a;
        a = new Date(this.startTime);
        result = a.getDate() + "." + (a.getMonth() + 1) + "." + a.getFullYear();
        return result;
    };
    StreamerAchivement.prototype.GetEndTime = function () {
        var result;
        var a;
        a = new Date(this.endTime);
        result = a.getDate() + "." + (a.getMonth() + 1) + "." + a.getFullYear();
        return result;
    };
    return StreamerAchivement;
}());
exports.StreamerAchivement = StreamerAchivement;
//# sourceMappingURL=StreamerAchivement.js.map