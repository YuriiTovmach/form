<?php

			echo "<b>Получение даных из формы:</b> <br><br>";

			if(isset($_POST['login'])) $login = $_POST['login'];
			if (isset($_POST['password'])) $password = $_POST['password'];
			if(isset($_POST['email'])) $email = $_POST['email'];
			if (isset($_POST['tel'])) $tel = $_POST['tel'];

			echo "<br> Ваш логин: $login  <br> Ваш пароль: $password <br> Ваш email: $email <br> Ваш tel: $tel <br> ";


			if (isset($_POST['upload'])) {
			$blacklist = ['.php', '.phtml', '.php3', '.php4', '.html', 'htm'];
			foreach ($blacklist as $item) {
				if (preg_match("/$item$/", $_FILES['im']['name'])) exit('Расширение файла не подходит!');}

			$type = getimagesize($_FILES['im']['tmp_name']);
			if ($type && ($type['mime'] != 'image/png' ||
		    $type['mime'] != 'image/jpg' || $type['mime'] != 'image/jpeg')) {
		    	if ($_FILES['im']['size'] < 1024 * 1000) {
		    		$upload = 'images/'.$_FILES['im']['name'];
					if(move_uploaded_file($_FILES['im']['tmp_name'], $upload)) echo 'Файл успешно загружен!';
					else echo 'Ошибка при загрузке файла';
		    	}

		    }else exit('Тип файла не подходит');

			} 

			

			
 			