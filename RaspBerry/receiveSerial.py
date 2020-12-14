import serial

ser = serial.Serial('/dev/ttyACM0',9600, timeout=1)
ser.flush()
try:
 ok = True
 while ok:
     if ser.in_waiting >0:
         line = ser.readline().decode('utf-8').rstrip()
         data = line.split(':')
         jsonPayload = "{" + '"temp":'+ data[0] + ',"hum":'+ data[1] + "}" 
         print(jsonPayload)

except KeyboardInterrupt:
    print("adios.")
    exit()