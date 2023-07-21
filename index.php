<!DOCTYPE html>
<html>
	<head>
		<title>Devis - COMITI</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
	</head>
	
	<body>
		<h1>Calcul du total du devis - COMITI</h1>
		
		<form action="devis.php" method="post">
			<div>
				<label for="nbAdherents-choix">Combien d'adhérents avez-vous ?</label>
				
				<input type="number" id="nbAdherents-choix" name="nbAdherents" />
			</div>
			
			<div>
				<label for="nbSections-choix">Quel est votre nombre de sections désiré ?</label>
				
				<input type="number" id="nbSections-choix" name="nbSections" />
			</div>
			
			<div>
				<label for="federation-selection">À quelle fédération êtes-vous affilié ?</label>
				
				<select name="federation" id="federation-selection">
					<option value="">--Sélectionnez une option--</option>
					<option value="N">Fédération de Natation</option>
					<option value="G">Fédération de Gymnastique</option>
					<option value="B">Fédération de Basketball</option>
					<option value="A">Autre fédération</option>
				</select>
			</div>
			
			<div>
				<label for="validation-choix">Cliquez ici pour valider ces réponses.</label>
				
				<input type="submit" id="validation-choix" name="validation" value="OK" />
			</div>
		</form>
	</body>
</html>