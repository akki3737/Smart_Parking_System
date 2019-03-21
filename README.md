# Smart_Parking_System

An Iot Based System through which you can find out empty parking spots to park your Car.The system uses ultrasonic sensors to find out the empty spot and sends data to server through which it is reflected to the website.

#Sensor Working
The ultrasonic sensors must be  placed near the parking spot so it can identify or detect whether an car is been placed in the spot or not.The sensor code is been written in a such a way like if a object comes in range of 10cm or  closer then only it detects the object otherwise it will not detect it.
As soon as the object is detected the data in database is been reflected with "spot-filled" which in turns reflects the website.

#Server 
The server-side uses  haversine formula to detect closest parking spot for the user within the range of 5km.User just need allow to the location access to the website.

#User-side
User just need to login in the website.After login, by just clicking on the "search for Parking" Parking areas with spots will be shown to the user using the  haversine formula. 
