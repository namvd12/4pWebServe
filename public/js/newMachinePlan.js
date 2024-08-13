function selectMachine() {
    var MachineID = document.getElementById("Machine").value;
    $.ajax({
        url: "getMachineInfor",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            machineID: MachineID,
        },
        success: function (response) {
            console.log(response.line);
            if (response != "Error") {
                document.getElementById("code").value = response.deviceCode;
                document.getElementById("line").value = response.line;
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}

Date.prototype.addDays = function (days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
};

function selectCycle() {
    var cycle = document.getElementById("cycle").value;
    document.getElementById("timeStart").valueAsDate = new Date();
    var timeStart = new Date();
    document.getElementById("timeEnd").valueAsDate = timeStart.addDays(
        Number(cycle)
    );
}

function selectTimeStart() {
    var cycle = document.getElementById("cycle").value;
    var timeStart = document.getElementById("timeStart").valueAsDate;
    document.getElementById("timeEnd").valueAsDate = timeStart.addDays(
        Number(cycle)
    );
}
