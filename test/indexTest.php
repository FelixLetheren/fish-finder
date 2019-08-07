<?php
require 'index.php';

use PHPUnit\Framework\TestCase;

class Indextest extends TestCase
{
    public function testDisplayFish_correctlyMakesCard()
    {
        $exampleFish =
            [
                [
                    'name' => 'Borris',
                    'species' => 'shark',
                    'img-filepath' => 'images/borris.png',
                    'length' => 7,
                    'aggression' => 2,
                    'color' => 'Blue',
                    'pattern' => 'Spotty'],
                [
                    'name' => 'Borris',
                    'species' => 'shark',
                    'img-filepath' => 'images/borris.png',
                    'length' => 7,
                    'aggression' => 2,
                    'color' => 'Blue',
                    'pattern' => 'Spotty']
            ];

        $expectedResult =
            '<div class="fish-card"><h2 class="name">Borris</h2><h3 class="stat">shark</h3><img alt="fish picture" class="fish-picture" src="images/borris.png"><h3 class="stat"> Length-  7cm</h3><h3 class="stat"> Aggression- 2</h3><h3 class="stat"> Colour- Blue</h3><h3 class="stat"> Pattern- Spotty</h3></div><div class="fish-card"><h2 class="name">Borris</h2><h3 class="stat">shark</h3><img alt="fish picture" class="fish-picture" src="images/borris.png"><h3 class="stat"> Length-  7cm</h3><h3 class="stat"> Aggression- 2</h3><h3 class="stat"> Colour- Blue</h3><h3 class="stat"> Pattern- Spotty</h3></div>';

        $this->assertEquals(displayFish($exampleFish), $expectedResult);
    }

    public function testDisplayFish_errorsWithUnsetRequiredFields()
    {
        $exampleFish =
            [
                [
                    'species' => 'shark',
                    'img-filepath' => 'images/borris.png',
                    'length' => 7,
                    'aggression' => 2,
                    'color' => 'Blue',
                    'pattern' => 'Spotty'
                ],
                [
                    'species' => 'shark',
                    'img-filepath' => 'images/borris.png',
                    'length' => 7,
                    'aggression' => 2,
                    'color' => 'Blue',
                    'pattern' => 'Spotty'
                ]
            ];
        $expectedResult = 'Error! Please contact administrator';

        $this->assertEquals($expectedResult, displayFish($exampleFish));
    }

    public function testDisplayFish_throwsTypeErrorWithWrongInputType(){
        $examplefish = 23;

        $this->expectException(TypeError::class);

        displayFish($examplefish);
    }
}