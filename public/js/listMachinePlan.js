$(document).ready(function () {
    sortTableByLine();
    sortTableByMachine();
    MergeGridCells("Machine", "machine-column");
    MergeGridCells("Line", "line-column");
});
function sortTableByLine() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("mytable");
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
      first, which contains table headers):*/
        for (i = 1; i < rows.length - 1; i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
        one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[0];
            y = rows[i + 1].getElementsByTagName("TD")[0];
            //check if the two rows should switch place:
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}
function sortTableByMachine() {
    var table, rows, switching, i, x0, y0, x, y, shouldSwitch;
    table = document.getElementById("mytable");
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
      first, which contains table headers):*/
        for (i = 1; i < rows.length - 1; i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
        one from current row and one from the next:*/
            x0 = rows[i].getElementsByTagName("TD")[0];
            y0 = rows[i + 1].getElementsByTagName("TD")[0];
            x = rows[i].getElementsByTagName("TD")[1];
            y = rows[i + 1].getElementsByTagName("TD")[1];
            //check if the two rows should switch place:
            if (
                x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase() &&
                x0.innerHTML.toLowerCase() == y0.innerHTML.toLowerCase()
            ) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}
function MergeGridCells(th_name, class_td) {
    var dimension_col = null;

    var i = 1;
    // First, scan first row of headers for the "Line" column.
    $("#mytable")
        .find("th")
        .each(function () {
            if ($(this).text() == th_name) {
                dimension_col = i;
            }
            i++;
        });

    // first_instance holds the first instance of identical td
    var first_instance = null;
    var rowspan = 1;
    // iterate through rows
    $("#mytable")
        .find("tr.inforMachine-row")
        .each(function () {
            // find the td of the correct column (determined by the dimension_col set above)
            var line_td = $(this).find(
                "td." + class_td + ":nth-child(" + dimension_col + ")"
            );
            if (first_instance == null) {
                // must be the first row
                first_instance = line_td;
            } else if (line_td.text() == first_instance.text()) {
                // the current td is identical to the previous
                // remove the current td
                line_td.remove();
                ++rowspan;
                // increment the rowspan attribute of the first instance
                first_instance.attr("rowspan", rowspan);
            } else {
                // this cell is different from the last
                first_instance = line_td;
                rowspan = 1;
            }
        });
}

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
