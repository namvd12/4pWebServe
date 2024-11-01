// saveNotification để tránh trùng lặp thông báo khi mở nhiều tab
const NOTIFICATION_EXPIRATION_MINUTES = 60; // thời gian hết hạn là 60 phút

function saveNotification(id) {
    const expiration = Date.now() + NOTIFICATION_EXPIRATION_MINUTES * 60 * 1000;
    const notifications =
        JSON.parse(localStorage.getItem("displayedNotifications")) || {};
    notifications[id] = expiration;
    localStorage.setItem(
        "displayedNotifications",
        JSON.stringify(notifications)
    );
}

function cleanExpiredNotifications() {
    const now = Date.now();
    let notifications =
        JSON.parse(localStorage.getItem("displayedNotifications")) || {};

    for (let id in notifications) {
        if (notifications[id] < now) {
            delete notifications[id]; // Xóa thông báo hết hạn
        }
    }
    localStorage.setItem(
        "displayedNotifications",
        JSON.stringify(notifications)
    );
}

// Gọi hàm dọn dẹp khi tải trang hoặc định kỳ
setInterval(cleanExpiredNotifications, 5 * 60 * 1000); // Mỗi 5 phút kiểm tra một lần

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher("3896f424865d5904cdca", {
    cluster: "ap1",
});
var nameRegion = '{{ env("APP_ENV","develop") }}';
if (nameRegion == "product") {
    var channel = pusher.subscribe("notifications4p");
} else {
    var channel = pusher.subscribe("notificationsDev");
}

channel.bind("message", function (data) {
    // const notifications =
    //     JSON.parse(localStorage.getItem("displayedNotifications")) || {};
    // if (!notifications[data.id]) {
    //     console.log("saveNotification" + data.id);
    //     saveNotification(data.id); // Lưu thông báo với thời gian hết hạn
    //     showNotification(JSON.stringify(data["message"]));
    // }
    showNotification(JSON.stringify(data["message"]));
});
