var predefined_val = ""; // your predefined value.
$(document).ready(function () {
    setInterval(function () {
        var date = document.getElementById("daySearch").value;

        $.ajax({
            url: "viewCallMaterialDay", //put relative url here, script which will return php
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                daySearch: date,
            },
            success: function (response) {
                var data = response; // response data from your php script
                if (predefined_val == "") {
                    predefined_val = data;
                } else if (predefined_val !== data) {
                    predefined_val = data;
                    $("#table").html(data);
                }
            },
        });
    }, 1000); // function will run every 5 seconds
});

function updateClick(callID, status, note) {
    document.getElementById("callID").value = callID;
    document.getElementById("note").value = note;
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
    document.getElementById("status").value = status;
}
function modalClick() {
    var callID = document.getElementById("callID").value;
    var status = document.getElementById("status").value;
    var note = document.getElementById("note").value;

    if (callID != null && status != null) {
        $.ajax({
            url: "updateStatusCall",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                callID: callID,
                status: status,
                note: note,
            },
            success: function (response) {
                if (response != "Error") {
                    // alert("Save done");
                    $(".modal").modal("hide");
                    // location.reload();
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

function dateClicked() {
    var date = document.getElementById("daySearch").value;
    $.ajax({
        url: "viewCallMaterialDay", //put relative url here, script which will return php
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            daySearch: date,
        },
        success: function (response) {
            var data = response; // response data from your php script
            $("#table").html(response);
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}

function toDayClicked(date) {
    document.getElementById("daySearch").value = date;
    $.ajax({
        url: "viewCallMaterialDay", //put relative url here, script which will return php
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            daySearch: date,
        },
        success: function (response) {
            var data = response; // response data from your php script
            $("#table").html(response);
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
