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
