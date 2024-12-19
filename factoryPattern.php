<?php

// Interfaz para los personajes
interface Character {
    public function attack();  // Método para el ataque
    public function speed();   // Método para la velocidad
}

// Clase Esqueleto
class Skeleton implements Character {
    public function attack() {
        return "Esqueleto ataca con espada!";
    }

    public function speed() {
        return "Velocidad del Esqueleto: Lenta";
    }
}

// Clase Zombi
class Zombie implements Character {
    public function attack() {
        return "Zombi ataca con mordisco!";
    }

    public function speed() {
        return "Velocidad del Zombi: Media";
    }
}

// Clase Factory
class CharacterFactory {
    public static function createCharacter($level) {
        if ($level == 'easy') {
            return new Skeleton(); // Si el nivel es fácil, crea un Esqueleto
        } elseif ($level == 'hard') {
            return new Zombie(); // Si el nivel es difícil, crea un Zombi
        }
    }
}

// Test de la Factory
$level = 'hard'; // Cambia entre 'easy' y 'hard' para probar
$character = CharacterFactory::createCharacter($level);

echo $character->attack() . "\n";
echo $character->speed() . "\n";

?>
