<?php
function adminer_object() {
	class AdminerSoftware extends Adminer {
		function login($login, $password) {
			return true;
		}
	}
	return new AdminerSoftware;
}
include "./adminer-4.3.1-en.php";
