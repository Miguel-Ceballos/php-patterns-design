<?php

// Genera clase padre
class Computer
{
    public string $cpu;
    public string $ram;
    public string $ssd;
    public string $gpu;

    public function displayConfiguration() : void
    {
        echo "CPU: $this->cpu\nRAM: $this->ram\nSSD: $this->ssd\nGPU: $this->gpu\n";
    }
}

// Genera clase que consume clase padre
class ComputerBuilder
{
    // Generamos variable de tipo de la clase padre para acceder a sus propiedades
    private Computer $computer;

    public function __construct()
    {
        $this->computer = new Computer();
    }
    
    public function setCpu(string $cpu) : static
    {
        $this->computer->cpu = $cpu;
        return $this;
    }

    public function setRam(string $ram) : static
    {
        $this->computer->ram = $ram;
        return $this;
    }

    public function setSsd(string $ssd) : static
    {
        $this->computer->ssd = $ssd;
        return $this;
    }

    public function setGpu(string $gpu) : static
    {
        $this->computer->gpu = $gpu;
        return $this;
    }

    public function build() : Computer
    {
        return $this->computer;
    }
}

$gamingComputer = new ComputerBuilder();

$gamingComputer
    ->setCpu("Intel Core i7")
    ->setRam("16GB")
    ->setSsd("256GB")
    ->setGpu("NVIDIA GeForce RTX 3080")
    ->build()
    ->displayConfiguration();

$basicComputer = new ComputerBuilder();

$basicComputer
    ->setCpu("Intel Core i5")
    ->setRam("8GB")
    ->setSsd("128GB")
    ->setGpu("NVIDIA GeForce GTX 1660")
    ->build()
    ->displayConfiguration();