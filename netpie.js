client = new Paho.MQTT.Client("mqtt.netpie.io", 443, "a12018b8-40ff-4668-8632-b479ab82b1cd");
client.onMessageArrived = onMessageArrived;

order = [];

var options = {
    useSSL: true,
    userName : "KAhDbSfrws6zMErSg75U8hXrUM1AvY43",
    password : "sxhfNffUvDukHKPYCYTsJPjgWX55seR7",  
    onSuccess: onConnect,
    onFailure:doFail,
}

client.connect(options);

function onConnect() {
    client.subscribe("@msg/open");
    client.subscribe("@msg/secret");
    startMessage();
}

// while(!client.connected()) {
//     client.connect(options);
// }

function doFail(e){
    e;
}

function onMessageArrived(message) {
    document.getElementById("name_num").innerHTML = message.payloadString;
    // document.getElementById("show-"+message.destinationName).scrollTop = document.getElementById("show-"+message.destinationName).scrollHeight;
}

function publishMessage() {
    topic_name = "@msg/secret";
    msg_name = document.getElementById("num1").value+document.getElementById("num2").value+document.getElementById("num3").value+document.getElementById("num4").value+document.getElementById("num5").value+document.getElementById("num6").value+document.getElementById("num7").value;
    message = new Paho.MQTT.Message(msg_name);
    message.destinationName = topic_name;
    client.send(message);
}

function startMessage() {
    topic_name = "@msg/open";
    msg_name = "start";
    message = new Paho.MQTT.Message(msg_name);
    message.destinationName = topic_name;
    client.send(message);
}