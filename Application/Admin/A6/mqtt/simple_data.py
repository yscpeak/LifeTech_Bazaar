import paho.mqtt.client as mqtt
import time
import threading

def on_connect(client, userdata, flags, rc):
    try:
        print("Connected with result code:", rc)
        #client.subscribe("rrc/iot/test")
        client.subscribe("simple")
    except Exception as e:
        print(f"on_connect:{e}")

def on_message(client, userdata, msg):
    print(f"{msg.payload.decode()}")

def publish_simple_data(client):
    while True:
        client.publish("simple", "This is simple data 12345.")
        time.sleep(5)  


client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

client.connect("test.mosquitto.org", 1883, 60)

thread = threading.Thread(target=publish_simple_data, args=(client,))
thread.start()

client.loop_forever()