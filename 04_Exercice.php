<?php
/**
 * Imagine una tabla infinita con filas y columnas numeradas con números naturales. La figura
 * muestra un procedimiento para recorrer dicha tabla asignando un número natural
 * consecutivo a cada tabla.
 * 
 * Un par de números naturales (i, j) está representado por el número correspondiente a la
 * celda en la fila i y columna j. Por ejemplo, el par (3, 2) está representado por el número
 * natural 17.
 * Crear una función que toma como parámetros (tamaño fila, tamaño columna, posición fila,
 * posición columna), debe retornar el número correspondiente de la posición de la fila y la
 * columna. Si la posición fila o columna es mayor al tamaño del arreglo debe arrojar un error.
 */

class Exercice04
{
    private $matriz_number;

    private $acomulado = 0;
    private $descuento = 1;
    private $size_row = 0;
    private $size_column = 0;

    /**
     * Function that generate values in list
     * @return void
     */
    private function generate_matrix()
    {
        $this->matriz_number = array_fill(1, $this->size_row, array_fill(1, $this->size_column, 1));
        $limit_iterator = $this->size_row + $this->size_column;
        for ($i = 1; $i <= $limit_iterator; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                if ($i >= 2 && $j >= 2) {
                    $this->matriz_number[$i - $this->descuento][$j] = $this->acomulado;
                    $this->descuento++;
                } else {
                    $this->matriz_number[$i][$j] = $this->acomulado;
                    $this->descuento = 1;
                }
                $this->acomulado += 1;
            }
        }
    }
    /**
     * Function that return exception or search of number in matrix
     * @param int $size_row 
     * @param int $size_column
     * @param int $position_row
     * @param int $position_column
     * @throws Exception
     * @return int|string
     */
    public function searchNumber($size_row, $size_column, $position_row, $position_column)
    {
        try {
            $this->size_row = $size_row;
            $this->size_column = $size_column;
            $this->generate_matrix();
            if ($position_row >= $size_row || $position_column >= $size_column) {
                throw new Exception("Range is not valid, possibility from desborde in Array", 1);
            }
            return $this->matriz_number[$position_row + 1][$position_column + 1];
        } catch (\Exception $e) {
            return "<p style='color:red;margin:0;padding:0'>Caught ExceptionTypes :: " . $e->getMessage() . "</p>";
        }
    }
    /**
     * Function that return output of list numbers
     * @return void
     */
    public function viewResult()
    {
        echo "<br> Matrix generate <br>";
        for ($i = 1; $i <= $this->size_row; $i++) {
            for ($j = 1; $j <= $this->size_column; $j++) {
                echo " [  " . $this->matriz_number[$i][$j] . "  ] ";
            }
            echo "<br>";
        }
    }

}

$exercice_04 = new Exercice04();
echo $exercice_04->searchNumber(8, 8, 3, 2);
$exercice_04->viewResult();
?>