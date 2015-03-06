<?php

someloader('some.application.model');

class SomeModelInstall_Postgres extends SomeModelInstall {
	
	/**
	 * with mysql: need to have host and databasename.
	 * must not have user and pass, at least if host is postgres.cs.uta.fi.
	 * host should be postgres.cs.uta.fi, if not, create notification
	 * session_handler should be file or database
	 */
	public function validateConfiguration() {
		
	}
	
	public function validateDatabaseConnection() {
		
	}
	
	/**
	 * does table someuser exist?
	 */
	public function isSomeUserInstalled() {
		$sql = 
		"select * from information_schema.tables where table_schema='public' ".
		"and table_type='BASE TABLE' AND table_name='someuser'";
		$database = SomeFactory::getDBO();
		$st = $database->query($sql);
		return $st->fetch();
	}
	
	/**
	 * does table somesession exist?
	 */
	public function isSomeSessionInstalled() {
		$sql = 
		"select * from information_schema.tables where table_schema='public' ".
		"and table_type='BASE TABLE' AND table_name='somesession'";
		$database = SomeFactory::getDBO();
		$st = $database->query($sql);
		return $st->fetch();
	}
	
	/**
	 * create somesession table to postgres
	 */
	public function installSomeSessionTable() {
		$sql = "
		 CREATE TABLE somesession (
    sesskey character(32) NOT NULL,
    expiry integer NOT NULL,
    value text
)";
		$database= SomeFactory::getDBO();
		$database->query($sql);
	}
	
	/**
	 * create someuser table to postgres
	 */
	public function installSomeUserTable() {
		$sql = "
		CREATE TABLE someuser (
   id SERIAL,
   username character varying(32),
   \"password\" character(32),
 userrole character(32),
   email text,
   homepage text
	)
		";
		$database= SomeFactory::getDBO();
		$database->query($sql);
	}
	
}