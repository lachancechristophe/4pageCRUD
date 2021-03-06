CREATE TABLE proprietairesvoitures (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(40) not null,
    adresse VARCHAR(80) not null
);

CREATE TABLE voituresexotiques (
    voiture_id SERIAL,
    proprietaire_id INT REFERENCES proprietairesvoitures(id),
    vin VARCHAR(20) not null,
    marque VARCHAR(20) not null,
    modele VARCHAR(80) not null,
    annee INT not null,
    PRIMARY KEY (voiture_id, proprietaire_id)
);