<?php

if(!defined("IN_MYBB"))
{
    die("Direct initialization of this file is not allowed.");
}

$plugins->add_hook("private_read", "read_pm");


function mybbpgp_info()
{
    return array(
        "name"			=> "MyBB PGP",
        "description"	=> "Adds PGP encryption/decryption functionality to MyBB",
        "website"		=> "https://github.com/orgy/mybbpgp",
        "author"		=> "Squad@HF",
        "authorsite"	=> "https://github.com/orgy/mybbpgp",
        "version"		=> "1.0",
        "guid" 			=> "",
        "codename"		=> str_replace('.php', '', basename(__FILE__)),
        "compatibility" => "18*"
    );
}

function mybbpgp_install()
{
    //Todo: Create a database table for public key storage.
	global $mybb, $db, $cache;
	
	if (!$db->table_exists("mybbpgp_publickeys")) {
		$db->query("CREATE TABLE IF NOT EXISTS `" . TABLE_PREFIX . "mybbpgp_publickeys` (
			`id` smallint(10) unsigned NOT NULL AUTO_INCREMENT,
			`uid` INT unsigned NOT NULL,
			`pgpkey` BLOB NOT NULL,
			`fingerprint` BINARY(20) NOT NULL,
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
	}
}

function mybbpgp_is_installed()
{
	global $mybb, $db, $cache;

	return $db->table_exists("mybbpgp_publickeys");
}

function mybbpgp_uninstall()
{

}

function mybbpgp_activate()
{

}

function mybbpgp_deactivate()
{

}

function read_pm() {
    //Todo: Detect if there is encrypted text in the PM. If there is, inject a button to decrypt text.
    //Decryption must be done Javascript-side. The private key must not touch the server!
}
