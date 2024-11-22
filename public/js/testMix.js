/******/ (() => {
    // webpackBootstrap
    /*!*********************************!*\
  !*** ./resources/js/testMix.js ***!
  \*********************************/
    $(document).ready(function () {
        sortTable(8);
    });
    function sortTable(columnIndex) {
        var table,
            rows,
            switching,
            i,
            x,
            y,
            shouldSwitch,
            dir,
            switchcount = 0;
        table = document.getElementById("mytable");
        switching = true;
        dir = "asc";
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < rows.length - 1; i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[columnIndex];
                y = rows[i + 1].getElementsByTagName("TD")[columnIndex];

                // Kiểm tra nếu cột hiện tại là số
                if (!isNaN(x.innerHTML) && !isNaN(y.innerHTML)) {
                    var xValue = parseFloat(x.innerHTML);
                    var yValue = parseFloat(y.innerHTML);
                } else {
                    var xValue = x.innerHTML.toLowerCase();
                    var yValue = y.innerHTML.toLowerCase();
                }
                if (dir == "asc") {
                    if (xValue > yValue) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (xValue < yValue) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
    function updateClick(sparePartID) {
        document.getElementById("sparePartID").value = sparePartID;
    }
    function modalClick() {
        var sparePartID = document.getElementById("sparePartID").value;
        var cycle = document.getElementById("cycle").value;
        var replacementDate = document.getElementById("replacementDate").value;
        if (sparePartID != null && cycle != null && replacementDate != null) {
            $.ajax({
                url: "updateTimeSparePart",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    sparePartID: sparePartID,
                    cycle: cycle,
                    replacementDate: replacementDate,
                },
                success: function success(response) {
                    if (response != "Error") {
                        alert("Save done");
                        $(".modal").modal("hide");
                        location.reload();
                        // console.log(response);
                    } else {
                        alert("Save error");
                    }
                },
                error: function error(xhr) {
                    console.log(xhr.responseText);
                },
            });
        }
    }
    function deleteClick(sparePartID) {
        if (confirm("Do you want delete?")) {
            if (sparePartID != null) {
                $.ajax({
                    url: "deleteSparePart",
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        sparePartID: sparePartID,
                    },
                    success: function success(response) {
                        if (response != "Error") {
                            location.reload();
                        } else {
                            alert("Save error");
                        }
                    },
                    error: function error(xhr) {
                        console.log(xhr.responseText);
                    },
                });
            }
        }
    }
    /******/
})();
