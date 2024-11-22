// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher("3896f424865d5904cdca", {
    cluster: "ap1",
});

if (window.APP_ENV === "product") {
    var channel = pusher.subscribe("notifications4p");
} else {
    var channel = pusher.subscribe("notificationsDev");
}

channel.bind("message", function (data) {
    showNotification(JSON.stringify(data["message"]));
});
