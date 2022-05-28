<?php namespace App\Classes;

/*
 * How to use:
 * $caesar = new CaesarCipher();
 *
 * for encode input text:
 * $encodeText = $caesar->encode($text);
 *
 * for decode text
 * $caesar->decode($encodeText)
 *
 * this class create by:
 * Iman Borumand Zadeh
 * https://github.com/imanborumand
 *
 */



class CaesarCipher
{

    /**
     * The amount of change and the step you want the coding operation to be performed
     * @var int
     */
    public int $shift = 4;


    /**
     * Response text
     * @var string
     */
    private string $response = '';


    /**
     * List of persian alphabet
     * @var array
     */
    private array $alphabetList = [];



    public function __construct()
    {
        $this->alphabetList = $this->getAlphabetList();
    }


    /**
     * Encode your text to caesar cipher
     * @param string $text
     * @return string
     */
    public function encode( string $text) : string
    {
        $this->setResponseToEmpty();
        $text = mb_str_split($text);

        foreach ($text as $item) {
            if (!in_array($item, $this->alphabetList)) {
                  $this->setResponseIfNotExists($item);
            } else {

                $findItem = array_search($item, $this->alphabetList, true);

                if (!isset($this->alphabetList[$findItem + $this->shift])) {
                    $location = $findItem + $this->shift;
                    $this->response .= $this->alphabetList[$location - count($this->alphabetList)];

                } else {
                    $this->response .= $this->alphabetList[$findItem + $this->shift];
                }
            }
        }

        return $this->response;
    }


    /**
     * Decode your text to pertain for  caesar cipher
     * Note that the number of steps must be equal in code and de-code mode
     * @param string $text
     * @return string
     */
    public function decode( string $text) : string
    {
        $this->setResponseToEmpty();
        $text = mb_str_split($text);

        foreach ($text as $item) {
            if (!in_array($item, $this->alphabetList)) {
                $this->setResponseIfNotExists($item);

            } else {

                $findItem = array_search($item, $this->alphabetList, true);
                if (!isset($this->alphabetList[$findItem - $this->shift])) {
                    $location = $findItem - $this->shift;
                    $this->response .= $this->alphabetList[count($this->alphabetList) - abs($location) ];

                } else {
                    $this->response .= $this->alphabetList[$findItem - $this->shift];
                }
            }
        }

        return $this->response;
    }



    /**
     * persian alphabet list
     * @return string[]
     */
    private function getAlphabetList() : array
    {
        $list =  [
            'ا',
            'ب',
            'پ',
            'ت',
            'ث',
            'ج',
            'چ',
            'ح',
            'خ',
            'د',
            'ذ',
            'ر',
            'ز',
            'ژ',
            'س',
            'ش',
            'ص',
            'ض',
            'ط',
            'ظ',
            'ع',
            'غ',
            'ف',
            'ق',
            'ک',
            'گ',
            'ل',
            'م',
            'ن',
            'و',
            'ه',
            'ی',
            'ء',
            'آ',
        ];

        array_unshift($list,""); //for start index for 1
        unset($list[0]);
        return  $list;
    }


    /**
     * @param string $item
     * @return void
     */
    private function setResponseIfNotExists( string $item) : void
    {
        $this->response .= $item;
    }


    /**
     * set response property to '' for when use encode and decode for one instance of class
     * @return void
     */
    private function setResponseToEmpty() : void
    {
        $this->response = '';
    }

}
