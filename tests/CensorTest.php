<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload


use Snipe\BanBuilder\CensorWords;

class CensorTest extends PHPUnit_Framework_TestCase {
 
  public function testSetDictionary()
  {
    $censor = new CensorWords;
    $this->assertNotEmpty($censor->setDictionary());
  }
  
  /**
  * @expectedException PHPUnit_Framework_Error
  */
  public function testInvalidDictionaryException()
  {
	$censor = new CensorWords;
    $this->assertNotEmpty($censor->setDictionary('poopfaced-blahblah-this-file-isnt-real'));	  
  }
  
  public function testFuckeryClean()
  {
    $censor = new CensorWords;
    $badwords = $censor->setDictionary();
    $string = $censor->censorString('fuck',$badwords, '*');
    $this->assertEquals('****', $string['clean']);
    
  }
  
  public function testFuckeryOrig()
  {
    $censor = new CensorWords;
    $badwords = $censor->setDictionary();
    $string = $censor->censorString('fuck',$badwords, '*');
    $this->assertEquals('fuck', $string['orig']);
    
  }
  
  public function testFuckeryCustomReplace()
  {
    $censor = new CensorWords;
    $badwords = $censor->setDictionary();
    $string = $censor->censorString('fuck',$badwords, 'X');
    $this->assertEquals('XXXX', $string['clean']);
    
  }
    
 
}