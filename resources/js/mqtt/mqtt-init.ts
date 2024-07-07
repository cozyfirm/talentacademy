export class MqttInit {
    static clientID: any = 'mqtt-js' + Math.random().toString(16);
    static host: string = 'wss://mqtt.cozyfirm.com';
    static port: string = '8083';

    static lastWill : any = {
        topic: 'quiz/connection-lost',
        payload: 'Connection Closed abnormally. Time',
        qos: 0,
        retain: false
    }
    static options : any = {
        keepalive: 5,
        clientId: 'mqtt-js' + Math.random().toString(16),
        protocolId: 'MQTT',
        protocolVersion: 4,
        clean: true,
        reconnectPeriod: 1000,
        connectTimeout: 30 * 1000,
        will: this.lastWill
    }


    static getHost() : string {
        // let tls_enabled = $("#env_mqtt_tls_en").val();
        // let sockedProtocol = (parseInt(tls_enabled) === 1) ? 'wss' : 'ws';

        // return  sockedProtocol + '://' + $("#env_mqtt_host").val() + ':' + $("#env_mqtt_ws_port").val();
        // return 'wss://mqtt.cozyfirm.com:8083';
        return this.host;
    }
}
