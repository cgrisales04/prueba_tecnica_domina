<?php
/**
 * En este ejercicio, estamos trabajando con un arreglo de 10 enteros, como sigue: [10, 20, 30,
 * 40, 50, 60, 70, 80, 90, 100]. 0 es el primer índice y 9 es el último índice de la matriz.
 * Escribe una función que reciba dos números enteros como parámetros. La función devuelve
 * la suma de los elementos de la matriz que se encuentran entre esos dos números enteros.
 * 
 * Por ejemplo, si usamos 30 y 60 como parámetros, la función debería devolver 180.
 * Algunos requisitos adicionales:
 *      [ ] Los dos enteros pasados a la función deben ser positivos; si no, la función debería
 *      devolver -1.
 *      [ ] Valide que el primer número entero sea menor que el segundo número entero. De lo
 *      contrario, la función debería devolver 0.
 *      [ ] Si el primer número entero está en la matriz y el segundo está por encima de 100, por
 *      ejemplo, 90 y 120, entonces la función debe devolver la suma de los números enteros
 *      que están dentro del arreglo y entre el rango dado. En este caso, eso sería 190.
 *      [ ] Si no se encuentran ambos enteros en la matriz, por ejemplo 110 y 120, la función
 *      debería devolver 0.
 */

class Exercice02
{
    private $list_number = [];
    // Constructor class
    public function __construct($list_number)
    {
        $this->list_number = $list_number;
    }
    /**
     * Summary of sumListRangeNumber
     * @param int $min
     * @param int $max
     * @return int
     */
    public function sumListRangeNumber($min, $max)
    {
        $sum_numbers = 0;
        for ($i = $min; $i <= $max; $i++) {
            $sum_numbers += $this->list_number[$i];
        }
        return $sum_numbers;
    }

    public function calculateSumIntervalNumber($min, $max)
    {
        if ($min < 0 && $max < 0) {
            return -1;
        }
        if ($min > $max) {
            return 0;
        }
        $index_min = array_search($min, $this->list_number);

        if ($index_min !== false && $max > 100) {
            return $this->sumListRangeNumber($index_min, count($this->list_number) - 1);
        }

        $index_max = array_search($max, $this->list_number);

        if ($index_min === false && $index_max === false) {
            return 0;
        }

        return $this->sumListRangeNumber($index_min, $index_max);
    }
}

$exercice_02 = new Exercice02([10, 20, 30, 40, 50, 60, 70, 80, 90, 100]);
echo "Test 1: " . $exercice_02->calculateSumIntervalNumber(30, 60);
echo "<br>";
echo "Test 2: " . $exercice_02->calculateSumIntervalNumber(-1, -2);
echo "<br>";
echo "Test 3: " . $exercice_02->calculateSumIntervalNumber(60, 30);
echo "<br>";
echo "Test 4: " . $exercice_02->calculateSumIntervalNumber(90, 120);
echo "<br>";
echo "Test 5: " . $exercice_02->calculateSumIntervalNumber(110, 120);

?>