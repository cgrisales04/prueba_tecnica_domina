<?php
/**
 * 1. Dada un arreglo de números enteros, calcule una puntuación total según las siguientes
 * reglas:
 *      Agregue 1 punto por cada número par en el arreglo.
 *      Suma 3 puntos por cada número impar en el arreglo.
 *      Agregue 5 puntos por cada vez que encuentre un 8 en el arreglo.
 */
class Exercice01
{
    private $score = 0;
    private $list_number = [];
    // Constructor class
    public function __construct($list_number)
    {
        $this->list_number = $list_number;
    }

    public function setListNumber($list_number)
    {
        $this->list_number = $list_number;
    }

    /**
     * Summary of calculateScore
     * @param array $list_number
     * @return int
     */
    public function calculateScore()
    {
        $score = 0;
        foreach ($this->list_number as $number) {
            if ($number == 8) {
                $score += 5;
                continue;
            }
            ($number % 2 == 0) ? $score++ : $score += 3;
        }
        return $score;
    }
}
$exercice_01 = new Exercice01([1, 2, 3, 4, 5]);
echo "Totally Score in test one is: " . $exercice_01->calculateScore();
echo "<br>";


$exercice_01->setListNumber([15, 25, 35]);
echo "Totally Score in test second is: " . $exercice_01->calculateScore();
echo "<br>";

$exercice_01->setListNumber([8, 8]);
echo "Totally Score in test three is: " . $exercice_01->calculateScore();

?>