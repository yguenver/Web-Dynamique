
Groupe 2 (Florent CARLIER):
  Arthur LEMEE
  Yann GUENVER



Base de données info201a :
  FC_grp2_client:
	-Id (inutile (mais clé primaire))
	-Login (le login du client)
	-Mdp (le mot de passe du client)
	-Nom (le nom du cient)
	-Prenom (son prénom)

  FC_grp2_jeux:
	-Jeu (Nom du Jeu (+clé primaire))
	-NomImage (nom de l'image du jeu)
	-AgeMin (age minimum requis)
	-AgeMax (age maxi du jeu (666= infinite))
	-TypeJeux (Genres du jeu: famille, carte...)
	-Description (Description du produit)
	-DateDeSortie (date de sortie du jeu en stock)

  FC_grp2_jeuxLudotheque:
	-Nom (nom du jeu (+clé primaire))
	-NbJeux (nb jeux au total)
	-NbJeuxDispos (le nombre de jeux disponible en stock)

  FC_grp2_Paniers:
	-Jeu (nom du jeu (+partie de la clé primaire))
	-Client (nom du client (+partie de laclé primaire))
	-CreneauMin (Créneau minimal pour aller chercher le jeu (précision de l'année à la seconde))
	-CreneauMax (Créneau maximum pour aller chercher le jeu (précision = idem))



/!\ l'administrateur doit avoir pour login 'arthur'