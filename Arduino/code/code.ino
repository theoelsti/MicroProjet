#include <DHT.h>
DHT dht(A0, DHT22);
float hum;  
float temp;
float tempRessentie;
void setup()
{
  Serial.begin(9600);
  dht.begin();
}

void loop()
{
    
    hum = dht.readHumidity();
    temp = dht.readTemperature();  
    tempRessentie = dht.computeHeatIndex(temp, hum, false); 
    String payload = String(hum)+":"+String(temp)+":"+String(tempRessentie)+"\n";
    Serial.print(payload);
    delay(2000); 
}