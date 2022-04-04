<?php

class Utils {
    public static function gen_id($int) {
        $bytes = random_bytes($int);
        return bin2hex($bytes);
        // return $bytes;
    }

    public static function callback($cb) {
        die('<script>window.location.href="' . $cb . '";</script>');
    }

    public static function getDummie() {
        $marks = ["Abarth", "Alfa Romeo", "Aston Martin", "Audi", "Bentley", "BMW", "Cadillac", "Caterham", "Chevrolet", "Citroen", "Dacia",
        "Ferrari", "Fiat", "Ford", "Honda", "Infiniti", "Isuzu", "Iveco", "Jaguar", "Jeep", "Kia", "KTM", "Lada", "Lamborghini", "Lancia",
        "Land Rover", "Lexus", "Lotus", "Maserati", "Mazda", "Mercedes-Benz", "Mini", "Mitsubishi", "Morgan", "Nissan", "Opel", "Peugeot",
        "Piaggio", "Porsche", "Renault", "Rolls-Royce", "Seat", "Skoda", "Smart", "Subaru", "Suzuki", "Tata", "Tesla", "Toyota", "Volkswagen",
        "Volvo"];
        $models = ["500C", "500", "124 Spider", "Giulietta", "MiTo", "4C", "Giulia", "Stelvio", "DB9", "Vantage V8", "Vanquish", "Vantage V12",
        "Rapide", "A4", "A8", "A3", "TT", "A5", "A4", "Allroad Quattro", "A6", "A7", "Q3", "Q5", "S5", "A1", "A6", "S7", "S6", "S8", "RS4",
        "RS5", "R8", "SQ5", "Q7", "RS6", "RS7", "RS Q3", "S3", "S1", "TTS", "S4", "RS3", "SQ7", "Q2", "TTS", "SQ7", "S4", "S6", "S7", "Serie 3",
        "Serie 5", "Serie 4", "Serie 7", "Z4", "X5", "Serie 1", "X3", "Serie 6", "X1", "X6", "I3", "Serie 2", "X4", "I8", "Serie 2 Gran Tourer",
        "Serie 2 Active Tourer", "X2", "488", "GTC4", "California", "F12", "Portofino", "812"];
        $cvs = [118, 421, 338, 75, 90, 100, 115, 130, 180, 200, 203, 240, 244, 265, 290, 333, 380, 370, 527];
        $fecha = new DateTime();
        $manufacturingdate = date("d/m/Y", mt_rand(86400, $fecha->getTimestamp() - 86400));
        $kms = [1000, 10000, 20000, 30000, 40000, 50000, 60000, 70000, 80000, 90000, 100000, 5000, 15000, 25000, 35000, 45000, 55000, 65000,
        75000, 85000, 95000, 110000, 120000, 130000, 140000, 150000, 160000, 170000, 180000, 190000, 200000, 210000, 220000, 230000, 240000,
        250000, 260000, 270000, 280000, 290000, 300000, 400000, 500000];
        $fuels = ["gasolina", "diesel", "electrico"];
        $numcylinders = mt_rand(1,12);
        $doors = mt_rand(1,8);
        $price = rand(1, 100000000) / 100;
        $drives = ["fwd", "rwd", "awd", "4wd", "4x4"];
        $color_ext = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        $color_int = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        $framenumber = Utils::gen_id(17);
        $dummie['mark'] = $marks[array_rand($marks)];
        $dummie['model'] = $models[array_rand($models)];
        $dummie['cv'] = $cvs[array_rand($cvs)];
        $dummie['manufacturingdate'] = $manufacturingdate;
        $dummie['km'] = $kms[array_rand($kms)];
        $dummie['fuel'] = $fuels[array_rand($fuels)];
        $dummie['overview'] = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores quibusdam, hic commodi quod cum ducimus sunt "
        ."autem dicta nihil atque. Fuga incidunt architecto assumenda officiis dolorem odio magni, nisi ratione.";
        $dummie['numcylinders'] = $numcylinders;
        $dummie['doors'] = $doors;
        $dummie['price'] = $price;
        $dummie['drive'] = $drives[array_rand($drives)];
        $dummie['color_ext'] = $color_ext;
        $dummie['color_int'] = $color_int;
        $dummie['framenumber'] = $framenumber;
        return $dummie;
    }

    public static function dum() {
        $models = [];
        $framenumber = Utils::gen_id(17);
        $dummie['framenumber'] = $framenumber;
        $marks = ["Audi", "BMW", "Mazda", "Mercedes-Benz"];
        $dummie['mark'] = $marks[array_rand($marks)];

        $color_ext = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        $color_int = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        $dummie['color_ext'] = $color_ext;
        $dummie['color_int'] = $color_int;
        $dummie['overview'] = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores quibusdam, hic commodi quod cum ducimus sunt "
        ."autem dicta nihil atque. Fuga incidunt architecto assumenda officiis dolorem odio magni, nisi ratione.";

        switch ($dummie['mark']) {
            case 'Audi':
                $models = ["RS 5", "A7", "S8", "RS Q8", "R8 Coupé"];
                $dummie['model'] = $models[array_rand($models)];
                switch ($dummie['model']) {
                    case 'RS 5':
                        $dummie['price'] = 110000;
                        $dummie['numcylinders'] = 6;
                        $dummie['doors'] = 3;
                        $dummie['drive'] = "AWD";
                        $dummie['cv'] = 450;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Diesel";
                        break;
                    case 'A7':
                        $dummie['price'] = 74000;
                        $dummie['numcylinders'] = 4;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "RWD";
                        $dummie['cv'] = 286;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Diesel";
                        break;
                    case 'S8':
                        $dummie['price'] = 173000;
                        $dummie['numcylinders'] = 8;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "AWD";
                        $dummie['cv'] = 571;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    case 'RS Q8':
                        $dummie['price'] = 164000;
                        $dummie['numcylinders'] = 8;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "AWD";
                        $dummie['cv'] = 600;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Diesel";
                        break;
                    case 'R8 Coupé':
                        $dummie['price'] = 180000;
                        $dummie['numcylinders'] = 10;
                        $dummie['doors'] = 3;
                        $dummie['drive'] = "RWD";
                        $dummie['cv'] = 570;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    default:
                        $dummie['price'] = 180000;
                        $dummie['numcylinders'] = 10;
                        $dummie['doors'] = 3;
                        $dummie['drive'] = "RWD";
                        $dummie['cv'] = 570;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                }
                break;
            case 'BMW':
                $models = ["M135", "M3", "M8", "X6 M", "R8 Coupé"];
                $dummie['model'] = $models[array_rand($models)];
                switch ($dummie['model']) {
                    case 'M135':
                        $dummie['price'] = 56000;
                        $dummie['numcylinders'] = 4;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "RWD";
                        $dummie['cv'] = 306;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    case 'M3':
                        $dummie['price'] = 115000;
                        $dummie['numcylinders'] = 6;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "RWD";
                        $dummie['cv'] = 510;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    case 'M8':
                        $dummie['price'] = 200000;
                        $dummie['numcylinders'] = 8;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "AWD";
                        $dummie['cv'] = 600;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    case 'X6 M':
                        $dummie['price'] = 156000;
                        $dummie['numcylinders'] = 8;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "AWD";
                        $dummie['cv'] = 625;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    case 'M4':
                        $dummie['price'] = 117000;
                        $dummie['numcylinders'] = 10;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "RWD";
                        $dummie['cv'] = 510;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    default:
                        $dummie['price'] = 117000;
                        $dummie['numcylinders'] = 10;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "RWD";
                        $dummie['cv'] = 510;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                }
                break;
            case 'Mazda':
                $models = ["3", "6 Sedán", "CX-5", "MX-5 RF"];
                $dummie['model'] = $models[array_rand($models)];
                switch ($dummie['model']) {
                    case '3':
                        $dummie['price'] = 35000;
                        $dummie['numcylinders'] = 4;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "4WD";
                        $dummie['cv'] = 137;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    case '6 Sedán':
                        $dummie['price'] = 45000;
                        $dummie['numcylinders'] = 6;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "2WD";
                        $dummie['cv'] = 194;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    case 'CX-5':
                        $dummie['price'] = 42000;
                        $dummie['numcylinders'] = 8;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "AWD";
                        $dummie['cv'] = 143;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    case 'MX-5 RF':
                        $dummie['price'] = 40000;
                        $dummie['numcylinders'] = 8;
                        $dummie['doors'] = 2;
                        $dummie['drive'] = "RWD";
                        $dummie['cv'] = 184;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    default:
                        $dummie['price'] = 40000;
                        $dummie['numcylinders'] = 8;
                        $dummie['doors'] = 2;
                        $dummie['drive'] = "RWD";
                        $dummie['cv'] = 184;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                }
                break;
            case 'Mercedes-Benz':
                $models = ["GLE", "GT Coupé", "CLS", "CLASE A"];
                $dummie['model'] = $models[array_rand($models)];
                switch ($dummie['model']) {
                    case 'GLE':
                        $dummie['price'] = 125000;
                        $dummie['numcylinders'] = 6;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "AWD";
                        $dummie['cv'] = 435;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    case 'GT Coupé':
                        $dummie['price'] = 220000;
                        $dummie['numcylinders'] = 8;
                        $dummie['doors'] = 2;
                        $dummie['drive'] = "RWD";
                        $dummie['cv'] = 557;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    case 'CLS':
                        $dummie['price'] = 110000;
                        $dummie['numcylinders'] = 6;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "AWD";
                        $dummie['cv'] = 435;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    case 'CLASE A':
                        $dummie['price'] = 80000;
                        $dummie['numcylinders'] = 4;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "AWD";
                        $dummie['cv'] = 421;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                    default:
                        $dummie['price'] = 80000;
                        $dummie['numcylinders'] = 4;
                        $dummie['doors'] = 5;
                        $dummie['drive'] = "AWD";
                        $dummie['cv'] = 421;
                        $dummie['manufacturingdate'] = "01/01/2022";
                        $dummie['km'] = 0;
                        $dummie['fuel'] = "Gasolina";
                        break;
                }
                break;
            default:
                # code...
                break;
        }
        return $dummie;
    }
}