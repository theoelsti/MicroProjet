#include <DHT.h>;
DHT dht(A0, DHT22);
float hum;  
float temp;
void setup()
{
  Serial.begin(9600);
  dht.begin();
}

void loop()
{
    hum = dht.readHumidity();
    temp= dht.readTemperature();   
    String payload = String(hum)+":"+String(temp)+"\n";
    Serial.print(payload);
    delay(2000); 
}