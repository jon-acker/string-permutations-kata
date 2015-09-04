<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HeadTailExtractorSpec extends ObjectBehavior
{
    function it_extracts_head_and_tail_given_index_of_head()
    {
        $this->extract('1234', 0)->shouldReturn(['1', '234']);
    }

    function it_extracts_head_and_tail_given_second_index_of_head()
    {
        $this->extract('1234', 1)->shouldReturn(['2', '134']);
    }

    function it_extracts_head_and_tail_given_third_index_of_head()
    {
        $this->extract('1234', 2)->shouldReturn(['3', '124']);
    }
}
