$(document).ready(function () {
    const tab = document.querySelectorAll(".tab-pane");
    const selectedSettingID = localStorage.getItem("tabID");
    tab.forEach((element) => {
        if (element.id == selectedSettingID) {
            element.classList.add("active");
        } else {
            element.classList.remove("active");
        }
    });
});

function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}
function listSettingClick(elementId) {
    const activeElements = document.querySelectorAll(".active");
    // remove all btn active
    activeElements.forEach((element) => {
        element.classList.remove("active");
    });
    // set selected class active
    const selectedSetting = document.getElementById(elementId);
    selectedSettingID = selectedSetting.id;
    localStorage.setItem("tabID", selectedSettingID);
    selectedSetting.classList.add("active");
}
function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}
function saveProfile() {
    const userName = document.getElementById("userName").value;
    const fullName = document.getElementById("fullName").value;
    const phone = document.getElementById("phone").value;
    const email = document.getElementById("email").value;
    const srcImage = document.getElementById("avatar").getAttribute("src");
    const avatar = srcImage.split(",")[1]; // get base64

    if (!validateEmail(email)) {
        alert("Error format email !!!");
        return;
    }
    $.ajax({
        url: "saveProfile",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            userName: userName,
            fullName: fullName,
            phone: phone,
            email: email,
            avatar: avatar,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                alert("Save done");
                location.reload();
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
function savePassWord(userName) {
    const oldPassword = document.getElementById("oldPassword").value;
    const newPassword = document.getElementById("newPassword").value;
    const verifyPassword = document.getElementById("verifyPassword").value;

    //warning
    const warningPassword = document.getElementById("warningPassword");
    const warningVerify = document.getElementById("warningVerifyPassword");

    if (newPassword != verifyPassword) {
        warningVerify.style.display = "flex";
        return;
    }
    $.ajax({
        url: "saveNewPassword",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            userName: userName,
            oldPassword: oldPassword,
            newPassword: newPassword,
        },
        success: function (response) {
            if (response.status == "Error login") {
                warningPassword.style.display = "flex";
            } else if (response.status != "Error") {
                // handle response
                alert("Save done");
                location.reload();
            } else {
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function saveConfig() {
    const timeNG = document.getElementById("timeNG").value;
    const folderReport = document.getElementById("folderReport").value;

    //warning
    const warningTimeNG = document.getElementById("warningTimeNG");
    const warningFolderReport = document.getElementById("warningFolderReport");
    if (timeNG == "") {
        warningTimeNG.style.display = "flex";
        return;
    }
    if (folderReport == "") {
        warningFolderReport.style.display = "flex";
        return;
    }
    $.ajax({
        url: "saveConfigSystem",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            timeNG: timeNG,
            folderReport: folderReport,
        },
        success: function (response) {
            if (response.status == "Error folder") {
                warningFolderReport.style.display = "flex";
            } else if (response.status != "Error") {
                // handle response
                alert("Save done");
            } else {
                alert("error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function inputChange(element) {
    const currentElement = document.getElementById(element);
    currentElement.style.display = "none";
}
function modeChange() {
    const mode = document.getElementById("modeSelect");
    if (mode.value == "run") {
        mode.style.color = "limegreen";
    } else if (mode.value == "test") {
        mode.style.color = "brown";
    } else if (mode.value == "update") {
        mode.style.color = "blue";
    } else if (mode.value == "off") {
        mode.style.color = "red";
    }
}
function saveModeClick() {
    const modeValue = document.getElementById("modeSelect").value;
    $.ajax({
        url: "saveMode",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            mode: modeValue,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                alert("Save done");
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
function saveLineWorking() {
    const lineLTE = document.getElementById("checkBoxLineLTE").checked;
    const line1 = document.getElementById("checkBoxLine1").checked;
    const line2 = document.getElementById("checkBoxLine2").checked;
    const line3 = document.getElementById("checkBoxLine3").checked;
    const line4 = document.getElementById("checkBoxLine4").checked;
    const line5 = document.getElementById("checkBoxLine5").checked;
    const line6 = document.getElementById("checkBoxLine6").checked;
    const line7 = document.getElementById("checkBoxLine7").checked;
    const line8 = document.getElementById("checkBoxLine8").checked;
    $.ajax({
        url: "saveLineWorking",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            LineLTE: lineLTE,
            Line1: line1,
            Line2: line2,
            Line3: line3,
            Line4: line4,
            Line5: line5,
            Line6: line6,
            Line7: line7,
            Line8: line8,
        },
        success: function (response) {
            if (response != "Error") {
                // handle response
                // alert("Save done");
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
function addRow(deviceCode, deviceName, modalMode) {
    // Get a reference to the table
    var table = document
        .getElementById(modalMode)
        .getElementsByTagName("tbody")[0];
    // Insert a new row at the end of the table
    var newRow = table.insertRow(-1);
    // Insert new cells into the row
    var code = newRow.insertCell(0);
    var name = newRow.insertCell(1);
    var buttonCell = newRow.insertCell(2);

    // Set the content of the cells
    code.innerHTML = deviceCode;
    name.innerHTML = deviceName;
    // Create a new Bootstrap button and add it to the action cell
    var button = document.createElement("button");
    button.innerHTML = "Delete";
    button.className = "btn btn-outline-primary"; // Bootstrap button class
    button.onclick = function () {
        // Get the row that contains the button
        var row = button.parentNode.parentNode;

        // Get the table and delete the row
        var table = document.getElementById(modalMode);
        table.deleteRow(row.rowIndex);
    };

    buttonCell.appendChild(button);
}
function modalAddDeviceClick() {
    const deviceCode = document.getElementById("deviceCode").value;
    const deviceName = document.getElementById("deviceName").value;
    const modalMode = document.getElementById("modalMode").value;
    if (deviceCode == "") {
        return;
    }
    addRow(deviceCode, deviceName, modalMode);
    $(".modal").modal("hide");
}
function selectMachine() {
    var MachineID = document.getElementById("deviceSelect").value;
    $.ajax({
        url: "getMachineInfor",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            machineID: MachineID,
        },
        success: function (response) {
            if (response != "Error") {
                document.getElementById("deviceCode").value =
                    response.deviceCode;
                document.getElementById("deviceName").value =
                    response.deviceName;
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function saveNewCategories() {
    const categoriesName = document.getElementById("categoriesName").value;
    const categoriesAction = document.getElementById("categoriesAction").value;

    const categoriesDes = document.getElementById("description").value;

    // Get the checked radio button
    var checkedRadio = document.querySelector('input[name="options"]:checked');
    // Get the value of the checked radio button
    const status = checkedRadio ? checkedRadio.value : "No option selected";

    if (categoriesName == "") {
        alert("Categories name Empty!!!");
        return;
    }

    // get list colum value
    var table = document.getElementById("AddListDeviceCategories");
    var tbody = table.getElementsByTagName("tbody")[0];
    var rows = tbody.getElementsByTagName("tr");
    var listDeviceCode = [];
    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        listDeviceCode.push(cells[0].innerHTML);
    }
    $.ajax({
        url: "saveNewCategories",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            name: categoriesName,
            action: categoriesAction,
            status: status,
            description: categoriesDes,
            listCodeDevice: listDeviceCode,
        },
        success: function (response) {
            console.log(response.status);
            if (response.status == "OK") {
                alert("Done");
                location.reload();
            } else {
                alert(response.status);
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function deleteCategory(id) {
    if (confirm("Do you want delete?")) {
        if (id != null) {
            $.ajax({
                url: "deleteCategory",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    categoryID: id,
                },
                success: function (response) {
                    if (response.status == "OK") {
                        location.reload();
                    } else {
                        alert("Error");
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                },
            });
        }
    }
}
function editCategory(id) {
    $.ajax({
        url: "editCategory",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            categoryID: id,
        },
        success: function (response) {
            if (response != null) {
                $("#categoriesEditTab").html(response);
                listSettingClick("categoriesEditTab");
            } else {
                alert("Error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function deleteDeviceCategory(button) {
    // Get the parent row of the clicked button
    const row = button.closest("tr");

    // Remove the row from the table
    row.remove();
}
function modalMode(mode) {
    document.getElementById("modalMode").value = mode;
}
function saveEditCategory(catID) {
    const categoriesName = document.getElementById("categoriesNameEdit").value;
    const categoriesAction = document.getElementById(
        "categoriesActionEdit"
    ).value;

    const categoriesDes = document.getElementById("descriptionEdit").value;

    // Get the checked radio button
    var checkedRadio = document.querySelector(
        'input[name="optionsEdit"]:checked'
    );
    // Get the value of the checked radio button
    const status = checkedRadio ? checkedRadio.value : "No option selected";

    if (categoriesName == "") {
        alert("Categories name Empty!!!");
        return;
    }

    // get list colum value
    var table = document.getElementById("EditListDeviceCategories");
    var tbody = table.getElementsByTagName("tbody")[0];
    var rows = tbody.getElementsByTagName("tr");
    var listDeviceCode = [];
    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        listDeviceCode.push(cells[0].innerHTML);
    }
    $.ajax({
        url: "editNewCategories",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            id: catID,
            name: categoriesName,
            action: categoriesAction,
            status: status,
            description: categoriesDes,
            listCodeDevice: listDeviceCode,
        },
        success: function (response) {
            if (response.status == "OK") {
                alert("Done");
                location.reload();
                listSettingClick("categoriesListTab");
            } else {
                alert(response.status);
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function editUser(userID) {
    $.ajax({
        url: "editUser",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            userID: userID,
        },
        success: function (response) {
            if (response != null) {
                $("#UsereditTab").html(response);
                listSettingClick("UsereditTab");
            } else {
                alert("Error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function saveEditUser() {
    user_id = document.getElementById("user_id").value;
    user_name = document.getElementById("user_name").value;
    user_position = document.getElementById("user_position").value;
    full_name = document.getElementById("full_name").value;
    user_phone = document.getElementById("user_phone").value;
    user_email = document.getElementById("user_email").value;
    user_group = document.getElementById("user_group").value;
    user_topic = document.getElementById("user_topic").value;
    user_newPassword = document.getElementById("user_newPassword").value;
    user_confirmPassword = document.getElementById(
        "user_confirmPassword"
    ).value;
    if (user_newPassword != user_confirmPassword) {
        alert("Error password!!!");
        return;
    }
    $.ajax({
        url: "saveEditUser",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            userID: user_id,
            userName: user_name,
            userPosition: user_position,
            fullName: full_name,
            userPhone: user_phone,
            userEmail: user_email,
            userGroup: user_group,
            userTopic: user_topic,
            userNewPassword: user_newPassword,
        },
        success: function (response) {
            if (response != null) {
                alert("Done");
                location.reload();
                listSettingClick("userAllTab");
            } else {
                alert("Error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function deleteUser(userKey) {
    if (confirm("Do you want delete?")) {
        if (userKey != null) {
            $.ajax({
                url: "deleteUser",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    userKey: userKey,
                },
                success: function (response) {
                    if (response.status == "OK") {
                        location.reload();
                        listSettingClick("userAllTab");
                    } else {
                        alert("Error");
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                },
            });
        }
    }
}
function addNewUser() {
    $.ajax({
        url: "addNewUser",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response != null) {
                $("#UserAddTab").html(response);
                listSettingClick("UserAddTab");
            } else {
                alert("Error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
function saveAddUser() {
    const userID = document.getElementById("user_id").value;
    const userName = document.getElementById("user_name").value;
    const userPosition = document.getElementById("user_position").value;
    const fullName = document.getElementById("full_name").value;
    const userPhone = document.getElementById("user_phone").value;
    const userEmail = document.getElementById("user_email").value;
    const userGroup = document.getElementById("user_group").value;
    const userTopic = document.getElementById("user_topic").value;
    const userNewPassword = document.getElementById("user_newPassword").value;
    const userConfirmPassword = document.getElementById(
        "user_confirmPassword"
    ).value;
    if (userNewPassword != userConfirmPassword || userNewPassword == "") {
        alert("Error password!!!");
        return;
    }

    if (
        userID == "" ||
        userName == "" ||
        userPosition == "" ||
        userGroup == "" ||
        userTopic == ""
    ) {
        alert("Please fill out all required fields.");
        return;
    }
    $.ajax({
        url: "saveAddNewUser",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            userID: userID,
            userName: userName,
            userPosition: userPosition,
            fullName: fullName,
            userPhone: userPhone,
            userEmail: userEmail,
            userGroup: userGroup,
            userTopic: userTopic,
            userNewPassword: userNewPassword,
        },
        success: function (response) {
            if (response != null) {
                alert("Done");
                $("#userAllTab").html(response);
                listSettingClick("userAllTab");
            } else {
                alert("Error");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    });
}
