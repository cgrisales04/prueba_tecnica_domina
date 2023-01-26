<?php
/**
 * Crear una función que toma como parámetro un string de hora y minutos “hh:mm”, y luego
 * devuelve el ángulo menor entre la mano de la hora y la mano del minuto. El formato de la
 * hora y minutos debe ser con dos dígitos, “01:45”, “10:30”, “02:25”, “00:00”, “12:30”,
 * “12:05”, “12:12”, “12:27”. Y se puede asumir que la mano de la hora siempre estará justo
 * en una hora sin importar cuantos minutos han pasado. También, si el parámetro de la
 * función no fue puesto correctamente o si la hora y minuto no es numérico, la función debe
 * tirar un error.
 * 
 * Las siguientes horas y minutos deben de regresar los siguientes valores de ángulos
 * menores:
 * “01:45” = 120 “10:30” = 120 “02:25” = 90 “00:00” = 0
 * “12:30” = 180 “12:05” = 30 “12:12” = 72 “12:27” = 162
 */
class Exercice03
{
    /**
     * Function that calculate time in grades
     * @param string $time
     * @return int|string
     */
    public function calculateGrades($time)
    {
        try {
            if (gettype($time) != "string") {
                throw new Exception("String data type expected", 1);
            }

            echo "Tests - $time - Result: ";

            $separate_hour_minutes = explode(':', $time);
            $hour = $separate_hour_minutes[0];
            $minutes = $separate_hour_minutes[1];

            $convert_minutes = 0;
            for ($i = 5; $i <= $minutes; $i += 5) {
                $convert_minutes++;
            }

            $desde = ($convert_minutes < $hour) ? $convert_minutes + 1 : $hour + 1;
            $hasta = ($convert_minutes > $hour) ? $convert_minutes : $hour;

            $acomulado = 0;
            for ($i = $desde; $i <= $hasta; $i++) {
                $acomulado = $acomulado + 30;
            }

            if ($acomulado > 180) {
                $acomulado = 360 - $acomulado;
            }

            if ($minutes % 5 != 0) {
                $acomulado += 12;
            }

            return $acomulado;
        } catch (Exception $e) {
            return "<p style='color:red;margin:0;padding:0'>Caught ExceptionTypes :: " . $e->getMessage() . "</p>";
        }
    }
}

$exercice_03 = new Exercice03();
echo $exercice_03->calculateGrades("01:45");
echo "<br>";
echo $exercice_03->calculateGrades("12:30");
echo "<br>";
echo $exercice_03->calculateGrades("10:30");
echo "<br>";
echo $exercice_03->calculateGrades("12:05");
echo "<br>";
echo $exercice_03->calculateGrades("02:25");
echo "<br>";
echo $exercice_03->calculateGrades("12:12");
echo "<br>";
echo $exercice_03->calculateGrades("00:00");
echo "<br>";
echo $exercice_03->calculateGrades("12:27");

?>