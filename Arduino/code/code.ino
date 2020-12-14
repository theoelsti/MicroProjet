#include <DHT.h>;

DHT dht(A0, DHT22);
int chk;
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
    Serial.print("hum:");
    Serial.print(hum);
    Serial.print(";temp");
    Serial.print(temp);
    delay(2000); 
}

   