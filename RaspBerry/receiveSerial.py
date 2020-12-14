import serial
import time
ser = serial.Serial('/dev/ttyACM0',9600, timeout=1)
ser.flush()
def tempupdate() :	
            var1 = ser.readline()	
            
            repr(var1)	
            fob = open('/var/www/html/index.html', 'w')	
            fob.write('<html><head><meta charset="UTF-8"></head><body><h1>La temperature est de ' + data[1]+ '<br> L\'humidité est de '+data[0]+'<br> à'+ time.strftime('%l:%M%p le %b %d, %Y') + '</h1></body></html>')
            fob.close()

try:
 ok = True
 while ok:
     if ser.in_waiting >0:
         line = ser.readline().decode('utf-8').rstrip()
         data = line.split(':')
         jsonPayload = "{" + '"hum":'+ data[0] + ',"temp":'+ data[1] + "}" 
         print(jsonPayload)
         ser = serial.Serial('/dev/ttyACM0', 9600)
         tempupdate()
         
except KeyboardInterrupt:
    print("adios.")
    exit()