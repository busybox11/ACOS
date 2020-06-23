<?php
	$translations_path = "../../translations/";
	$home_path = "../../";
	
	// Page specific PHP
	/*if (!empty($_POST)) {
		setcookie("ACOS_Theme", $_POST['ThemeSelector'], time() + 365*24*3600, $home_path);
		setcookie("ACOS_Lang", $_POST['LangSelector'], time() + 365*24*3600, $home_path);
		setcookie("ACOS_just_saved", 'green|Preferences saved ! ACOS_Theme = '.$_COOKIE['ACOS_Theme'].' & ACOS_Lang = '.$_COOKIE['ACOS_Lang'], time() + 5);
		$header = 'Refresh:0; url=index.php?foreground_app=build-it&lang='.$_POST['LangSelector'];
		header($header);
	}*/
	if (isset($_COOKIE['ACOS_just_saved'])) {
		$Output = explode("|", $_COOKIE["ACOS_just_saved"]);
	}

	require $home_path.'lang_select.php';
	if (isset($_COOKIE["ACOS_Theme"])) {
		$Theme = $_COOKIE["ACOS_Theme"];
	} else {
		$Theme = "dark";
		setcookie('ACOS_Theme', 'dark', time() + 365*24*3600, '/acos-remastered');
	}
	$Icon = $home_path.'assets/img/ACOS_BuildIt.png';
	$Name = $translations_path.'navbar/build_it_'.$Lang;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="<?php echo $home_path; ?>css/style.css"/>
	<link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="../style.css"/>
	<link rel="stylesheet" href="<?php echo $home_path.'css/'.$Theme; ?>_theme.css">
	<title>ACOS</title>
</head>
<body>
	<?php require '../header.php'; ?>
	<?php
		if ($_COOKIE['ACOS_Lang'] == 'fr') {
			$SelctedLang = 0;
		} else {
			$SelctedLang = 1;
		}

		if ($_COOKIE['ACOS_Theme'] == 'light') {
			$SelctedTheme = 0;
		} else {
			$SelctedTheme = 1;
		}
	?>
	<form method="post" action="?foreground_app=build-it&lang=<?php echo $Lang; ?>">
		<div id="form_container">
			<?php include $translations_path.'apps/build-it/theme_'.$Lang; ?> : <select id="ThemeSelector" name="ThemeSelector" onmouseout="parent.changeTheme(document.getElementById('ThemeSelector').value);">
				<option value="dark" <?php 
					if ($SelctedTheme == 0) {
						echo 'selected';
					}
				?>><?php include $translations_path.'apps/build-it/dark_theme_'.$Lang; ?></option>
				<option value="light" <?php 
					if ($SelctedTheme == 1) {
						echo 'selected';
					}
				?>><?php include $translations_path.'apps/build-it/light_theme_'.$Lang; ?></option>
			</select><br/><br/>

			<?php include $translations_path.'apps/build-it/language_'.$Lang; ?> : <select id="LangSelector" name="LangSelector" onmouseout="parent.changeLang(document.getElementById('LangSelector').value, 'build-it');">
				<option value="en" <?php 
					if ($SelctedLang == 0) {
						echo 'selected';
					}
				?>><?php include $translations_path.'apps/build-it/english_'.$Lang; ?></option>
				<option value="fr" <?php 
					if ($SelctedLang == 1) {
						echo 'selected';
					}
				?>><?php include $translations_path.'apps/build-it/french_'.$Lang; ?></option>
			</select><br/><br/>

			<!button type="submit"><?php //include $translations_path.'apps/build-it/submit_'.$Lang; ?><!/button>

			<?php
				if (isset($Output)) {
					echo '<p style="color: '.$Output[0].';">'.$Output[1].'</p>';
				}
			?>
		</div>
	</form>
</body>
</html>