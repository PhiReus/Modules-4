<?php
namespace Test;
use PHPUnit\Framework\TestCase;
use App\MayTinh;
class MayTinhTest extends TestCase {
    public function test_cong_case(){
        $objMayTinh = new MayTinh();
        $a = 2;
        $b = 3;

        $expected_output = 5;
        $your_output = $objMayTinh->cong($a,$b);

        //so sanh bang
        $this->assertEquals($your_output,$expected_output);
    }
}