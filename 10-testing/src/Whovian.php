<?php
class Whovian
{
    /**
     * @var string
     */
    protected $favoriteDoctor;

    /**
     * 생성자
     * @param  string $favoriteDoctor
     */
    public function __construct($favoriteDoctor)
    {
        $this->favoriteDoctor = (string)$favoriteDoctor;
    }

    /**
     * 발언하기
     * @return string
     */
    public function say()
    {
        return '최고의 닥터는 바로 ' . $this->favoriteDoctor;
    }

    /**
     * 응답하기
     * @param  string $input
     * @return string
     * @throws \Exception
     */
    public function respondTo($input)
    {
        $input = strtolower($input);
        $myDoctor = strtolower($this->favoriteDoctor);

        if (strpos($input, $myDoctor) === false) {
            throw new Exception(
                sprintf(
                    '무슨 소리! 최고의 닥터는 %s라구!',
                    $this->favoriteDoctor
                )
            );
        }

        return '옳소!';
    }
}
