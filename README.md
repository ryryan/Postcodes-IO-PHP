Postcodes.io PHP
===================


Developed to use the [postcodes.io](http://postcodes.io/) API endpoint easily via PHP.

----------


Example
-------------

    <?php
    require 'Postcodes-IO-PHP.php';
    $postcode = new Postcode();
	$lookup = $postcode->lookup("SW1A 2AA");
	print_r($lookup);
	?>


## License

MIT Licensed