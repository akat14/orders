create database orders;

create table orders.users (
	id int auto_increment,
	user varchar(50) not null,
	password varchar(50) not null,
	type varchar(50) not null,
	date timestamp default current_timestamp,
	primary key(id)
)

CREATE TABLE orders.goods (
	id int auto_increment,
	name varchar(50) not null,
	price double(6,2) not null,
	date timestamp default current_timestamp,
	primary key(id)
);

CREATE TABLE orders.orders (
	id int auto_increment,
	date timestamp default current_timestamp,
	client_id int not null,
	good_id int not null,
	primary key(id)
);

insert into orders.users (user, password, type) values ('admin', 'admin','admin');

CREATE TABLE orders.orders (
	id int auto_increment,
	date timestamp default current_timestamp,
	client_id int not null,
	good_id int not null,
	constraint client_id
    foreign key(client_id) 
        references users(id),
	constraint good_id
    foreign key(id) 
        references goods(id),
	primary key(id)
);
