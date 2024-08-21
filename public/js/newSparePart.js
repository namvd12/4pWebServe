Date.prototype.addDays = function (days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
};
function selectCycle() {
    var cycle = document.getElementById("cycle").value;
    var timeStart = new Date();
    document.getElementById("replacementDate").valueAsDate = timeStart.addDays(
        Number(cycle)
    );
}
function selectReplacementDate() {
    var timeStart = new Date();
    var timeReplacementDate =
        document.getElementById("replacementDate").valueAsDate;
    var cycle = Math.round(
        Math.abs(timeReplacementDate - timeStart) / (1000 * 3600 * 24)
    );

    document.getElementById("cycle").value = cycle;
}
