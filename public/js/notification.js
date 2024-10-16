// sound

let audio = new Audio("sound/notification.mp3"); // Replace with your sound file URL
let timerId;
function playSound() {
    audio.play();
}
function playSound_Replay() {
    timerId = setInterval(() => {
        playSound();
    }, 10000); // Play sound every 10 seconds
}
function stopSound() {
    audio.pause();
    audio.currentTime = 0; // Reset to start
    clearInterval(timerId);
}

// Function to show notification
function showNotification(message) {
    // Check if the browser supports notifications
    if (!("Notification" in window)) {
        alert("This browser does not support desktop notification");
    }
    // Check if permission is already granted
    else if (Notification.permission === "granted") {
        // Show notification
        createNotification(message);
    }
    // Otherwise, request permission
    else if (Notification.permission !== "denied") {
        Notification.requestPermission().then(function (permission) {
            if (permission === "granted") {
                createNotification(message);
            }
        });
    } else {
        alert(Notification.permission);
    }
}

// Function to create and display the notification
function createNotification(message) {
    // split message
    const myArray = message.replaceAll('"', "").split(";");
    console.log(myArray);
    let user = myArray[1];
    let machineCode = myArray[2];
    let partNumber = myArray[3];
    let text = machineCode + "[" + partNumber + "]";
    const options = {
        body: text,
        icon: "image/notification.png",
        requireInteraction: true, // Keep visible until interacted with
    };

    const notification = new Notification(
        "'" + user + "'" + " calling . . .",
        options
    );

    // You can also handle notification click events
    notification.onshow = function () {
        playSound();
    };
    notification.onclick = function () {
        var ip = "/viewCallMaterial?callID=" + myArray[0];
        window.open(ip);
    };
}
