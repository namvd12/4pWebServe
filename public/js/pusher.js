// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher("daeeebbab0906b3e69c6", {
    cluster: "ap1",
});

if (window.APP_ENV === "product") {
    var channel = pusher.subscribe("notifications4p");
} 
else if(window.APP_ENV === "dev1"){
    var channel = pusher.subscribe("notificationsDev1");
}
else if(window.APP_ENV === "dev2"){
    var channel = pusher.subscribe("notificationsDev2");
}
else
{
    var channel = pusher.subscribe("notificationsDev");
}

channel.bind("message", function (data) {
    showNotification(JSON.stringify(data["message"]));
});
