create database saep;

create table carro(
       car_codigo int primary key auto_increment,
       car_modelo varchar(255),
       car_valor varchar(255)
);

create table cliente(
       cli_codigo int primary key auto_increment,
       cli_nome varchar(255),
       cli_endereco varchar(255),
       cli_cpf varchar(255)
);

alter table cliente add column car_codigo int,
add constraint fk_car_codig foreign key (car_codigo) references carro(car_codigo)