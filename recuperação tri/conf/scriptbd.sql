create schema quadrado;
use quadrado;

create table tabuleiro (
	idTab INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	lado varchar(45)
);

create table quadrado (
	idQuad INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    lado varchar(45),
    cor varchar(45),
    QidTab int not null,
    foreign key (QidTab) references tabuleiro(idTab)
);

create table circulo (
	idCirc INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    raio varchar(45),
    cor varchar(45),
    Tab int not null,
    foreign key (Tab) references tabuleiro(idTab)
);

create table usuario (
	idUser INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome varchar(250),
    login varchar(45) not null,
    senha varchar(250) not null
)