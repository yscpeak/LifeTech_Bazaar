from umqtt.simple import MQTTClient
import ujson as json
import time

# MQTT Server Settings
MQTT_BROKER = "test.mosquitto.org"
MQTT_PORT = 1883
MQTT_TOPIC = "complex"

# MQTT Callback Function
def on_message(topic, msg):
    print("Received message:", msg)

# Connect to the MQTT Server
client = MQTTClient("umqtt_client", MQTT_BROKER)
client.set_callback(on_message)
client.connect()
client.subscribe(MQTT_TOPIC)

# Publish Data
def publish_data():
    while True:
        data = {
            "age": 100,
            "status": "healthy"
        }
        client.publish(MQTT_TOPIC, json.dumps(data))
        time.sleep(5)

# Main Loop
try:
    while True:
        client.check_msg() # Check for new messages
        publish_data() # Publish data
except KeyboardInterrupt:
    client.disconnect()