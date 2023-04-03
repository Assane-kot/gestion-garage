-- Les calcules
-- Compter
SELECT COUNT(iduser) FROM user;
SELECT COUNT(*) FROM user;
SELECT COUNT(*) as "nombre total d'utilisateur" FROM user;
-- La somme
--la somme total des pieces
SELECT SUM(quantite) as "Nombre total des pièces" FROM Piece;
-- la moyenne des puuissance des véhicules
SELECT AVG(puissance as "Moyenne puuissance") FROM vehicule;
--Minimun et maximum
--La puissance maximale et minimale des vehicules
SELECT MIN(puissance), MAX(puissance) FROM vehicule;
-- Les chaines de caractère
-- La concaténation
SELECT CONCAT(prenom," ",nom) AS utilisateur FROM user;
--Extraire une partie d'une chaine de caractère
SELECT SUBSTRING(prenom, 1,4) FROM user;
-- Concaténer les 3 premières lettre du prenom au trois premières lettre du nom
SELECT CONCAT(SUBSTRING(prenom, 1,5),SUBSTRING(nom, 1,4)) AS utilisateur FROM user;
--Reverse
SELECT REVERSE(prenom) FROM user;
--Operateur logique OR AND 
-- BETWEEN
SELECT prenom, nom, profil from user WHERE profil="demandeur" OR profil="intervenant";

SELECT * FROM vehicule WHERE puissance BETWEEN 100 AND 1000;

-- Trie ORDER BY DESC, ASC

SELECT      us.prenom prenom,
            us.nom nom,
            veh.marque marque,
            d.commentaire commentaire
            FROM `demandeIntervention` d 
            LEFT JOIN `vehicule` veh on d.vehicule=veh.idVehicule
            LEFT JOIN `user` us on us.idUser=d.demandeur
            Where profil = "demandeur" 
            GROUP BY marque;