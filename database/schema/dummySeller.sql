USE crooks_cart_collectives;


/* ===============================
   SELLER 1
================================ */

INSERT INTO users (first_name, last_name, email, username, password_hash)
VALUES ('Alex','Reyes','alex@test.com','alexseller','hash1');

INSERT INTO sellers (user_id, business_name, is_verified, verification_date)
VALUES (LAST_INSERT_ID(),'Alex Gadget Store',TRUE,NOW());

SET @seller1 = LAST_INSERT_ID();


INSERT INTO products
(seller_id,name,description,price,category,stock_quantity,image_path,is_active)
VALUES
(@seller1,'Wireless Mouse','Bluetooth mouse',899,'Electronics',30,'img/mouse1.jpg',TRUE),
(@seller1,'USB Hub','4-port USB hub',699,'Electronics',40,'img/hub1.jpg',TRUE),
(@seller1,'Webcam HD','1080p webcam',1599,'Electronics',25,'img/webcam1.jpg',TRUE),
(@seller1,'Laptop Stand','Adjustable stand',1299,'Accessories',20,'img/stand1.jpg',TRUE),
(@seller1,'Keyboard RGB','Mechanical keyboard',2799,'Electronics',15,'img/kb1.jpg',TRUE),

(@seller1,'Power Bank','20000mAh powerbank',1499,'Electronics',35,'img/pb1.jpg',TRUE),
(@seller1,'Gaming Pad','Mouse pad XL',499,'Accessories',50,'img/pad1.jpg',TRUE),
(@seller1,'Bluetooth Speaker','Portable speaker',1899,'Audio',18,'img/sp1.jpg',TRUE),
(@seller1,'Headphones','Noise cancel headset',2499,'Audio',14,'img/hp1.jpg',TRUE),
(@seller1,'Flash Drive 64GB','USB storage',599,'Storage',60,'img/fd1.jpg',TRUE),

(@seller1,'SSD 500GB','Solid state drive',3499,'Storage',12,'img/ssd1.jpg',TRUE),
(@seller1,'Router WiFi','Dual band router',2299,'Networking',10,'img/rt1.jpg',TRUE),
(@seller1,'HDMI Cable','2m HDMI cable',299,'Cables',80,'img/hdmi1.jpg',TRUE),
(@seller1,'Microphone USB','Podcast mic',3199,'Audio',9,'img/mic1.jpg',TRUE),
(@seller1,'Monitor 24inch','Full HD monitor',7999,'Displays',7,'img/mon1.jpg',TRUE);



/* ===============================
   SELLER 2
================================ */

INSERT INTO users (first_name,last_name,email,username,password_hash)
VALUES ('Brian','Lopez','brian@test.com','brianseller','hash2');

INSERT INTO sellers (user_id,business_name,is_verified,verification_date)
VALUES (LAST_INSERT_ID(),'Brian PC Parts',TRUE,NOW());

SET @seller2 = LAST_INSERT_ID();


INSERT INTO products
(seller_id,name,description,price,category,stock_quantity,image_path,is_active)
VALUES
(@seller2,'GTX Graphics Card','Gaming GPU',12999,'Components',5,'img/gpu1.jpg',TRUE),
(@seller2,'CPU Cooler','RGB cooler',1899,'Components',20,'img/cool1.jpg',TRUE),
(@seller2,'Gaming Case','ATX case',2999,'Components',10,'img/case1.jpg',TRUE),
(@seller2,'RAM 16GB','DDR4 RAM kit',3499,'Components',15,'img/ram1.jpg',TRUE),
(@seller2,'Motherboard B550','AMD board',5999,'Components',8,'img/mb1.jpg',TRUE),

(@seller2,'PSU 650W','Power supply',2799,'Components',12,'img/psu1.jpg',TRUE),
(@seller2,'NVMe 1TB','Fast SSD',5499,'Storage',9,'img/nvme1.jpg',TRUE),
(@seller2,'Thermal Paste','CPU paste',299,'Accessories',70,'img/paste1.jpg',TRUE),
(@seller2,'PC Fans 3pack','RGB fans',1599,'Cooling',18,'img/fan1.jpg',TRUE),
(@seller2,'WiFi Card','PCIe adapter',999,'Networking',22,'img/wifi1.jpg',TRUE),

(@seller2,'Capture Card','Streaming card',4999,'Streaming',6,'img/cap1.jpg',TRUE),
(@seller2,'UPS 1000VA','Backup power',4599,'Power',7,'img/ups1.jpg',TRUE),
(@seller2,'Sound Card','PCIe audio',1999,'Audio',11,'img/sc1.jpg',TRUE),
(@seller2,'SATA Cable','Data cable',199,'Cables',90,'img/sata1.jpg',TRUE),
(@seller2,'DVD Writer','Optical drive',1299,'Storage',5,'img/dvd1.jpg',TRUE);



/* ===============================
   SELLER 3
================================ */

INSERT INTO users (first_name,last_name,email,username,password_hash)
VALUES ('Carlo','Mendez','carlo@test.com','carloseller','hash3');

INSERT INTO sellers (user_id,business_name,is_verified,verification_date)
VALUES (LAST_INSERT_ID(),'Carlo Mobile Hub',TRUE,NOW());

SET @seller3 = LAST_INSERT_ID();


INSERT INTO products
(seller_id,name,description,price,category,stock_quantity,image_path,is_active)
VALUES
(@seller3,'Android Phone','6GB RAM phone',8999,'Mobile',20,'img/ph1.jpg',TRUE),
(@seller3,'iPhone Cable','Lightning cable',499,'Mobile',60,'img/cable1.jpg',TRUE),
(@seller3,'Phone Case','Shockproof case',299,'Accessories',80,'img/case2.jpg',TRUE),
(@seller3,'Screen Protector','Tempered glass',199,'Accessories',100,'img/sp2.jpg',TRUE),
(@seller3,'Wireless Charger','Fast charge pad',1299,'Chargers',25,'img/wc1.jpg',TRUE),

(@seller3,'Bluetooth Earbuds','TWS earbuds',1999,'Audio',18,'img/ear1.jpg',TRUE),
(@seller3,'Car Holder','Phone mount',399,'Accessories',45,'img/ch1.jpg',TRUE),
(@seller3,'Selfie Stick','Tripod stick',599,'Accessories',35,'img/ss1.jpg',TRUE),
(@seller3,'SIM Cutter','SIM tool kit',149,'Tools',90,'img/sim1.jpg',TRUE),
(@seller3,'Power Adapter','Fast adapter',999,'Chargers',28,'img/adp1.jpg',TRUE),

(@seller3,'Tablet 10inch','Android tablet',12999,'Mobile',7,'img/tab1.jpg',TRUE),
(@seller3,'Stylus Pen','Touch pen',699,'Accessories',40,'img/pen1.jpg',TRUE),
(@seller3,'OTG Cable','USB OTG',249,'Cables',70,'img/otg1.jpg',TRUE),
(@seller3,'Memory Card 128GB','MicroSD',1599,'Storage',22,'img/sd1.jpg',TRUE),
(@seller3,'Phone Ring','Finger holder',99,'Accessories',120,'img/ring1.jpg',TRUE);



/* ===============================
   SELLER 4
================================ */

INSERT INTO users (first_name,last_name,email,username,password_hash)
VALUES ('Derek','Cruz','derek@test.com','derekseller','hash4');

INSERT INTO sellers (user_id,business_name,is_verified,verification_date)
VALUES (LAST_INSERT_ID(),'Derek Home Tech',TRUE,NOW());

SET @seller4 = LAST_INSERT_ID();


INSERT INTO products
(seller_id,name,description,price,category,stock_quantity,image_path,is_active)
VALUES
(@seller4,'Smart TV 43"','Android TV',17999,'Home',6,'img/tv1.jpg',TRUE),
(@seller4,'Sound Bar','Home theater bar',4999,'Audio',10,'img/sb1.jpg',TRUE),
(@seller4,'Security Camera','WiFi CCTV',2499,'Security',15,'img/cam1.jpg',TRUE),
(@seller4,'Smart Plug','WiFi plug',799,'SmartHome',35,'img/plug1.jpg',TRUE),
(@seller4,'Robot Vacuum','Auto cleaner',15999,'Home',4,'img/vac1.jpg',TRUE),

(@seller4,'Air Purifier','HEPA filter',6999,'Home',8,'img/ap1.jpg',TRUE),
(@seller4,'Door Sensor','Smart sensor',599,'Security',50,'img/ds1.jpg',TRUE),
(@seller4,'LED Strip','RGB lights',999,'Lighting',30,'img/led1.jpg',TRUE),
(@seller4,'Smart Bulb','WiFi bulb',499,'Lighting',60,'img/bulb1.jpg',TRUE),
(@seller4,'Projector Mini','Portable projector',8999,'Displays',7,'img/proj1.jpg',TRUE),

(@seller4,'Digital Clock','LED clock',1299,'Home',20,'img/clk1.jpg',TRUE),
(@seller4,'Smart Doorbell','Video bell',3999,'Security',9,'img/db1.jpg',TRUE),
(@seller4,'Water Leak Sensor','Flood alert',899,'Security',25,'img/wls1.jpg',TRUE),
(@seller4,'Thermostat','Smart control',5499,'SmartHome',6,'img/th1.jpg',TRUE),
(@seller4,'IR Remote Hub','Universal remote',1599,'SmartHome',14,'img/ir1.jpg',TRUE);



/* ===============================
   SELLER 5
================================ */

INSERT INTO users (first_name,last_name,email,username,password_hash)
VALUES ('Evan','Torres','evan@test.com','evanseller','hash5');

INSERT INTO sellers (user_id,business_name,is_verified,verification_date)
VALUES (LAST_INSERT_ID(),'Evan Gaming Shop',TRUE,NOW());

SET @seller5 = LAST_INSERT_ID();


INSERT INTO products
(seller_id,name,description,price,category,stock_quantity,image_path,is_active)
VALUES
(@seller5,'Gaming Chair','Ergonomic chair',8999,'Gaming',6,'img/chair1.jpg',TRUE),
(@seller5,'Desk RGB','Gaming desk',12999,'Gaming',4,'img/desk1.jpg',TRUE),
(@seller5,'Controller','Wireless pad',2499,'Gaming',20,'img/ctrl1.jpg',TRUE),
(@seller5,'VR Headset','Virtual reality',15999,'Gaming',3,'img/vr1.jpg',TRUE),
(@seller5,'Stream Deck','Control panel',7499,'Streaming',7,'img/sd1.jpg',TRUE),

(@seller5,'Game Capture','HD capture',5499,'Streaming',8,'img/cap2.jpg',TRUE),
(@seller5,'Gaming Mic','RGB microphone',3499,'Audio',12,'img/gmic1.jpg',TRUE),
(@seller5,'LED Headset Stand','RGB stand',1299,'Gaming',25,'img/stand2.jpg',TRUE),
(@seller5,'Mouse Bungee','Cable holder',499,'Gaming',40,'img/mb1.jpg',TRUE),
(@seller5,'Racing Wheel','Steering wheel',18999,'Gaming',2,'img/wheel1.jpg',TRUE),

(@seller5,'Joystick','Flight stick',6999,'Gaming',5,'img/js1.jpg',TRUE),
(@seller5,'Portable SSD','1TB SSD',7999,'Storage',9,'img/pssd1.jpg',TRUE),
(@seller5,'Green Screen','Streaming screen',2999,'Streaming',11,'img/gs1.jpg',TRUE),
(@seller5,'Webcam Pro','4K webcam',11999,'Cameras',4,'img/wc2.jpg',TRUE),
(@seller5,'RGB Mousepad XL','Large mousepad',999,'Gaming',45,'img/mp2.jpg',TRUE);
