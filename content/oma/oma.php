<?php
defined('SOME_PATH') or die('Unauthorized access');
//TäMä ON sovelman example bootstrap tiedosto.

//SOVELMAN TARKOITUS
// tämän sovelman tarkoitus on olla esimerkki usean eri näkymän ja näihin liitettyjen mallien käytöstä
// tällä sovelmalla on oletus malli ja näkymä, nimeltään 'default'
// lisäksi on system malli, ja sitä käyttää näkymät system ja date.
// Vaihdettavia template tiedostoja esittelee system näkymän templatet short ja long, joissa on eri systeemin tiedot,
//   mutta samalla mallin SomeModelSystem metodilla haettuna.


// CONTROLLER
//tämän example sovelman controller on nimeltään SomeControllerExample
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
//*include(PATH_CONTENT.DS.'controller'.DS.'default.php');
//*$c = new SomeControllerExample();

//execute loppujen lopuksi - mvc välivaiheiden jälkeen - johtaa siihen, että html koodi on luotu ja tulostettu.
// execute metodin sisäinen toiminta on sellainen, että jos http osoitteessa on view=[value] parametri
//   yritetään luokasta SomeCOntrollerExample etsiä tämän nimistä metodia suoritettavaksi.
//*$c->execute();

//jepujee, Koitetaan sitten itse


include(PATH_CONTENT.DS.'controller'.DS.'omacontrolleri.php');
$c = new OmaController();
$c->execute();

