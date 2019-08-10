<?php

require '../php-files/functions.php';

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
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
                    'pattern' => 'Spotty'
                ],
                [
                    'name' => 'Borris',
                    'species' => 'shark',
                    'img-filepath' => 'images/borris.png',
                    'length' => 7,
                    'aggression' => 2,
                    'color' => 'Blue',
                    'pattern' => 'Spotty'
                ]
            ];

        $expectedResult =
            '<div class="fish-card"><h2 class="name">Borris</h2><h3 class="stat">shark</h3><img alt="fish picture" class="fish-picture" src="images/borris.png"><h3 class="stat"> Length:  7cm</h3><h3 class="stat"> Aggression: 2/5</h3><h3 class="stat"> Colour: Blue</h3><h3 class="stat"> Pattern: Spotty</h3></div><div class="fish-card"><h2 class="name">Borris</h2><h3 class="stat">shark</h3><img alt="fish picture" class="fish-picture" src="images/borris.png"><h3 class="stat"> Length:  7cm</h3><h3 class="stat"> Aggression: 2/5</h3><h3 class="stat"> Colour: Blue</h3><h3 class="stat"> Pattern: Spotty</h3></div>';
        $this->assertEquals(displayFish($exampleFish), $expectedResult);
    }

    public function testDisplayFish_errorsWithUnsetName()
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

    public function testDisplayFish_throwsTypeErrorWithWrongInputType()
    {
        $exampleFish = 23;

        $this->expectException(TypeError::class);

        displayFish($exampleFish);
    }

    public function testInputConfirmation_returnsSuccessMessageOnTrue()
    {

        $expectedResult = '<h2 class="success">Success! Fish has been inserted into collection</h2>';

        $result = inputConfirmation(true);

        $this->assertEquals($expectedResult, $result);
    }
    public function testInputConfirmation_returnsFailureMessageOnFalse()
    {

        $expectedResult = '<h2 class="failure">Oops! You\'ve made and error. Please check you\'ve correctly filled all fields!</h2>';

        $result = inputConfirmation(false);

        $this->assertEquals($expectedResult, $result);
    }
    public function testInputConfirmation_throwsTypeErrorWithWrongInputType()
    {

        $exampleData = 23;

        $this->expectException(TypeError::class);

        displayFish($exampleData);
    }
}