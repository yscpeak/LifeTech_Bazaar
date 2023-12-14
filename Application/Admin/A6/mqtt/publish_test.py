import paho.mqtt.client as mqtt
import json

# 创建 MQTT 客户端
client = mqtt.Client()

# 连接到 MQTT 代理
client.connect("test.mosquitto.org", 1883, 60)

# 创建要发布的消息
message = {
    "key": "value",
    "test": 123
}

# 发布消息到 'rrc/iot/test' 主题
client.publish("rrc/iot/test", json.dumps(message))

# 断开连接
client.disconnect()
