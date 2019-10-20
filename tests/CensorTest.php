<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use PHPUnit\Framework\TestCase;
use Snipe\BanBuilder\CensorWords;

class CensorTest extends TestCase
{
    public function testReadExistingDictionary()
    {
        $censor = new CensorWords;
        $censor->setDictionary('fr');
        $this->assertNotEmpty($censor->badwords);

        $censor->setDictionary('es');
        $this->assertNotEmpty($censor->badwords);

        $censor->setDictionary('my');
        $this->assertNotEmpty($censor->badwords);

        $censor->setDictionary('id');
        $this->assertNotEmpty($censor->badwords);
    }

    public function testReadExternalDictionary()
    {
        $censor = new CensorWords;
        $censor->setDictionary(__DIR__.'/testFile/my.php');
        $this->assertNotEmpty($censor->badwords);
    }

    public function testAddDictionary()
    {
        $censor = new CensorWords;
        $this->assertNotEmpty($censor->badwords);

        $string1 = $censor->censorString('fu*k');
        $this->assertEquals('****', $string1['clean']);

        $censor->addDictionary('fr');
        $string2 = $censor->censorString('nique');
        $this->assertEquals('*****', $string2['clean']);


        $censor->addDictionary('my');
        $string2 = $censor->censorString('anak haram');
        $this->assertEquals('**********', $string2['clean']);

        $string3 = $censor->censorString('babi');
        $this->assertEquals('****', $string3['clean']);

    }

    public function testNotExistDictionary()
    {
        $censor = new CensorWords;
        $censor->setDictionary('poopfaced-blahblah-this-file-isnt-real');
        $this->assertEmpty($censor->badwords);
    }

    public function testLoadMultipleDictionaries()
    {
        $censor = new CensorWords();
        $censor->setDictionary(array(
            'en-us',
            'en-uk',
            'fr',
            __DIR__.'/testFile/my.php'
        ));
        $this->assertContains('punani', $censor->badwords);
        $this->assertContains('doggystyle', $censor->badwords);
        $this->assertContains('salaud', $censor->badwords);
        $this->assertContains('babi', $censor->badwords);
    }

    public function testNotExistFuckeryWord()
    {
        $censor = new CensorWords;
        $censor->setDictionary('fr');
        $string = $censor->censorString('fuck');
        $this->assertEquals('fuck', $string['clean']);
    }

    public function testFuckeryClean()
    {
        $censor = new CensorWords;
        $string = $censor->censorString('f.ck');
        $this->assertEquals('****', $string['clean']);

        $string = $censor->censorString('fu*k');
        $this->assertEquals('****', $string['clean']);

        $string = $censor->censorString('fu*k');
        $this->assertEquals('****', $string['clean']);

        $string = $censor->censorString('fuck');
        $this->assertEquals('****', $string['clean']);

        $string = $censor->censorString('f.u.c.k');
        $this->assertEquals('*******', $string['clean']);

        $censor->setDictionary('my');
        $string = $censor->censorString('b.o.d.o.h');
        $this->assertEquals('*********', $string['clean']);
    }

    public function testWordFuckeryClean()
    {
        $censor = new CensorWords;
        $string = $censor->censorString('abc fuck xyz', true);
        $this->assertEquals('abc **** xyz', $string['clean']);

        $string2 = $censor->censorString('Hello World', true);
        $this->assertEquals('Hello World', $string2['clean']);

        $censor->setDictionary('my');
        $string4 = $censor->censorString('babi kau', true);
        $this->assertEquals('**** kau', $string4['clean']);
    }

    public function testFuckeryOrig()
    {
        $censor = new CensorWords;
        $string = $censor->censorString('fuck');
        $this->assertEquals('fuck', $string['orig']);
    }

    public function testFuckeryCustomReplace()
    {
        $censor = new CensorWords;
        $censor->setReplaceChar('X');
        $string = $censor->censorString('fuck');
        $this->assertEquals('XXXX', $string['clean']);

    }

    public function testFuckeryCustomReplaceException()
    {
        $censor = new CensorWords;
        $censor->setReplaceChar('x');
        $string = $censor->censorString('fuck');
        $this->assertNotEquals('****', $string['clean']);
    }

    public function testSameCensorObj()
    {
        $censor = new CensorWords;
        $string = $censor->censorString('fuck');
        $this->assertEquals('****', $string['clean']);

        $censor->setDictionary('my');
        $string2 = $censor->censorString('babi');
        $this->assertEquals('****', $string2['clean']);

    }

    public function testWhiteListCensorObj()
    {
        $censor = new CensorWords;
        $censor->addWhiteList([
            'fuck',
            'ass',
            'Mass',
        ]);

        $string = $censor->censorString('fuck dumb ass bitch FUCK Mass');
        $this->assertEquals('fuck dumb ass ***** **** Mass', $string['clean']);

        $string = $censor->censorString('f*ck dumb ass bitch FUCK Mass');
        $this->assertEquals('**** dumb ass ***** **** Mass', $string['clean']);
    }
}
