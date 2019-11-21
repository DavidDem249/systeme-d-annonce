<?php 

//namespace App;

use App\User;
//use App\Ad;

function getAcheteurName($acheteur_id)
{
	$user = User::find($acheteur_id);
	return $user->name;
}

function getAuteurNam($auteur_id)
{
	$user = User::find($auteur_id);
	return $user->name;
}