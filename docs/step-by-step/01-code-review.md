# Code review

## Tâches

> Réaliser une revue de code en équipe du code et des tests

- Que cherchons-nous ?
  - comprendre le fonctionnel
  - des code smells
  - de mauvais nommages
  - de la duplication
  - des incohérences
  - ...
  
- fonction add / times / divide (MoneyCalculator.php) :
	parametre $currency jamais utilisé
	multiplication et division de types different (float int) + nom "value" pas clair

- Commentaires / docs
- Lisibilité / compréhension du code
- Extract methode (faire des méthodes privées pour faciliter la compréhension de la public)

> Partager le résultat dans un backlog d'amélioration continue

Sur votre dépôt de code, ajouter une issue par point d'amélioration, cette base sera utile pour la suite
