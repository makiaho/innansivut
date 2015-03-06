<?php
/**
* @author Hannu Lohtander
* @package wo2009
* @subpackage library
*
*/

/**
* @author Hannu Lohtander
* @package wo2009
* @subpackage library
*
*/
class SomeDatabasePdomysql extends SomeDatabase {

    public function __construct(array $options) {
        //return new parent__construct(postgres string);
        $host = $options['host'];
        $databasename = $options['database'];
        
        //mysql:host=localhost port=3306 dbname=testdb user=bruce password=mypass
        $str = "mysql:host=$host;port=3306;dbname=$databasename";
        
		$options['dns'] = $str;
        parent::__construct($options);
    }

}