#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

const char *ssid ="akash.";     // replace with your wifi ssid and wpa2 key
const char *pass ="98769876000";

int trigPin1=D3; //Sensor Trig pin connected to Arduino pin 13
int echoPin1=D4;  //Sensor Echo pin connected to Arduino pin 11
float pingTime1;  //time for ping to travel from sensor to target and return
float targetDistance1; //Distance to Target in inches
float speedOfSound=776.5; //Speed of sound in miles per hour when temp is 77 degrees.


int trigPin2=D5; //Sensor Trig pin connected to Arduino pin 13
int echoPin2=D7;  //Sensor Echo pin connected to Arduino pin 11
float pingTime2;  //time for ping to travel from sensor to target and return
float targetDistance2; //Distance to Target in inches

void setup() {

       delay(100);
       Serial.println("Connecting to ");
       Serial.println(ssid); 
 
       WiFi.begin(ssid, pass); 
       while (WiFi.status() != WL_CONNECTED) 
          {
            delay(500);
            Serial.print(".");
          }
      Serial.println("");
      Serial.println("WiFi connected");

      
  // put your setup code here, to run once:
  Serial.begin(9600);
  pinMode(trigPin1, OUTPUT);
  pinMode(echoPin1, INPUT);

   pinMode(trigPin2, OUTPUT);
  pinMode(echoPin2, INPUT);
}
 
void loop() {
  // put your main code here, to run repeatedly:



  HTTPClient http;    //Declare object of class HTTPClient
 
  String postData,S2,S4,S1,S3;
  S2="filled";
  S4="open";
  S1="filled";
  S3="open";
  String slot1 = "A"; //user name
  String slot2 = "B"; //user name
 
  //Post Data
  //postData = "status=" + S2+ "&slot=" + slot ;
  
  
  
  
  delay(3000);  //Post Data at every 3 seconds



 //sensor 1
  
  digitalWrite(trigPin1, LOW); //Set trigger pin low
  delayMicroseconds(2000); //Let signal settle
  digitalWrite(trigPin1, HIGH); //Set trigPin1 high
  delayMicroseconds(15); //Delay in high state
  digitalWrite(trigPin1, LOW); //ping has now been sent
  delayMicroseconds(10); //Delay in low state


  
  pingTime1 = pulseIn(echoPin1, HIGH);  //pingTime is presented in microceconds
  pingTime1=pingTime1/1000000; //convert pingTime to seconds by dividing by 1000000 (microseconds in a second)
  pingTime1=pingTime1/3600; //convert pingtime to hourse by dividing by 3600 (seconds in an hour)
  targetDistance1= speedOfSound * pingTime1;  //This will be in miles, since speed of sound was miles per hour
  targetDistance1=targetDistance1/2; //Remember ping travels to target and back from target, so you must divide by 2 for actual target distance.
  targetDistance1= targetDistance1*160934;    //Convert miles to inches by multipling by 63360 (inches per mile)
  Serial.println("Distance from sensor A : ");
  Serial.println(targetDistance1);





  if(targetDistance1 < 10)
  {
      Serial.println("slot A booked");
       //Post Data
       postData = "status=" + S1+ "&slot=" + slot1 ;  
  }
  else{
    Serial.println("slot A open");
       //Post Data
       postData = "status=" + S3+ "&slot=" + slot1 ;
  }
  http.begin("http://192.168.43.223/parking/postdemo.php");              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

  int httpCode1 = http.POST(postData);   //Send the request
  String payload1 = http.getString();    //Get the response payload
 
  //Serial.println(httpCode1);   //Print HTTP return code
 // Serial.println("hello from sensor A");
 // Serial.println(payload1);    //Print request response payload
 
  
  
  
  delay(2000); //delay tenth of a  second to slow things down a little.



  

 //sensor 2


  digitalWrite(trigPin2, LOW); //Set trigger pin low
  delayMicroseconds(2000); //Let signal settle
  digitalWrite(trigPin2, HIGH); //Set trigPin1 high
  delayMicroseconds(15); //Delay in high state
  digitalWrite(trigPin2, LOW); //ping has now been sent
  delayMicroseconds(10); //Delay in low state



  pingTime2 = pulseIn(echoPin2, HIGH);  //pingTime is presented in microceconds
  pingTime2=pingTime2/1000000; //convert pingTime to seconds by dividing by 1000000 (microseconds in a second)
  pingTime2=pingTime2/3600; //convert pingtime to hourse by dividing by 3600 (seconds in an hour)
  targetDistance2= speedOfSound * pingTime2;  //This will be in miles, since speed of sound was miles per hour
  targetDistance2=targetDistance2/2; //Remember ping travels to target and back from target, so you must divide by 2 for actual target distance.
  targetDistance2= targetDistance2*160934;    //Convert miles to inches by multipling by 63360 (inches per mile)

  Serial.println("distance from sensor B : ");
  Serial.println(targetDistance2);
  if(targetDistance2 < 10)
  {
      Serial.println("slot B booked");
       //Post Data
       postData = "status=" + S2+ "&slot=" + slot2 ;  
  }
  else{
    Serial.println("slot B open");
       //Post Data
       postData = "status=" + S4+ "&slot=" + slot2 ;
    }
  int httpCode2 = http.POST(postData);   //Send the request
  String payload2 = http.getString();    //Get the response payload
 
 // Serial.println(httpCode2);   //Print HTTP return code
  //Serial.println("hello from sensor 2");
 // Serial.println(payload2);    //Print request response payload
  http.end();  //Close connection
  delay(2000); //delay tenth of a  second to slow things down a little.
  

}
