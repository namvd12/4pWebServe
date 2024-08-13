function updateClick(deviceID, item, status, maintenaceID) {
    document.getElementById("code").value = deviceID;
    document.getElementById("item").value = item;
    document.getElementById("statusUpdate").value = status;
    document.getElementById("maintenaceID").value = maintenaceID;

    if (status == "OK") {
        let radBtnDefault = document.getElementById("flexRadioOK");
        radBtnDefault.checked = true;
    } else {
        let radBtnDefault = document.getElementById("flexRadioWarning");
        radBtnDefault.checked = true;
    }
    checkRadio(status);
}

// modal handle
function checkRadio(status) {
    document.getElementById("statusUpdate").value = status;
    if (status == "OK") {
        document.getElementById("fieldset_plan").hidden = false;
        document.getElementById("modalSave").hidden = false;
    } else {
        document.getElementById("fieldset_plan").hidden = true;
        document.getElementById("modalSave").hidden = false;
    }
}

function modalClick() {
    var code = document.getElementById("code").value;
    var item = document.getElementById("item").value;
    var cycle = document.getElementById("cycle").value;
    var timeStart = document.getElementById("timeStart").value;
    var timeEnd = document.getElementById("timeEnd").value;
    var note = document.getElementById("note").value;

    var statusUpdate = document.getElementById("statusUpdate").value;
    statusUpdate = statusUpdate.toUpperCase();
    var maintenaceID = document.getElementById("maintenaceID").value;

    if (
        cycle != null &&
        timeStart != null &&
        timeEnd != null &&
        note != null &&
        item != null
    ) {
        $.ajax({
            url: "updateNewMachinePlan",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                code: code,
                item: item,
                cycle: cycle,
                timeStart: timeStart,
                timeEnd: timeEnd,
                note: note,
                statusUpdate: statusUpdate,
                maintenaceID: maintenaceID,
            },
            success: function (response) {
                if (response != "Error") {
                    alert("Save done");
                    $(".modal").modal("hide");
                    location.reload();
                    // console.log(response);
                } else {
                    alert("Save error");
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    }
}

function deleteClick(maintenaceID, time) {
    if (confirm("Do you want delete?")) {
        if (maintenaceID != null) {
            $.ajax({
                url: "deleteMachinePlan",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    maintenaceID: maintenaceID,
                    day: time,
                },
                success: function (response) {
                    if (response != "Error") {
                        location.reload();
                    } else {
                        alert("Save error");
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                },
            });
        }
    }
}
