<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PermutatorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new \HeadTailExtractor());
    }

    function it_generates_permutations_for_two_elements()
    {
        $this->generate('12')->shouldReturn(['12', '21']);
    }

    function it_generates_permutations_for_three_elements()
    {
        $this->generate('123')->shouldReturn(
            [
                '123',
                '132',
                '213',
                '231',
                '312',
                '321'
            ]);
    }

    function it_generates_permutations_for_four_elements()
    {
        $this->generate('1234')->shouldReturn(
            [
                '1234',
                '1243',
                '1324',
                '1342',
                '1423',
                '1432',
                '2134',
                '2143',
                '2314',
                '2341',
                '2413',
                '2431',
                '3124',
                '3142',
                '3214',
                '3241',
                '3412',
                '3421',
                '4123',
                '4132',
                '4213',
                '4231',
                '4312',
                '4321'
            ]);
    }

    function it_generates_premutations_for_five_elements()
    {
        $results = $this->generate('12345')->shouldHaveCount(120);
    }


}
