<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 1</title>
</head>
<body>
    <?php

    class NoweAuto {
        protected string $model;
        protected float $cenaEuro;
        protected float $kurs;

        public function __construct(string $model, float $cenaEuro, float $kurs) {
            $this->model = $model;
            $this->cenaEuro = $cenaEuro;
            $this->kurs = $kurs;
        }

        public function ObliczCene(): float {
            return $this->cenaEuro * $this->kurs;
        }
    }

    class AutoZDodatkami extends NoweAuto {
        protected float $alarm;
        protected float $radio;
        protected float $klima;

        public function __construct(string $model, float $cenaEuro, float $kurs, float $alarm, float $radio, float $klima) {
            parent::__construct($model, $cenaEuro, $kurs);
            $this->alarm = $alarm;
            $this->radio = $radio;
            $this->klima = $klima;
        }

        public function ObliczCene(): float {
            return parent::ObliczCene() + $this->alarm + $this->radio + $this->klima;
        }
    }

    class Ubezpieczenie extends AutoZDodatkami {
        private float $procent;
        private int $lata;

        public function __construct(string $model, float $cenaEuro, float $kurs, float $alarm, float $radio, float $klima, float $procent, int $lata) {
            parent::__construct($model, $cenaEuro, $kurs, $alarm, $radio, $klima);
            $this->procent = $procent;
            $this->lata = $lata;
        }

        public function ObliczCene(): float {
            $wartosc = parent::ObliczCene();
            $znizka = (100 - $this->lata) / 100;
            return $this->procent * $wartosc * $znizka;
        }
    }

    /////////////////////////////////
    $nowe = new NoweAuto("Toyota Celica 5", 20000, 4.24,);
    $zdod = new AutoZDodatkami("Toyota Celica 5", 20000, 4.24, 1000, 500, 1500);
    $ubezpieczenie = new Ubezpieczenie("Toyota Celica 5", 20000, 4.24, 1000, 500, 1500, 0.1, 3);
    echo "Nowe: " . $nowe->ObliczCene() . " PLN<br>";
    echo "z dodatkami: " . $zdod->ObliczCene() . " PLN<br>";
    echo "Koszt ubezpieczenia: " . $ubezpieczenie->ObliczCene() . " PLN";
    ?>

</body>
</html>