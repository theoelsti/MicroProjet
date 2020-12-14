#include <DHT.h>
DHT dht(A0, DHT22);
float h = dht.readHumidity();
float t = dht.readTemperature();


void setup(){



}
void temperature(){

}
void humidite() {

}

void loop()
{
humidite();
temperature();
delay(30000);
}
