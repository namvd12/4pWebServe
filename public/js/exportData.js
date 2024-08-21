function saveExportClick() {
    var machineCode = document.getElementById("machineCode").value;
    var machineName = document.getElementById("machineName").value;
    var line_lane = document.getElementById("line_lane").value;
    var troubleName = document.getElementById("troubleName").value;
    var issue = document.getElementById("issue").value;
    var checking1 = document.getElementById("checking1").value;
    var checking2 = document.getElementById("checking2").value;
    var action1 = document.getElementById("action1").value;
    var action2 = document.getElementById("action2").value;
    var result = document.getElementById("result").value;
    var writer = document.getElementById("writer").value;
    var checked = document.getElementById("checked").value;
    var approved = document.getElementById("approved").value;
    var historyID = document.getElementById("historyID").value;
    $.ajax({
        url: "exportData",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            machineCode: machineCode,
            machineName: machineName,
            line_lane: line_lane,
            troubleName: troubleName,
            issue: issue,
            checking1: checking1,
            checking2: checking2,
            action1: action1,
            action2: action2,
            result: result,
            writer: writer,
            checked: checked,
            approved: approved,
            historyID: historyID,
        },
        success: function (response) {
            if (response != "Error") {
                document.getElementById("folderExport").value = response;
                alert("Done. Folder:\r\n" + response);
            } else {
                alert(response);
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
