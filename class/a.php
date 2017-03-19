<?php
/**
 * Created by PhpStorm.
 * User: zyw
 * Date: 2016/8/11
 * Time: 15:34
 */
//$son = new son();
//$son->a();
class father {
    private $a = 0;
    function __construct(){
        $this->a = 1;
    }

    public function a(){
        echo $this->a;
    }
}
class son extends father{
    function __construct(){
        parent::__construct();
    }
}
class Product{
    public $name;
    public $price;
    function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

class ProcessSale{
    private $callbacks;
    function registerCalllback( $callback ){
        if( ! is_callable( $callback ) ){
            throw new Exception("callback not callable");
        }
        $this->callbacks[] = $callback;
    }
    function sale( $product ){
        print "{$product->name}: processing <br>";
        foreach( $this->callbacks as $callback ){
            call_user_func( $callback, $product );
        }
    }
}

//$logger = create_function('$product', 'print  "logging ({$product->name})<br>";');
$logger = function( $product ){
    print "logging({$product->name})<br>";
};
$processor = new ProcessSale();
$processor->registerCalllback( $logger );
$processor->sale( new Product( "shoes", 6 ));
$processor->sale( new Product( "coffee", 6 ));
