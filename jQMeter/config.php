<?php if (!defined('PLX_ROOT')) exit; 

# Control du token du formulaire
plxToken::validateFormToken($_POST);

if(!empty($_POST)) {
	$plxPlugin->setParam('objectif', $_POST['objectif'], 'cdata');
	$plxPlugin->setParam('actuel', $_POST['actuel'], 'cdata');
	$plxPlugin->setParam('largeur', $_POST['largeur'], 'cdata');
	$plxPlugin->setParam('hauteur', $_POST['hauteur'], 'cdata');
	$plxPlugin->setParam('info', $_POST['info'], 'cdata');
	$plxPlugin->setParam('bgColor', $_POST['bgColor'], 'cdata');
	$plxPlugin->setParam('barColor', $_POST['barColor'], 'cdata');
	$plxPlugin->setParam('affichage', $_POST['affichage'], 'cdata');
	$plxPlugin->saveParams();
	header('Location: parametres_plugin.php?p=jQMeter');
	exit;
}

?>

<p>
	Pour afficher la barre de progression :
</p>

<code>&lt;?php eval($plxShow->callHook('jQMeter')); ?&gt;</code>

<style>
	input, textarea {border-radius: 5px;width: 40%}
	textarea {min-height: 50px}
	label{font-style: italic}
</style>

<form action="parametres_plugin.php?p=jQMeter" method="post">

	<p>
		<label for="objectif">Objectif à atteindre</label>
		<input id="objectif" name="objectif"  maxlength="255" value="<?= $plxPlugin->getParam("objectif"); ?>">
	</p>	

	<p>
		<label for="actuel">Valeur actuelle</label>
		<input id="actuel" name="actuel"  maxlength="255" value="<?= $plxPlugin->getParam("actuel"); ?>">
	</p>

	<p>
		<label for="largeur">Largeur de la barre de progression (ex: 100px ou 60%)</label>
		<input id="largeur" name="largeur"  maxlength="255" value="<?= $plxPlugin->getParam("largeur"); ?>">
	</p>

	<p>
		<label for="hauteur">Hauteur de la barre de progression (ex: 50px)</label>
		<input id="hauteur" name="hauteur"  maxlength="255" value="<?= $plxPlugin->getParam("hauteur"); ?>">
	</p>

	<p>
		<label for="bgColor">Couleur du background (ex:#444444)</label>
		<input id="bgColor" name="bgColor"  maxlength="255" value="<?= $plxPlugin->getParam("bgColor"); ?>">
	</p>

	<p>
		<label for="barColor">Couleur de la barre (ex:#bfd255)</label>
		<input id="barColor" name="barColor"  maxlength="255" value="<?= $plxPlugin->getParam("barColor"); ?>">
	</p>

	<p>
		<label for="info">Information sous la barre de progression</label>
		<textarea id="info" rows="5"   name="info"><?= $plxPlugin->getParam('info'); ?></textarea>

	</p>

	<p>
		<label for="affichage">Afficher le pourcentage dans la barre ?</label>
		<select name="affichage" id="affichage">
           <option value="true" selected>Oui</option>
           <option value="false">Non</option>
       </select>
	</p>

	<p class="in-action-bar">
		<?= plxToken::getTokenPostMethod() ?>
		<input type="submit" name="submit" value="Valider" />
		
	</p>

</form>
