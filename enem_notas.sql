create database historico_notas;
use historico_notas;



create table notas(
ID int auto_increment,
id_usuario int,
red float,
cn float,
ch float,
li float,
mat float,
arquitetura float,
direito float,
enfermagem float,
eng_civ float,
medicina float,
primary key(id));
