<?php

// views/estadisticasMes.php

class estadisticasMes extends view
{

    public $totalMes;
    public $promedioDia;
    public $diaMax;
    public $diaMin;
    public $nombreMes;
    public $lista;

    public function NombreDia($fecha)
    {

        $fechats = strtotime($fecha);

        switch (date('w', $fechats)) {
            case 0:
                return "Domingo";
                break;
            case 1:
                return "Lunes";
                break;
            case 2:
                return "Martes";
                break;
            case 3:
                return "Miércoles";
                break;
            case 4:
                return "Jueves";
                break;
            case 5:
                return "Viernes";
                break;
            case 6:
                return "Sábado";
                break;
        }
    }
    
}
