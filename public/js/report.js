var modeView = "btn_allLine";
$(document).ready(function () {
    var dateNow = new Date();
    document.getElementById("daySearch").valueAsDate = dateNow;
    var str_dateTo = date_string(dateNow);

    var dateForm = new Date(dateNow.setDate(dateNow.getDate() - 7));
    var str_dateFrom = date_string(dateForm);
    showChar_ReportAllLine_ByDay(str_dateFrom, str_dateTo);
});
/*********View click*********/
function dateClicked() {
    var date = document.getElementById("daySearch").valueAsDate;
    var dateSeach = new Date(date);
    var str_dateTo = date_string(dateSeach);

    var dateForm = new Date(date.setDate(dateSeach.getDate() - 7));
    var str_dateFrom = date_string(dateForm);
    if (modeView == "btn_allLine") {
        showChar_ReportAllLine_ByDay(str_dateFrom, str_dateTo);
    } else if (modeView == "btn_eachLine") {
        showChar_ReportEachLine_ByDay(str_dateTo);
    } else if (modeView == "btn_mttr") {
        showChar_ReportMTTR_ByDay(str_dateTo);
    } else if (modeView == "btn_mtbf") {
        showChar_ReportMTBF_ByDay(str_dateTo);
    }
}
function weekClicked() {
    var week = document.getElementById("weekSearch").value;
    if (modeView == "btn_allLine") {
        showChar_ReportAllLine_ByWeek(week);
    } else if (modeView == "btn_eachLine") {
        showChar_ReportEachLine_ByWeek(week);
    } else if (modeView == "btn_mttr") {
        showChar_ReportMTTR_ByWeek(week);
    } else if (modeView == "btn_mtbf") {
        showChar_ReportMTBF_ByWeek(week);
    }
}
function monthClicked() {
    var month = document.getElementById("monthSearch").value;
    if (modeView == "btn_allLine") {
        showCharReport_AllLine_ByMonth(month);
    } else if (modeView == "btn_eachLine") {
        showCharReport_EachLine_ByMonth(month);
    } else if (modeView == "btn_mttr") {
        showChar_ReportMTTR_ByMonth(month);
    } else if (modeView == "btn_mtbf") {
        showChar_ReportMTBF_ByMonth(month);
    }
}
function viewModeClick(mode) {
    modeView = mode;
    if (modeView == "btn_allLine") {
        document.getElementById("nameReport").innerHTML = "All Line";
    } else if (modeView == "btn_eachLine") {
        document.getElementById("nameReport").innerHTML = "Each Line";
    } else if (modeView == "btn_mttr") {
        document.getElementById("nameReport").innerHTML = "MTTR";
    } else if (modeView == "btn_mtbf") {
        document.getElementById("nameReport").innerHTML = "MTBF";
    }
    dateClicked();
}
/*Day*/
function showChar_ReportAllLine_ByDay(dateForm, dateTo) {
    $.ajax({
        url: "viewReportCurrentByDay",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            timeFrom: dateForm,
            timeTo: dateTo,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                const listReport = response;
                let listDay = new Array();
                let listTimeNG = new Array();
                let listCountNG = new Array();
                for (const report of listReport) {
                    listDay.push(report.timeTo);
                    listTimeNG.push(report.time_NG);
                    listCountNG.push(report.count_NG);
                }
                drawChartReport(listDay, listTimeNG, listCountNG);
            } else {
                console.log(response);
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function showChar_ReportEachLine_ByDay(date) {
    $.ajax({
        url: "viewReportEachLineByDay",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            date: date,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                const listReport = response;
                // console.log(listReport);
                let listLine = new Array();
                let listTimeNG = new Array();
                let listCountNG = new Array();
                for (const report of listReport) {
                    listLine.push(report.line);
                    listTimeNG.push(report.time_NG);
                    listCountNG.push(report.count_NG);
                }
                drawChartReport(listLine, listTimeNG, listCountNG);
            } else {
                console.log(response);
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function showChar_ReportMTTR_ByDay(date) {
    $.ajax({
        url: "viewReportMTTRByDay",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            date: date,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                const listReport = response;
                // console.log(listReport);
                drawChartReport_MTTR_MTBF(
                    listReport.listDay,
                    listReport.listMTTR
                );
            } else {
                console.log(response);
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function showChar_ReportMTBF_ByDay(date) {
    $.ajax({
        url: "viewReportMTBFByDay",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            date: date,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                const listReport = response;
                // console.log(listReport);
                drawChartReport_MTTR_MTBF(
                    listReport.listDay,
                    listReport.listMTBF
                );
            } else {
                console.log(response);
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
/*Week*/
function showChar_ReportAllLine_ByWeek(Week) {
    $.ajax({
        url: "viewReportCurrentByWeek",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            week: Week,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                const listReport = response;
                // console.log(listReport);
                let listWeek = new Array();
                let listTimeNG = new Array();
                let listCountNG = new Array();
                for (const report of listReport) {
                    listWeek.push(report.week);
                    listTimeNG.push(report.time_NG);
                    listCountNG.push(report.count_NG);
                }
                drawChartReport(listWeek, listTimeNG, listCountNG);
            } else {
                console.log(response);
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function showChar_ReportEachLine_ByWeek(Week) {
    $.ajax({
        url: "viewReportEachLineByWeek",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            week: Week,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                const listReport = response;
                // console.log(listReport);
                let listline = new Array();
                let listTimeNG = new Array();
                let listCountNG = new Array();
                for (const report of listReport) {
                    listline.push(report.line);
                    listTimeNG.push(report.time_NG);
                    listCountNG.push(report.count_NG);
                }
                drawChartReport(listline, listTimeNG, listCountNG);
            } else {
                console.log(response);
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function showChar_ReportMTTR_ByWeek(Week) {
    $.ajax({
        url: "viewReportMTTRByWeek",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            week: Week,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                const listReport = response;
                drawChartReport_MTTR_MTBF(
                    listReport.listDay,
                    listReport.listMTTR
                );
            } else {
                console.log(response);
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function showChar_ReportMTBF_ByWeek(Week) {
    $.ajax({
        url: "viewReportMTBFByWeek",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            week: Week,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                const listReport = response;
                drawChartReport_MTTR_MTBF(
                    listReport.listDay,
                    listReport.listMTBF
                );
            } else {
                console.log(response);
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
/*Month*/
function showCharReport_AllLine_ByMonth(month) {
    $.ajax({
        url: "viewReportCurrentByMonth",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            month: month,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                const listReport = response;
                // console.log(listReport);
                let listMonth = new Array();
                let listTimeNG = new Array();
                let listCountNG = new Array();
                for (const report of listReport) {
                    listMonth.push(report.month);
                    listTimeNG.push(report.time_NG);
                    listCountNG.push(report.count_NG);
                }
                drawChartReport(listMonth, listTimeNG, listCountNG);
            } else {
                console.log(response);
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function showCharReport_EachLine_ByMonth(month) {
    $.ajax({
        url: "viewReportEachLineByMonth",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            month: month,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                const listReport = response;
                // console.log(listReport);
                let listline = new Array();
                let listTimeNG = new Array();
                let listCountNG = new Array();
                for (const report of listReport) {
                    listline.push(report.line);
                    listTimeNG.push(report.time_NG);
                    listCountNG.push(report.count_NG);
                }
                drawChartReport(listline, listTimeNG, listCountNG);
            } else {
                console.log(response);
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function showChar_ReportMTTR_ByMonth(month) {
    $.ajax({
        url: "viewReportMTRRByMonth",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            month: month,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                const listReport = response;
                drawChartReport_MTTR_MTBF(
                    listReport.listDay,
                    listReport.listMTTR
                );
            } else {
                console.log(response);
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function showChar_ReportMTBF_ByMonth(month) {
    $.ajax({
        url: "viewReportMTBFByMonth",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            month: month,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                const listReport = response;
                drawChartReport_MTTR_MTBF(
                    listReport.listDay,
                    listReport.listMTBF
                );
            } else {
                console.log(response);
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}

/*************Draw charJS*************** */
function drawChartReport(listDay, time_NG, count_NG) {
    let chartStatus = Chart.getChart("myChart"); // <canvas> id
    if (chartStatus != undefined) {
        chartStatus.destroy();
    }
    // Lấy context của canvas element nơi bạn muốn vẽ biểu đồ
    const ctx = document.getElementById("myChart").getContext("2d");
    // Tạo biểu đồ
    const myChart = new Chart(ctx, {
        data: {
            labels: listDay, // Nhãn x-axis
            datasets: [
                {
                    type: "line", // Loại biểu đồ (bar, line, pie, etc.)
                    label: "Count NG",
                    barPercentage: 2,
                    data: count_NG, // Dữ liệu time NG
                    backgroundColor: [
                        // Màu nền của các cột
                        "rgb(254, 38, 78)",
                    ],
                    borderColor: [
                        // Màu viền của các cột
                        "rgb(254, 38, 78)",
                    ],
                    borderWidth: 1, // Độ dày của viền
                    datalabels: {
                        display: false,
                    },
                    fill: false,
                    yAxisID: "y1", // Sử dụng trục Y phụ
                },
                {
                    type: "bar", // Loại biểu đồ (bar, line, pie, etc.)
                    label: "Time NG",
                    barPercentage: 0.7,
                    data: time_NG, // Data count time NG
                    backgroundColor: [
                        // Màu nền của các cột
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                        "rgb(189, 182, 141,1)",
                    ],
                    borderColor: [
                        // Màu viền của các cột
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                        "rgb(189, 182, 141,1)",
                    ],
                    borderWidth: 1, // Độ dày của viền
                    yAxisID: "y", // Sử dụng trục Y chính
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true, // Bắt đầu y-axis từ 0
                    ticks: {
                        display: false, //this will remove only the label
                    },
                    grid: {
                        display: true,
                    },
                },
                x: {
                    grid: {
                        display: true,
                    },
                    ticks: {
                        font: {
                            size: 16, // Kích thước font cho các giá trị trên trục Y
                        },
                    },
                },
                y1: {
                    beginAtZero: true, // Bắt đầu y-axis từ 0
                    max: Math.max(...count_NG) + 10,
                    position: "right",
                    ticks: {
                        display: false, //this will remove only the label
                    },
                    grid: {
                        display: false,
                    },
                },
            },
            plugins: {
                datalabels: {
                    anchor: "end", // Position of the label (top, center, bottom, etc.)
                    align: "top", // Alignment of the label relative to the anchor point
                    formatter: function (value, context) {
                        return value; // Display the value as the label
                    },
                    font: {
                        weight: "bold",
                    },
                },
            },
        },
        plugins: [ChartDataLabels], // Activate the plugin
    });
}
function drawChartReport_MTTR_MTBF(listDay, listMTTR) {
    let chartStatus = Chart.getChart("myChart"); // <canvas> id
    if (chartStatus != undefined) {
        chartStatus.destroy();
    }
    // Lấy context của canvas element nơi bạn muốn vẽ biểu đồ
    const ctx = document.getElementById("myChart").getContext("2d");
    // Tạo biểu đồ
    const myChart = new Chart(ctx, {
        data: {
            labels: listDay, // Nhãn x-axis
            datasets: [
                // {
                //     type: "bar", // Loại biểu đồ (bar, line, pie, etc.)
                //     label: "Line LTE",
                //     barPercentage: 0.7,
                //     data: listMTTR.lineLTE, // Data count time NG
                //     backgroundColor: [
                //         // Màu nền của các cột
                //         "rgba(255, 99, 132, 1)",
                //     ],
                //     borderColor: [
                //         // Màu viền của các cột
                //         "rgba(255, 99, 132, 1)",
                //     ],
                //     borderWidth: 1, // Độ dày của viền
                //     yAxisID: "y", // Sử dụng trục Y chính
                // },
                {
                    type: "bar", // Loại biểu đồ (bar, line, pie, etc.)
                    label: "Line 1",
                    barPercentage: 0.7,
                    data: listMTTR.line1, // Data count time NG
                    backgroundColor: [
                        // Màu nền của các cột
                        "rgba(54, 162, 235, 1)",
                    ],
                    borderColor: [
                        // Màu viền của các cột
                        "rgba(54, 162, 235, 1)",
                    ],
                    borderWidth: 1, // Độ dày của viền
                    yAxisID: "y", // Sử dụng trục Y chính
                },
                {
                    type: "bar", // Loại biểu đồ (bar, line, pie, etc.)
                    label: "Line 2",
                    barPercentage: 0.7,
                    data: listMTTR.line2, // Data count time NG
                    backgroundColor: [
                        // Màu nền của các cột
                        "rgba(255, 206, 86, 1)",
                    ],
                    borderColor: [
                        // Màu viền của các cột
                        "rgba(255, 206, 86, 1)",
                    ],
                    borderWidth: 1, // Độ dày của viền
                    yAxisID: "y", // Sử dụng trục Y chính
                },
                {
                    type: "bar", // Loại biểu đồ (bar, line, pie, etc.)
                    label: "Line 3",
                    barPercentage: 0.7,
                    data: listMTTR.line3, // Data count time NG
                    backgroundColor: [
                        // Màu nền của các cột
                        "rgba(75, 192, 192, 1)",
                    ],
                    borderColor: [
                        // Màu viền của các cột
                        "rgba(75, 192, 192, 1)",
                    ],
                    borderWidth: 1, // Độ dày của viền
                    yAxisID: "y", // Sử dụng trục Y chính
                },
                {
                    type: "bar", // Loại biểu đồ (bar, line, pie, etc.)
                    label: "Line 4",
                    barPercentage: 0.7,
                    data: listMTTR.line4, // Data count time NG
                    backgroundColor: [
                        // Màu nền của các cột
                        "rgba(153, 102, 255, 1)",
                    ],
                    borderColor: [
                        // Màu viền của các cột
                        "rgba(153, 102, 255, 1)",
                    ],
                    borderWidth: 1, // Độ dày của viền
                    yAxisID: "y", // Sử dụng trục Y chính
                },
                {
                    type: "bar", // Loại biểu đồ (bar, line, pie, etc.)
                    label: "Line 5",
                    barPercentage: 0.7,
                    data: listMTTR.line5, // Data count time NG
                    backgroundColor: [
                        // Màu nền của các cột
                        "rgba(255, 159, 64, 1)",
                    ],
                    borderColor: [
                        // Màu viền của các cột
                        "rgba(255, 159, 64, 1)",
                    ],
                    borderWidth: 1, // Độ dày của viền
                    yAxisID: "y", // Sử dụng trục Y chính
                },
                {
                    type: "bar", // Loại biểu đồ (bar, line, pie, etc.)
                    label: "Line 6",
                    barPercentage: 0.7,
                    data: listMTTR.line6, // Data count time NG
                    backgroundColor: [
                        // Màu nền của các cột
                        "rgb(189, 182, 141,1)",
                    ],
                    borderColor: [
                        // Màu viền của các cột
                        "rgb(189, 182, 141,1)",
                    ],
                    borderWidth: 1, // Độ dày của viền
                    yAxisID: "y", // Sử dụng trục Y chính
                },
                {
                    type: "bar", // Loại biểu đồ (bar, line, pie, etc.)
                    label: "Line 7",
                    barPercentage: 0.7,
                    data: listMTTR.line7, // Data count time NG
                    backgroundColor: [
                        // Màu nền của các cột
                        "rgb(231, 182, 234)",
                    ],
                    borderColor: [
                        // Màu viền của các cột
                        "rgb(231, 182, 234)",
                    ],
                    borderWidth: 1, // Độ dày của viền
                    yAxisID: "y", // Sử dụng trục Y chính
                },
                {
                    type: "bar", // Loại biểu đồ (bar, line, pie, etc.)
                    label: "Line 8",
                    barPercentage: 0.7,
                    data: listMTTR.line8, // Data count time NG
                    backgroundColor: [
                        // Màu nền của các cột
                        "rgb(34, 32, 47)",
                    ],
                    borderColor: [
                        // Màu viền của các cột
                        "rgb(34, 32, 47)",
                    ],
                    borderWidth: 1, // Độ dày của viền
                    yAxisID: "y", // Sử dụng trục Y chính
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true, // Bắt đầu y-axis từ 0
                    ticks: {
                        display: false, //this will remove only the label
                    },
                    grid: {
                        display: true,
                    },
                },
                x: {
                    grid: {
                        display: true,
                    },
                    ticks: {
                        font: {
                            size: 16, // Kích thước font cho các giá trị trên trục Y
                        },
                    },
                },
            },
            plugins: {
                datalabels: {
                    anchor: "end", // Position of the label (top, center, bottom, etc.)
                    align: "top", // Alignment of the label relative to the anchor point
                    formatter: function (value, context) {
                        if (value != 0) {
                            return value; // Display the value as the label
                        } else {
                            return null;
                        }
                    },
                    font: {
                        weight: "bold",
                    },
                },
            },
        },
        plugins: [ChartDataLabels], // Activate the plugin
    });
}
function date_string(dateTime) {
    var date_format =
        (dateTime.getMonth() > 8
            ? dateTime.getMonth() + 1
            : "0" + (dateTime.getMonth() + 1)) +
        "/" +
        (dateTime.getDate() > 9
            ? dateTime.getDate()
            : "0" + dateTime.getDate()) +
        "/" +
        dateTime.getFullYear();
    return date_format;
}
