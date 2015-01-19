<?php

class LifeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Life::newCellState
     * @dataProvider providerNewCellState
     */
    public function testNewCellState($sumNeighbors, $state, $result)
    {
        $this->assertEquals($result, Life::newCellState($sumNeighbors, $state));
    }

    /**
     * @covers Life::getNeighbors
     * @dataProvider providerGetNeighbors
     */
    public function testGetNeighbors($array, $i, $j, $resultArray)
    {
        $this->assertEquals($resultArray, Life::getNeighbors($array, $i, $j));
    }

    /**
     * @covers Life::newArrayState
     * @dataProvider providerNewArrayState
     * @depends testNewCellState
     * @depends testGetNeighbors
     */
    public function testNewArrayState($array, $resultArray)
    {
        $this->assertEquals($resultArray, Life::newArrayState($array));
    }

    public function providerNewCellState()
    {
        return array(
            array(
                3, 
                0, 

                1
            ),

            array(
                2, 
                1, 

                1
            ),

            array(
                1, 
                1, 

                0
            ),

            array(
                0, 
                1, 

                0
            ),

            array(
                2, 
                0, 

                0
            ),

            array(
                3, 
                1, 

                1
            ),

            array(
                4, 
                0, 

                0
            ),
        );
    }

    public function providerGetNeighbors()
    {
        return array(
            array(
                array(array(0, 0, 0, 0),
                      array(0, 0, 0, 0),
                      array(0, 0, 0, 0),
                      array(0, 0, 0, 0)),
                1,
                1,
                array(0, 0, 0,
                      0,    0,
                      0, 0, 0)
            ),

            array(
                array(array(0, 1, 0, 0),
                      array(1, 0, 1, 0),
                      array(0, 1, 0, 0),
                      array(0, 0, 0, 0)),
                1,
                1,
                array(0, 1, 0,
                      1,    1,
                      0, 1, 0)
            ),

            array(
                array(array(0, 1, 0, 0),
                      array(1, 0, 1, 0),
                      array(0, 1, 0, 0),
                      array(0, 0, 0, 0)),
                2,
                2,
                array(0, 1, 0,
                      1,    0,
                      0, 0, 0)
            ),

            array(
                array(array(0, 0, 0, 0),
                      array(1, 0, 1, 0),
                      array(0, 0, 0, 0),
                      array(0, 0, 0, 0)),
                1,
                1,
                array(0, 0, 0,
                      1,    1,
                      0, 0, 0)
            ),
        );
    }

    public function providerNewArrayState()
    {
        return array(
            array(
                array(array(0, 0, 0, 0),
                      array(0, 0, 0, 0),
                      array(0, 0, 0, 0),
                      array(0, 0, 0, 0)),

                array(array(0, 0, 0, 0),
                      array(0, 0, 0, 0),
                      array(0, 0, 0, 0),
                      array(0, 0, 0, 0)),
            ),

            array(
                array(array(0, 0, 0, 0),
                      array(0, 1, 0, 0),
                      array(0, 0, 0, 0),
                      array(0, 0, 0, 0)),

                array(array(0, 0, 0, 0),
                      array(0, 0, 0, 0),
                      array(0, 0, 0, 0),
                      array(0, 0, 0, 0)),
            ),

            array(
                array(array(0, 0, 0, 0),
                      array(1, 1, 1, 0),
                      array(0, 0, 0, 0),
                      array(0, 0, 0, 0)),

                array(array(0, 1, 0, 0),
                      array(0, 1, 0, 0),
                      array(0, 1, 0, 0),
                      array(0, 0, 0, 0)),
            ),

            array(
                array(array(0, 0, 0, 0),
                      array(0, 1, 1, 0),
                      array(0, 1, 1, 0),
                      array(0, 0, 0, 0)),

                array(array(0, 0, 0, 0),
                      array(0, 1, 1, 0),
                      array(0, 1, 1, 0),
                      array(0, 0, 0, 0)),
            ),

            array(
                array(array(0, 0, 0, 0),
                      array(0, 1, 1, 1),
                      array(1, 1, 1, 0),
                      array(0, 0, 0, 0)),

                array(array(0, 0, 1, 0),
                      array(1, 0, 0, 1),
                      array(1, 0, 0, 1),
                      array(0, 1, 0, 0)),
            ),

            array(
                array(array(0, 0, 1, 0),
                      array(1, 0, 0, 1),
                      array(1, 0, 0, 1),
                      array(0, 1, 0, 0)),

                array(array(0, 0, 0, 0),
                      array(0, 1, 1, 1),
                      array(1, 1, 1, 0),
                      array(0, 0, 0, 0)),                
            ),

            array(
                array(array(0, 0, 0, 0, 0),
                      array(0, 0, 0, 0, 0),
                      array(0, 0, 0, 0, 0),
                      array(0, 0, 0, 0, 0),
                      array(0, 0, 0, 0, 0)),

                array(array(0, 0, 0, 0, 0),
                      array(0, 0, 0, 0, 0),
                      array(0, 0, 0, 0, 0),
                      array(0, 0, 0, 0, 0),
                      array(0, 0, 0, 0, 0)),               
            ),

            array(
                array(array(0, 0, 0, 0, 0),
                      array(0, 0, 1, 0, 0),
                      array(0, 1, 0, 1, 0),
                      array(0, 0, 1, 0, 0),
                      array(0, 0, 0, 0, 0)),

                array(array(0, 0, 0, 0, 0),
                      array(0, 0, 1, 0, 0),
                      array(0, 1, 0, 1, 0),
                      array(0, 0, 1, 0, 0),
                      array(0, 0, 0, 0, 0)),             
            ),

            array(
                array(array(0, 0, 0, 0, 0),
                      array(0, 1, 1, 0, 0),
                      array(0, 1, 0, 1, 0),
                      array(0, 0, 1, 0, 0),
                      array(0, 0, 0, 0, 0)),

                array(array(0, 0, 0, 0, 0),
                      array(0, 1, 1, 0, 0),
                      array(0, 1, 0, 1, 0),
                      array(0, 0, 1, 0, 0),
                      array(0, 0, 0, 0, 0)),             
            ),

            array(
                array(array(0, 0, 0, 0, 0),
                      array(0, 1, 1, 0, 0),
                      array(0, 1, 0, 1, 0),
                      array(0, 0, 1, 1, 0),
                      array(0, 0, 0, 0, 0)),

                array(array(0, 0, 0, 0, 0),
                      array(0, 1, 1, 0, 0),
                      array(0, 1, 0, 1, 0),
                      array(0, 0, 1, 1, 0),
                      array(0, 0, 0, 0, 0)),             
            ),

        );
    }
}
