\c postgres;
drop DATABASE takalo;
CREATE DATABASE takalo;
\c takalo;

CREATE TABLE genre(
    id SERIAL PRIMARY KEY,
    genre VARCHAR(5)
);

CREATE TABLE utilisateur(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(105),
    mail VARCHAR(50),
    motdepasse VARCHAR(10),
    contact INT,
    idGenre INT,
    FOREIGN KEY (idGenre) REFERENCES genre(id)
);

CREATE TABLE administrateur(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(10),
    prenom VARCHAR(15),
    mail VARCHAR(20),
    motdepasse VARCHAR(10)
);

CREATE TABLE categorie(
    id SERIAL PRIMARY KEY,
    nomCategorie VARCHAR(10)
);

CREATE TABLE objet(
    id SERIAL PRIMARY KEY ,
    idCategorie INT,
    idUtilisateur INT,
    titre VARCHAR(50),
    descriptions VARCHAR(250),
    tarif double precision,
    FOREIGN KEY (idCategorie) REFERENCES categorie(id),
    FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(id)
);

CREATE TABLE proposition(
    idObjet1 INT,
    idObjet2 INT,
    conformer INT,
    accepter INT,
    FOREIGN KEY (idObjet1) REFERENCES objet(id),
    FOREIGN KEY (idObjet2) REFERENCES objet(id)
);

INSERT INTO genre(genre) values
    ('homme'),
    ('femme');

INSERT INTO utilisateur(nom, prenom, mail, motdepasse, contact, idGenre) values
    ('rakoto', 'albert', 'albert@gmail.com', 'albert', 0325524899, 1);

INSERT INTO administrateur(nom, prenom, mail, motdepasse) values
    ('admin','admin', 'admin@gmail.com', 'admin');

INSERT INTO categorie(nomCategorie) values
    ('vetements'),
    ('livres'),
    ('chaussures'),
    ('telephones'),
    ('disque');

INSERT INTO objet(idCategorie, idUtilisateur, titre, descriptions, tarif) values
    (1,1,'Short Adidas','taille : 38, couleur : blanche',30000.00),
    (1,1,'Pull Ralph Laurene','taille : XL, couleur : noir',25000.07),
    (3,1,'Jordan 30','pointure : 42, couleur : blanche & noire',30000.00),
    (4,1,'Xiaomi note 10','couleur : gold, ... ',300000.00);










