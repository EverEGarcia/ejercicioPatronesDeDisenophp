<?php

// Interfaz para personajes
interface Character {
    public function attack();  // Método para atacar
    public function speed();   // Método para velocidad
}

// Clase concreta Warrior
class Warrior implements Character {
    public function attack() {
        return "El Guerrero ataca con puños!";
    }

    public function speed() {
        return "Velocidad del Guerrero: Media";
    }
}

// Decorador para agregar armas
class WeaponDecorator implements Character {
    protected $character;

    public function __construct(Character $character) {
        $this->character = $character;
    }

    public function attack() {
        return $this->character->attack();
    }

    public function speed() {
        return $this->character->speed();
    }
}

// Decorador para espada
class Sword extends WeaponDecorator {
    public function attack() {
        return $this->character->attack() . " ¡Ahora con espada!";
    }

    public function speed() {
        return $this->character->speed();  // No modificamos la velocidad, solo el ataque
    }
}

// Decorador para arco
class Bow extends WeaponDecorator {
    public function attack() {
        return $this->character->attack() . " ¡Ahora con arco!";
    }

    public function speed() {
        return $this->character->speed();  // No modificamos la velocidad, solo el ataque
    }
}

// Test del patrón Decorator
$warrior = new Warrior();
echo $warrior->attack() . "\n";
echo $warrior->speed() . "\n";

$warriorWithSword = new Sword($warrior);
echo $warriorWithSword->attack() . "\n";
echo $warriorWithSword->speed() . "\n";

$warriorWithBow = new Bow($warrior);
echo $warriorWithBow->attack() . "\n";
echo $warriorWithBow->speed() . "\n";

?>
