<?php
defined('SOME_PATH') or die('Unauthorized access');
//TäMä ON sovelman Manifestointipiiri bootstrap tiedosto.
//Manifestointipiiri-sovelma. Tämä sovellus avataan pääikkunasta.
//Käyttäjäoikeukseien mukaan voidaan näyttää kolme erilaista sivua:
//Kun käyttäjä ei ole kirjatunut tai käyttäjällä ei ole oikeuksia manifestointipiiriin näytetään tilaussivu
//Jos käyttäjällä on oikeudet kokoversioon näytetään manifestointipiirin sivut
//Jos käyttäjällä on oikeudet suppeampaan versioon, näytetään se, sekä lisäksi mahdollisuus tilata
//Versioiden tilauksen päättymisen lähestyessä voidaan tästä varoittaa ja antaa linkki tilaussivulle.
//SOVELMAN TARKOITUS
// tämän sovelman tarkoitus on olla esimerkki usean eri näkymän ja näihin liitettyjen mallien käytöstä
// tällä sovelmalla on oletusmalli ja näkymä, nimeltään 'default'
// lisäksi on system malli, ja sitä käyttää näkymät system ja date.
// Vaihdettavia template tiedostoja esittelee system näkymän templatet short ja long, joissa on eri systeemin tiedot,
//   mutta samalla mallin SomeModelSystem metodilla haettuna.


// CONTROLLER
// controller on nimeltään SomeControllerManifest
//nimi on täysin ohjelmoijan valittavissa, ja voisi olla nimeltään yhtähyvin
// class Foo
// Nimissä yritetään kuitenkin yleensä kuvata jotain luokan merkityksestä, siksi Foo on huono nimi

//PATH_CONTENT on vakio, joka luodaan define(name,value) funktiolla SomeApplication metodissa dispatch()
// Se osoittaa koko tiedostojärjestelmässä tämän tiedoston juureen, siis dirname(__FILE__)
//   suoritettuna tässä tiedostossa antaisi saman arvon kuin CONTENT_PATH. 
//     Alla oleva koodi on turha, mutta esimerkin vuosi mukana
if (!defined('PATH_CONTENT')) {
	define('PATH_CONTENT',dirname(__FILE__));
}
//DS on vakio, joka luodaan define(name, value) funtiolla includes/common.php tiedostossa.
//  Se on hakemistojen välimerkki, siis / linuksissa, ja \ windowsissa.
include(PATH_CONTENT.DS.'controller'.DS.'default.php');
$c = new SomeControllerManifest();

//execute loppujen lopuksi - mvc välivaiheiden jälkeen - johtaa siihen, että html koodi on luotu ja tulostettu.
// execute metodin sisäinen toiminta on sellainen, että jos http osoitteessa on view=[value] parametri
//   yritetään luokasta SomeCOntrollerExample etsiä tämän nimistä metodia suoritettavaksi.
$c->execute();