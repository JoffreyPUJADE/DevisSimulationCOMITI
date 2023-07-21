<?php
	function calculPrixTTC($nbAdherents, $nbSections, $federation)
	{
		// Traitement de la fédération choisie.
		
		$offreSections = false;
		$reducAdherents = 1;
		$reducSections = 1;
		$nomFederation = '';
		
		switch($federation)
		{
			case 'N' :
				$offreSections = true;
				$nomFederation = 'Fédération de Natation';
			break;
			
			case 'G' :
				$reducAdherents = 0.85;
				$nomFederation = 'Fédération de Gymnastique';
			break;
			
			case 'B' :
				$reducSections = 0.7;
				$nomFederation = 'Fédération de Basketball';
			break;
			
			default:
				$nomFederation = 'Autre fédération';
			break;
		}
		
		// Traitement du nombre d'adhérents.
		
		$prixNbAdherents = 0;
		
		if($nbAdherents < 0) ; // Cas à part
		
		if($nbAdherents <= 100)
			$prixNbAdherents = 10.0;
		else if($nbAdherents > 100 && $nbAdherents <= 200)
			$prixNbAdherents = 0.10 * $nbAdherents;
		else if($nbAdherents > 200 && $nbAdherents <= 500)
			$prixNbAdherents = 0.09 * $nbAdherents;
		else if($nbAdherents > 500 && $nbAdherents <= 1000)
			$prixNbAdherents = 0.08 * $nbAdherents;
		else if($nbAdherents > 1000 && $nbAdherents <= 10000)
		{
			$nbA = floatval($nbAdherents);
			
			$prixNbAdherents = 70.0 * ceil($nbA / 1000.0);
		}
		else if($nbAdherents > 10000)
			$prixNbAdherents = 1000.0;
		
		$prixNbAdherents *= $reducAdherents;
		
		// Traitement du nombre de sections.
		
		$prixNbSections = 0;
		$nbSectionsOffertes = 0;
		
		if($nbAdherents > 1000)
			++$nbSectionsOffertes;
		
		if($offreSections)
			$nbSectionsOffertes += 3;
		
		if(($nbSections - $nbSectionsOffertes) > 0)
			$prixNbSections = 5 * ($nbSections - $nbSectionsOffertes);
		
		$prixNbSections *= $reducSections;
		
		// Calcul du prix total.
		
		$prixTotal = ($prixNbAdherents + $prixNbSections);
		$prixTotal += $prixTotal * 0.2;
		
		return $prixTotal;
	}
	
	$nbAdherents = intval($_POST['nbAdherents'], 10);
	$nbSections = intval($_POST['nbSections']);
	$federation = $_POST['federation'];
	
	$prixTotal = calculPrixTTC($nbAdherents, $nbSections, $federation);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Devis - COMITI</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
	</head>
	
	<body>
		<h1>Résultat du calcul du total du devis - COMITI</h1>
		
		<table>
			<thead>
				<tr>
					<th colspan="2">Devis</th>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<td>Nombre d'adhérents</td>
					<td><?php echo $nbAdherents ?></td>
				</tr>
				
				<tr>
					<td>Nombre de sections</td>
					<td><?php echo $nbSections; ?></td>
				</tr>
				
				<tr>
					<td>Fédération</td>
					<td><?php echo $federation; ?></td>
				</tr>
				
				<tr>
					<td>Coût total</td>
					<td><?php echo "$prixTotal €"; ?></td>
				</tr>
			</tbody>
		</table>
	</body>
</html>