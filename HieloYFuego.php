<?php
require_once('../SBClientSDK/SBApp.php');

class HieloYFuego extends SBApp
{
	// Métodos protegidos
	protected function onError($errorType_)
	{
		error_log($errorType_);
	}
	protected function onNewVote(SBUser $user_,$newVote_,$oldRating_,$newRating_)
	{
		$this->replyOrFalse("Gracias por votarme con ".$newVote_." estrella(s) :)");
	}	
	protected function onNewContactSubscription(SBUser $user_)
	{
		if(($userName = $user_->getSBUserNameOrFalse()))
		{
			$this->replyOrFalse(utf8_encode("¡Hola ".$userName."! ¡Bienvenid@ a HieloYFuegoApp!"));		
		}	
	}	
	protected function onNewContactUnSubscription(SBUser $user_)
	{
		if(($userName = $user_->getSBUserNameOrFalse()))
		{
			error_log($userName." se ha ido...");
		}
	}	
	protected function onNewMessage(SBMessage $msg_)
	{
		if(($messageText = $msg_->getSBMessageTextOrFalse()))
		{
			$this->replyOrFalse($messageText);			
		}
	}
}

// Create a new SBApp on dev.spotbros.com and copy-paste your SBCode and key
$hieloYFuegoSBCode = "3XJCJJJ";
$hieloYFuegoKey = "65f53282bc1bfe27ab8a5f438febdc491e8465f788519c4984ef7263af68a5d2";
$hieloYFuego=new HieloYFuego($hieloYFuegoSBCode,$hieloYFuegoKey);
$hieloYFuego->serveRequest($_GET["params"]);
?>
