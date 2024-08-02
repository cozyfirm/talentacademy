// import { Notify } from './../../style/layout/notify.ts';
// import { MqttInit } from './../../mqtt/mqtt-init.ts';
// import mqtt from "mqtt"; // import namespace "mqtt"
//
//
// $(document).ready(function() {
//     let mqttConnected = false, mqttSubscribed = false, subscribedTopic = '';
//
//     /* Get ID of logged user; Read from chat form */
//     let apiToken = $('meta[name="api-token"]').attr('content');
//
//     console.log("Api Token: " + apiToken);
//
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//
//     const client = mqtt.connect("wss://mqtt.cozyfirm.com:8083", MqttInit.options);
//     client.on('error', (err) => {
//         client.end()
//     });
//     client.on('reconnect', () => {
//         console.log('Reconnecting...');
//     });
//     client.on('connect', () => {
//         mqttConnected = true;
//
//         /* Subscribe to first channel */
//         subscribedTopic = apiToken;
//
//         client.subscribe(subscribedTopic, {qos: 0});
//         mqttSubscribed = true;
//
//         console.log("Connected to MQTT and subscribed to " + subscribedTopic);
//     });
//
//     client.on('message', (topic, message, packet) => {
//         let response = JSON.parse(message.toString());
//     });
//
// });
//
//
