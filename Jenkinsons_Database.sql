Create database e_project_jenkinsons
go

use e_project_jenkinsons
go

CREATE TABLE events (
  id_ev int PRIMARY KEY IDENTITY(1,1),
  ev_title varchar(50),
  ev_thumbnail varchar(100),
  ev_start datetime,
  ev_end datetime,
  ev_description varchar(200)
);
go

CREATE TABLE user_emusement_card (
  id int PRIMARY KEY IDENTITY(1,1),
  card_number float,
  email varchar(50),
  birtday datetime,
  password varchar(50)
);
go

CREATE TABLE explore (
  id_explore int PRIMARY KEY IDENTITY(1,1),
  image varchar(500),
  title varchar(50),
  description varchar(200),
  price varchar(50),
  age varchar(50),
  open_time datetime,
  discount varchar(100),
  id_card_explore int,
  id_explore_book int
);
go

CREATE TABLE animal (
  id_animal int PRIMARY KEY IDENTITY(1,1),
  servise varchar(100),
  name varchar(50),
  image varchar(500),
  price varchar(50),
  description varchar(200),
  id_animal_book int
);
go

CREATE TABLE product (
  id_prduct int PRIMARY KEY IDENTITY(1,1),
  image varchar(500),
  title varchar(50),
  description varchar(200),
  price varchar(50),
  id_card_product int,
  id_product_book int
);
go

CREATE TABLE menu (
  id_menu int PRIMARY KEY IDENTITY(1,1),
  menu_title varchar(50),
  menu_description varchar(200),
  menu_price varchar(20),
  id_menu_book int
);
go

CREATE TABLE booking (
  id_booking int PRIMARY KEY IDENTITY(1,1),
  price varchar(20),
  date datetime,
  id_animal_bk int,
  id_menu_bk int,
  id_explore_bk int,
  id_product_bk int,
  id_user int
);
go

CREATE TABLE userid (
  id int PRIMARY KEY IDENTITY(1,1),
  name varchar(50),
  email varchar(50),
  phone varchar(20),
  address varchar(50),
  payment varchar(500)
);
go

CREATE TABLE contact (
  id_contact int PRIMARY KEY IDENTITY(1,1),
  name varchar(50),
  email varchar(50),
  address varchar(50),
  zip_postal_code varchar(20),
  subject varchar(50),
  comment varchar(200)
);
go

CREATE TABLE animal_book_info (
  id_a_info int PRIMARY KEY IDENTITY(1,1),
  book_number int,
  sum_price varchar(50),
  id_book_a int
);
go

CREATE TABLE product_book_info (
  id_p_info int PRIMARY KEY IDENTITY(1,1),
  book_number int,
  sum_price varchar(50),
  id_book_p int
);
go

CREATE TABLE explore_book_info (
  id_e_info int PRIMARY KEY IDENTITY(1,1),
  book_number int,
  sum_price varchar(50),
  id_book_e int
);
go

CREATE TABLE menu_book_info (
  id_menu_info int PRIMARY KEY IDENTITY(1,1),
  book_number int,
  sum_price varchar(50),
  id_book_menu int
);
go

ALTER TABLE explore ADD FOREIGN KEY (id_card_explore) REFERENCES user_emusement_card (id);
go

ALTER TABLE booking ADD FOREIGN KEY (id_user) REFERENCES userid (id);
go

ALTER TABLE animal ADD FOREIGN KEY (id_animal_book) REFERENCES animal_book_info (id_a_info);
go

ALTER TABLE product ADD FOREIGN KEY (id_product_book) REFERENCES product_book_info (id_p_info);
go

ALTER TABLE animal_book_info ADD FOREIGN KEY (id_book_a) REFERENCES booking (id_animal_bk);
go

ALTER TABLE product_book_info ADD FOREIGN KEY (id_book_p) REFERENCES booking (id_product_bk);
go

ALTER TABLE explore ADD FOREIGN KEY (id_explore_book) REFERENCES explore_book_info (id_e_info);
go

ALTER TABLE menu ADD FOREIGN KEY (id_menu_book) REFERENCES menu_book_info (id_menu_info);
go

ALTER TABLE explore_book_info ADD FOREIGN KEY (id_book_e) REFERENCES booking (id_explore_bk);
go

ALTER TABLE menu_book_info ADD FOREIGN KEY (id_book_menu) REFERENCES booking (id_menu_bk);
go

ALTER TABLE product ADD FOREIGN KEY (id_card_product) REFERENCES user_emusement_card (id);
go
