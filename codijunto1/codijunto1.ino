#include <Adafruit_Sensor.h>
#include <DHT.h>
#include <DHT_U.h>

#define DHTPIN 6           // Pino digital conectado ao sensor DHT 
#define DHTTYPE DHT22      // DHT 22 (AM2302)
#define REED_PIN 9         // Pino do sensor de chuva
#define HALL_SENSOR_PIN 2  // Pino do sensor do anemômetro

const float pi = 3.14159265; 
int period = 5000;          // Tempo de medição (ms)
int radius = 147;           // Raio do anemômetro (mm)
int delaytime = 2000;       // Tempo entre as amostras (ms)

int rainVal = 0;            // Valor atual do sensor de chuva
int oldRainVal = 0;         // Valor anterior do sensor de chuva
int REEDCOUNT = 0;          // Contador de pulsos de chuva

int sensorPin = A0; // Pino analógico onde o sensor está conectado
int valorSensor;


unsigned int Sample = 0;    // Número de amostras para o anemômetro
unsigned int counter = 0;   // Contador de pulsos do anemômetro
unsigned int RPM = 0;       // Revoluções por minuto
float windspeed = 0;        // Velocidade do vento (m/s)
float speedwind = 0;        // Velocidade do vento (km/h)

DHT_Unified dht(DHTPIN, DHTTYPE);
uint32_t delayMS;

void setup() {
  pinMode(REED_PIN, INPUT_PULLUP);  // Configura o pino do sensor de chuva
  pinMode(HALL_SENSOR_PIN, INPUT);  // Configura o pino do sensor do anemômetro
  digitalWrite(HALL_SENSOR_PIN, HIGH);  // Ativa o pull-up interno para o sensor Hall
  Serial.begin(9600);

  // Inicialize o sensor DHT22
  dht.begin();
  Serial.println(F("Estação Meteorológica Iniciada"));

  // Imprime os detalhes do sensor de temperatura
  sensor_t sensor;
  dht.temperature().getSensor(&sensor);
  Serial.println(F("------------------------------------"));
  Serial.println(F("Sensor de Temperatura"));
  Serial.print(F("Tipo de Sensor: ")); Serial.println(sensor.name);
  Serial.print(F("Versão do Driver: ")); Serial.println(sensor.version);
  Serial.print(F("ID Único: ")); Serial.println(sensor.sensor_id);
  Serial.print(F("Valor Máximo: ")); Serial.print(sensor.max_value); Serial.println(F("°C"));
  Serial.print(F("Valor Mínimo: ")); Serial.print(sensor.min_value); Serial.println(F("°C"));
  Serial.print(F("Resolução: ")); Serial.print(sensor.resolution); Serial.println(F("°C"));
  Serial.println(F("------------------------------------"));

  // Imprime os detalhes do sensor de umidade
  dht.humidity().getSensor(&sensor);
  Serial.println(F("Sensor de Umidade"));
  Serial.print(F("Tipo de Sensor: ")); Serial.println(sensor.name);
  Serial.print(F("Versão do Driver: ")); Serial.println(sensor.version);
  Serial.print(F("ID Único: ")); Serial.println(sensor.sensor_id);
  Serial.print(F("Valor Máximo: ")); Serial.print(sensor.max_value); Serial.println(F("%"));
  Serial.print(F("Valor Mínimo: ")); Serial.print(sensor.min_value); Serial.println(F("%"));
  Serial.print(F("Resolução: ")); Serial.print(sensor.resolution); Serial.println(F("%"));
  Serial.println(F("------------------------------------"));

  // Defina o atraso entre as leituras do sensor DHT22
  delayMS = sensor.min_delay / 1000;
}

void loop() {

  valorSensor = analogRead(sensorPin); // Lê o valor analógico do sensor

  // Mapea o valor do sensor para uma escala de 0 a 100
  valorSensor = map(valorSensor, 0, 1023, 0, 100);

  Serial.print("Umidade do solo: ");
  Serial.print(valorSensor);
  Serial.println("%");

  delay(1000); // Aguarda 1 segundo antes da próxima leitura
  
  // Medição do sensor de chuva
  rainVal = digitalRead(REED_PIN);
  if ((rainVal == LOW) && (oldRainVal == HIGH)) {
    delay(1000);
    REEDCOUNT++;
    oldRainVal = rainVal;

    Serial.print("Medida de chuva (contagem): ");
    Serial.print(REEDCOUNT * 0.5);
    Serial.println(" pulsos");

    Serial.print("Medida de chuva (calculado): ");
    Serial.print(REEDCOUNT * 0.125);
    Serial.println(" mm");
  } else {
    delay(10);
    REEDCOUNT++;
    oldRainVal = rainVal;

    Serial.print("Medida de chuva (contagem): ");
    Serial.print(REEDCOUNT * 0.5);
    Serial.println(" pulsos");

    Serial.print("Medida de chuva (calculado): ");
    Serial.print(REEDCOUNT * 0.125);
    Serial.println(" mm");
  }

  // Medição do sensor DHT22
  delay(delayMS);
  sensors_event_t event;
  dht.temperature().getEvent(&event);
  if (isnan(event.temperature)) {
    Serial.println(F("Erro ao ler a temperatura!"));
  } else {
    Serial.print(F("Temperatura: "));
    Serial.print(event.temperature);
    Serial.println(F("°C"));
  }

  dht.humidity().getEvent(&event);
  if (isnan(event.relative_humidity)) {
    Serial.println(F("Erro ao ler a umidade!"));
  } else {
    Serial.print(F("Umidade: "));
    Serial.print(event.relative_humidity);
    Serial.println(F("%"));
  }

  // Medição do anemômetro
  Sample++;
  Serial.print(Sample);
  Serial.print(": Medição de velocidade do vento... ");
  windvelocity();
  Serial.println(" concluída.");
  Serial.print("Contador: ");
  Serial.print(counter);
  Serial.print(";  RPM: ");
  RPMcalc();
  Serial.print(RPM);
  Serial.print(";  Velocidade do vento: ");

  // Exibe a velocidade do vento em m/s
  WindSpeed();
  Serial.print(windspeed);
  Serial.print(" [m/s] ");              

  // Exibe a velocidade do vento em km/h
  SpeedWind();
  Serial.print(speedwind);
  Serial.print(" [km/h] ");  
  Serial.println();

  delay(delaytime);  // Atraso entre as amostras
}

void windvelocity() {
  speedwind = 0;
  windspeed = 0;
  
  counter = 0;  
  attachInterrupt(digitalPinToInterrupt(HALL_SENSOR_PIN), addcount, RISING);
  unsigned long startTime = millis();
  while (millis() < startTime + period) {
    // Aguarda a medição ser concluída
  }
  detachInterrupt(digitalPinToInterrupt(HALL_SENSOR_PIN));
}

void RPMcalc() {
  RPM = (counter * 60) / (period / 1000);  // Calcula RPM
}

void WindSpeed() {
  windspeed = ((4 * pi * radius * RPM) / 60) / 1000;  // Calcula velocidade do vento em m/s
}

void SpeedWind() {
  speedwind = windspeed * 3.6;  // Converte a velocidade do vento para km/h
}

void addcount() {
  counter++;
}
