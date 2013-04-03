create table users(id int auto_increment  primary key,
				   username varchar(40) ,
				   password_sha2 varchar(80) ,
				   email varchar(80) ,
				   notify_email varchar(80) ,
				   mobile varchar(20) ,
				   signup_ts int,
				   birth_date date ,
				   is_admin boolean ,
				   activation_code varchar(30)  ,
				   reset_code varchar(50) ) Engine=InnoDB;
				   
create table taxi_makes(id int auto_increment   primary key,
						make varchar(25)  ,
						photo varchar(100) ) Engine=InnoDB;				   
				   
create table `taxis` (id int auto_increment   primary key,
					taxi_number varchar(20)  ,
					make_id int  ,
					score int
					) Engine=InnoDB;				   
				   
create table `reviews` (id int auto_increment   primary key,
					    user_id int  ,
					    taxi_id int  ,
  					    physical_status boolean  ,
					    cleanliness boolean  ,
					    driver_behavior boolean  ,
					    pricing boolean  ,
					    radio_volume boolean  ,
					    driving_style int  ,
					    user_ip varchar(25)   ,
					    review_ts int  
					    ) Engine=InnoDB;
					  
create table logs (id int auto_increment   primary key,
				   ts int  ,
				   user_id int  ,
				   action varchar(50) ,
				   user_ip varchar(25)   ,
				   details text) Engine=InnoDB;