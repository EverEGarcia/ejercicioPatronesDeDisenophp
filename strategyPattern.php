<?php

// Interfaz común para las estrategias de salida
interface OutputStrategy {
    public function showMessage($message);
}

// Estrategia para mostrar el mensaje en la consola
class ConsoleOutput implements OutputStrategy {
    public function showMessage($message) {
        echo "Mensaje en consola: " . $message . "\n";
    }
}

// Estrategia para mostrar el mensaje en formato JSON
class JsonOutput implements OutputStrategy {
    public function showMessage($message) {
        echo json_encode(["message" => $message]) . "\n";
    }
}

// Estrategia para mostrar el mensaje en un archivo TXT
class TxtOutput implements OutputStrategy {
    public function showMessage($message) {
        file_put_contents('message.txt', "Mensaje en archivo TXT: " . $message . "\n");
        echo "Mensaje guardado en archivo TXT.\n";
    }
}

// Clase Contexto que usa la estrategia
class MessageContext {
    private $outputStrategy;

    // Establecer la estrategia
    public function __construct(OutputStrategy $outputStrategy) {
        $this->outputStrategy = $outputStrategy;
    }

    // Método para mostrar el mensaje usando la estrategia seleccionada
    public function executeStrategy($message) {
        $this->outputStrategy->showMessage($message);
    }
}

// Test del Patrón Strategy
$message = "¡Hola Mundo!";

// Mostrar mensaje en consola
$consoleOutput = new ConsoleOutput();
$messageContext = new MessageContext($consoleOutput);
$messageContext->executeStrategy($message);

// Mostrar mensaje en formato JSON
$jsonOutput = new JsonOutput();
$messageContext = new MessageContext($jsonOutput);
$messageContext->executeStrategy($message);

// Mostrar mensaje en archivo TXT
$txtOutput = new TxtOutput();
$messageContext = new MessageContext($txtOutput);
$messageContext->executeStrategy($message);

?>
