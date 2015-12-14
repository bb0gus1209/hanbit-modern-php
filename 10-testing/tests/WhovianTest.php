<?php
require dirname(__DIR__) . '/src/Whovian.php';

class WhovianTest extends PHPUnit_Framework_TestCase
{
    public function testSetsDoctorWithConstructor()
    {
        $whovian = new Whovian('피터 카팔디');
        $this->assertAttributeEquals('피터 카팔디', 'favoriteDoctor', $whovian);
    }

    public function testSaysDoctorName()
    {
        $whovian = new Whovian('데이비드 테넌트');
        $this->assertEquals('최고의 닥터는 바로 데이비드 테넌트', $whovian->say());
    }

    public function testRespondToInAgreement()
    {
        $whovian = new Whovian('데이비드 테넌트');

        $opinion = '데이비드 테넌트는 이견의 여지가 없는 최고의 닥터입니다.';
        $this->assertEquals('옳소!', $whovian->respondTo($opinion));
    }

    /**
     * @expectedException Exception
     */
    public function testRespondToInDisagreement()
    {
        $whovian = new Whovian('데이비드 테넌트');

        $opinion = '아냐. 맷 스미스가 끝내주지!';
        $whovian->respondTo($opinion);
    }
}
