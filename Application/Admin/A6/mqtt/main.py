import paho.mqtt.client as mqtt
import json

### add
import time
import threading
###

def on_connect(client, userdata, flags, rc):
    try:
        print("Connected with result code:", rc)
        #client.subscribe("rrc/iot/test")
        client.subscribe("complex")
    except Exception as e:
        print(f"on_connect:{e}")

# def on_message(client, userdata, msg):
#     print(f"{msg.payload.decode()}")

def on_message(client, userdata, msg):
    try:
        d = json.loads(msg.payload) 
        print(d, type(d))
    except Exception as e:
        print(f"on_message:{e}")

### add
def publish_complex_data(client):
    while True:
        data = {
            "age": 100,
            "status": "healthy"
        }
        client.publish("complex", json.dumps(data))
        time.sleep(5)
###

client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

client.connect("test.mosquitto.org", 1883, 60)

#client.loop_forever() ### command out

### add
# Start the publishing thread
thread = threading.Thread(target=publish_complex_data, args=(client,))
thread.start()

# Start the network loop
client.loop_forever()
###