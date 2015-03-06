
<p style="color:red">WHEN YOU HAVE COMPLETED YOUR CONFIGURATION REMOVE WHOLE FOLDER 
content/configuration FROM THE FRAMEWORK!
</p>

<h1>Before you use this framework with database.</h1>

<p>
If you are using postgres database at the universioty of tampere, make sure you 
 have a database and that you have changed its password.
 

Then, open configuration.php from the root of the framework. Fill the
 values to that file.
</p>

<p> 
 If you are using mysql, like when running XAMPP, open configuration.php
  Fill the values  to that file.
</p>

<p>
Values are:
</p>
<ul>
<li>databasedriver: this is predefined and os one of [pdopostgres|pdomysql]</li>
<li>databasehost: Host of the database. Uta account value is dbstud.sis.uta.fi. With XAMPP this is localhost or 127.0.0.1.</li>
<li>database: Name of the database. With XAMPP use phpmyadmin to create one</li>
<li>dbuser: Database user, with XAMPP this is root.</li>
<li>dbpass: Database password, with XAMPP this is empty</li>
</ul>

<h2>Install User and Session tables.</h2>

<p>  
When you have done configuration.php, open link:<br />
<a href="index.php?app=configuration">index.php?app=configuration</a>. Follow the SEE FIRST: INSTALLATION -link.
<br /><br />
Install session and user databases with the links at the bottom of the page.
<br /><br />
Now you are good to go!
</p>
<h2>Session storage to database.</h2>
<p>
If you want to use database as session storage, you must change:
<br />
'session_handler' => 'file',
<br />
to mysql or database, database when using postgre.
<br /><br />
'session_handler' => 'mysql',
<br />
'session_handler' => 'database',
</p>

<h2>CREATEs for somesession and someuser tables, if created manually.</h2>

<h3>Mysql</h3>
<pre>
CREATE TABLE IF NOT EXISTS `somesession` (
  `sesskey` char(32) NOT NULL,
  `expiry` int(11) NOT NULL,
  `value` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci


CREATE TABLE IF NOT EXISTS `someuser` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `userrole` char(32) DEFAULT NULL,
  `email` text,
  `homepage` text,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1
</pre>

<h3>Postgres</h3>
<pre>
CREATE TABLE somesession (
    sesskey character(32) NOT NULL,
    expiry integer NOT NULL,
    value text
)

CREATE TABLE someuser (
   id SERIAL,
   username character varying(32),
   "password" character(32),
 userrole character(32),
   email text,
   homepage text
	)
</pre>