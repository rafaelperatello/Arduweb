/*
http://192.168.0.177/?a=0&b=0&c=0&d=0
http://192.168.0.177/?a=1&b=1&c=1&d=1
*/

#include <SPI.h>
#include <Ethernet.h>

byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
IPAddress ip(192,168,0,177);
IPAddress gateway(192,168,0, 1);
IPAddress subnet(255, 255, 255, 0);

EthernetServer server(80);

const unsigned int button1 = 24;
const unsigned int button2 = 26;
const unsigned int button3 = 28;
const unsigned int button4 = 30;

const unsigned int saida1 = 36;
const unsigned int saida2 = 38;
const unsigned int saida3 = 40;
const unsigned int saida4 = 42;

const unsigned int sensor1 = 0;
const unsigned int sensor2 = 1;
const unsigned int sensor3 = 2;
const unsigned int sensor4 = 3;

unsigned int va = 0; //Controle da saida digital 1
unsigned int vb = 0; //Controle da saida digital 2  
unsigned int vc = 0; //Controle da saida digital 3
unsigned int vd = 0; //Controle da saida digital 4

unsigned int valores[4];

float temperaturaA = 0;
float temperaturaB = 0;
float pressao = 0;

String stringRequisicao;
String luminosidade = "";

void setup() {
 // Open serial communications and wait for port to open:
  Serial.begin(9600);  

  pinMode(saida1, OUTPUT);
  pinMode(saida2, OUTPUT);
  pinMode(saida3, OUTPUT);
  pinMode(saida4, OUTPUT);

  pinMode(button1, INPUT);
  pinMode(button2, INPUT);
  pinMode(button3, INPUT);
  pinMode(button4, INPUT);  

  pinMode(sensor1, INPUT); //Temperatura
  pinMode(sensor2, INPUT);
  pinMode(sensor3, INPUT);
  pinMode(sensor4, INPUT); 

   delay(20);

  // start the Ethernet connection and the server:
  Ethernet.begin(mac, ip, gateway, subnet);
  server.begin();
  Serial.print("server is at ");
  Serial.println(Ethernet.localIP());

}

void parseParametros(String str) {
  String valorString;
  char valor[4];
  int startIndex;
  int endIndex;

  //VA
  valorString = "";
  startIndex = str.indexOf("a");
  endIndex = str.indexOf("b");
  valorString = str.substring(startIndex + 2, endIndex - 1);  
  valorString.toCharArray(valor, sizeof(valor));
  va = atoi(valor);

  //VB
  valorString = "";
  startIndex = str.indexOf("b");
  endIndex = str.indexOf("c");
  valorString = str.substring(startIndex + 2, endIndex - 1);  
  valorString.toCharArray(valor, sizeof(valor));
  vb = atoi(valor);

  //VC
  valorString = "";
  startIndex = str.indexOf("c");
  endIndex = str.indexOf("d");
  valorString = str.substring(startIndex + 2, endIndex - 1);  
  valorString.toCharArray(valor, sizeof(valor));
  vc = atoi(valor);

  //VD
  valorString = "";
  startIndex = str.indexOf("d");
  endIndex = str.indexOf("e");
  valorString = str.substring(startIndex + 2, endIndex - 1);  
  valorString.toCharArray(valor, sizeof(valor));
  vd = atoi(valor);
}


float calcularTemperatura(int porta){
  float temperatura = 0;
  int entrada_temperatura = 0;
  entrada_temperatura = analogRead(porta);       
  temperatura = (5.0 * entrada_temperatura * 100.0);
  temperatura = temperatura / 1024;
  return temperatura;
}

String calcularLuminosidade(){
  int lumi = analogRead(2);
  String lumiResultado = "";
    if(lumi >= 1020) 
      lumiResultado = "Alta";
    else if((lumi >= 1010) && (lumi < 1020))
      lumiResultado = "Media";
    else if((lumi >= 1000) && (lumi < 1010))
      lumiResultado = "Baixa";
    else if(lumi < 1000)
       lumiResultado = "Nenhuma"; 
       
       return lumiResultado;
}

float calcularPressao(){
  float pre = analogRead(3);
  float resultado = 0;
 
  if (pre > 0)  
    resultado = (pre / 0.13157142) / 1000 ;
  else
    resultado = 0;
   
  return resultado;
}

void loop() {
  boolean reading = false;
  // listen for incoming clients
  EthernetClient client = server.available();
  if (client) {
    Serial.println("new client");
    // an http request ends with a blank line
    boolean currentLineIsBlank = true;
    stringRequisicao = "";

    while (client.connected()) {
      if (client.available()) {
        char c = client.read();
        Serial.write(c);
        // if you've gotten to the end of the line (received a newline
        // character) and the line is blank, the http request has ended,
        // so you can send a reply
        if(reading && c == ' '){
            reading = false;
        } 

        if(c == '?'){ 
          reading = true; //found the ?, begin reading the info
        } 

        if(reading){
          Serial.print(c);
          if (c!='?') {
            stringRequisicao += c;
          }
        }

        if (c == '\n' && currentLineIsBlank) {
          // send a standard http response header
          client.println("HTTP/1.1 200 OK");       

          client.println("Content-Type: text/html");
          client.println("Access-Control-Allow-Origin: *");
          client.println();
          //client.println("<!DOCTYPE HTML>");
          //client.println("<html>");
          
          valores[0] = digitalRead(button1);
          valores[1] = digitalRead(button2);
          valores[2] = digitalRead(button3);
          valores[3] = digitalRead(button4);

          //json
          client.print("{");

          for (int i=0; i < 4; i++){
            client.print("\"entrada");
            client.print(i);
            client.print("\":\"");
            client.print(valores[i]);
            client.print("\",");
          } 

          client.print("\"temperatura1\":\"");
          client.print(calcularTemperatura(0));
          client.print("\",");

          client.print("\"temperatura2\":\"");
          client.print(calcularTemperatura(1));
          client.print("\",");
          client.print("\"luminosidade\":\"");
          client.print(calcularLuminosidade());
          client.print("\",");

          client.print("\"pressao\":\"");
          client.print(calcularPressao());
          client.print("\"");

          client.println("}");

          break;
        }
        if (c == '\n') {
          // you're starting a new line
          currentLineIsBlank = true;
        } 
        else if (c != '\r') {
          // you've gotten a character on the current line
          currentLineIsBlank = false;
        }
      }
    }

    //Se recebeu parametros na requisição executa 
    if(stringRequisicao != ""){
      parseParametros(stringRequisicao);

      if(va==1){
      digitalWrite(saida1, HIGH); 
      }
      else if(va==0){
        digitalWrite(saida1, LOW); 
      } 

      if(vb==1){
        digitalWrite(saida2, HIGH); 
      }
      else if(vb==0){
        digitalWrite(saida2, LOW); 
      } 

      if(vc==1){
        digitalWrite(saida3, HIGH); 
      }
      else if(vc==0){
        digitalWrite(saida3, LOW); 
      }

      if(vd==1){
        digitalWrite(saida4, HIGH); 
      }
      else if(vd==0){
        digitalWrite(saida4, LOW); 
      }    
    }        

    delay(100);
    // close the connection:
    client.stop();
    //Serial.println("client disonnected");
  }
}

