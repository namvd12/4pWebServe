function searchDeviceClick() {
    var data = document.getElementById("dataDeviceSearch").value;
    $.ajax({
        url: "searchDevice",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            dataSearch: data,
        },
        success: function (response) {
            if (response != "Error") {
                $("#table").html(response);
            } else {
                console.log(response);
                alert("Save error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}

function searchReportClick() {
    var timeForm = document.getElementById("timeFrom").value;
    var timeTo = document.getElementById("timeTo").value;
    var dataSearch = document.getElementById("dataHistorySearch").value;
    $.ajax({
        url: "searchHistoryReport",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            timeForm: timeForm,
            timeTo: timeTo,
            dataSearch: dataSearch,
        },
        success: function (response) {
            if (response != "Error") {
                $("#table").html(response);
            } else {
                console.log(response);
                alert("Save error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function deleteMachineClick() {
    var machineCode = document.getElementById("machineCode").value;
    $.ajax({
        url: "deleteMachine",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            machineCode: machineCode,
        },
        success: function (response) {
            if (response != "Error") {
                location.reload();
            } else {
                console.log(response);
                alert("Delete error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function deleteHistoryClick(historyID, historyIDOK) {
    var timeForm = document.getElementById("timeFrom").value;
    var timeTo = document.getElementById("timeTo").value;
    var dataSearch = document.getElementById("dataHistorySearch").value;
    if (confirm("Do you want delete?")) {
        $.ajax({
            url: "deleteHistory",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                historyID: historyID,
                historyIDOK: historyIDOK,
                timeForm: timeForm,
                timeTo: timeTo,
                dataSearch: dataSearch,
            },
            success: function (response) {
                if (response != "Error") {
                    $("#table").html(response);
                } else {
                    console.log(response);
                    alert(response);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    }
}

function saveAddnewDevice() {
    var machineCode = document.getElementById("machineCode").value;
    var machineName = document.getElementById("machineName").value;
    var model = document.getElementById("model").value;
    var serial = document.getElementById("serial").value;
    var topBot = document.getElementById("topBot").value;
    var line = document.getElementById("line").value;
    var lane = document.getElementById("lane").value;
    $.ajax({
        url: "saveNewDevice",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            machineCode: machineCode,
            machineName: machineName,
            model: model,
            serial: serial,
            topBot: topBot,
            line: line,
            lane: lane,
        },
        success: function (response) {
            if (response != "Error") {
                alert("Save done");
                window.location.href = response;
            } else {
                alert("Save error!!!");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}

function deleteDevice(deviceID) {
    if (confirm("Do you want delete?")) {
        $.ajax({
            url: "deleteDevice",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                deviceID: deviceID,
            },
            success: function (response) {
                if (response != "Error") {
                    alert("Done");
                    $("#table").html(response);
                } else {
                    console.log(response);
                    alert(response);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    }
}
