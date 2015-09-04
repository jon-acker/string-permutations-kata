<?php

class Permutator
{
    /**
     * @var HeadTailExtractor
     */
    private $extractor;

    /**
     * @param HeadTailExtractor $extractor
     */
    public function __construct(HeadTailExtractor $extractor)
    {
        $this->extractor = $extractor;
    }

    public function generate($string)
    {
        $permutations = [];

        for ($index=0; $index < strlen($string); $index++) {

            list($head, $tail) = $this->extractor->extract($string, $index);

            switch (strlen($tail)) {
                case 1:
                    array_push($permutations, $this->concat($head, $tail));
                    break;

                case 2:
                    $permutations = array_merge($permutations, $this->concatAndSwap($head, $tail));
                    break;

                default:
                    $permutations = array_merge($permutations, $this->regenerate($head, $tail));
                    break;
            }
        }

        return $permutations;
    }


    /**
     * @param string $pair
     *
     * @return string
     */
    private function swap($pair)
    {
        return $pair[1].$pair[0];
    }

    /**
     * @param string $head
     * @param string $tail
     *
     * @return string
     */
    private function concat($head, $tail)
    {
        return $head . $tail;
    }

    /**
     * @param string $head
     * @param string $tail
     *
     * @return array
     */
    private function concatAndSwap($head, $tail)
    {
        return [$head . $tail, $head . $this->swap($tail)];
    }

    /**
     * @param string $head
     * @param string $tail
     *
     * @return array
     */
    private function regenerate($head, $tail)
    {
        return array_map(function($sub) use ($head) {
            return $head . $sub;
        }, $this->generate($tail));
    }
}
