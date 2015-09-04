<?php

class HeadTailExtractor
{

    public function extract($string, $index)
    {
        $parts = str_split($string);
        $head = $parts[$index];
        unset($parts[$index]);

        return [$head, implode('', $parts)];
    }
}
