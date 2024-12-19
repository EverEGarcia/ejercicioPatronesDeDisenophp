<?php

// Interfaz común para la apertura de archivos
interface FileOpener {
    public function openFile($file);
}

// Clase Windows7 (no puede abrir los archivos de versiones más nuevas)
class Windows7 implements FileOpener {
    public function openFile($file) {
        return "Windows 7 no puede abrir el archivo: " . $file;
    }
}

// Clase Windows10 (puede abrir los archivos)
class Windows10 implements FileOpener {
    public function openFile($file) {
        return "Windows 10 abre el archivo: " . $file;
    }
}

// Clase Adapter para hacer que Windows 7 pueda abrir los archivos como Windows 10
class Windows7Adapter implements FileOpener {
    private $windows7;

    public function __construct(Windows7 $windows7) {
        $this->windows7 = $windows7;
    }

    public function openFile($file) {
        // Windows 7 es adaptado para simular que puede abrir el archivo
        return "Adaptando... " . $this->windows7->openFile($file);
    }
}

// Test del patrón Adapter
$windows7 = new Windows7();
$windows10 = new Windows10();
$adapter = new Windows7Adapter($windows7);

echo $windows10->openFile("documento.docx") . "\n";   // Windows 10 abriendo el archivo
echo $adapter->openFile("documento.docx") . "\n";     // Windows 7 adaptado

?>
