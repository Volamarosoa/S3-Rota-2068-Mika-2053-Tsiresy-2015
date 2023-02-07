create database agenceimmobiliere;
\c agenceimmobiliere;
-- use agenceimmobiliere;

create table client(
    idClient serial primary key,
    mail varchar(255),
    nom varchar(150),
    prenom varchar(150),
    passWord varchar(100),
    contact varchar(10)
);

create table superUtilisateur(
    idSuperUtilisateur serial primary key,
    mail varchar(255),
    nom varchar(150),
    prenom varchar(150),
    passWord varchar(100),
    contact varchar(11)
);

create table typeHabitation(
    idType serial primary key,
    nomType varchar(100)
);

create table quartier(
    idQuartier serial primary key,
    nomQuartier varchar(100)
);

create table habitation(
    idHabitation serial primary key,
    idType int,
    nombreChambre int,
    loyerParJour float,
    idQuartier int,
    descrption varchar(2000),
    FOREIGN KEY (idType) references typeHabitation(idType),
    FOREIGN KEY (idQuartier) references quartier(idQuartier)
);

create table photos(
    idHabitation int,
    photo varchar(255),
    FOREIGN KEY (idHabitation)references habitation(idHabitation)
);

create table disponibilite(
    idHabitation int,
    idClient int,
    dateDebut date,
    dateFin date,
    tarif float,
    FOREIGN KEY (idHabitation)references habitation(idHabitation),
    FOREIGN KEY (idClient)references client(idClient)
);

insert into superUtilisateur(mail,nom,prenom,passWord,contact) values
('rojorabemananjary@gmail.com','RABEMANANJARY','Rojo','rojoSuper','03426598157');

insert into client('rota@gmail.com','RAZAFIMANANTSOA','Rota','rota','03426598157');

insert into typeHabitation(nomType) values
('Maison'),
('Studio');

insert into quartier(nomQuartier) values
('Imerimanjaka'),
('Ambohibao'),
('Nosy'),
('Ivato');

insert into habitation(idType,nombreChambre,loyerParJour,idQuartier,descrption) values
(1,4,200000,3,'Des outils luxieux, il y a quatre chambre d acouchement apart les cuisines. Il y a aussi un terrain de basket dans la cours et un piscine de deux m de long,... '),
(1,2,100000,4,'Un beau maison de famille, tres confort pour les vacances en famille. Il y a deux chambres d acouchement apart les cuisine. Il y a de l eau chaude'),
(2,2,100000,2,'Il y a un salle pour faire le tournage, une salle de studio, une piscine, deux toillettes et trois vestieres.');


