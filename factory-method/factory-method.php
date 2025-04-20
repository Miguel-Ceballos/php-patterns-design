<?php

/**
 * ! Factory Method:
 * El patrón Factory Method permite crear objetos sin especificar
 * la clase exacta del objeto que se creará.
 *
 * En lugar de eso, delegamos la creación de objetos a subclases o métodos
 * que encapsulan esta lógica.
 *
 * * Es útil cuando una clase no puede anticipar la clase
 * * de objetos que debe crear.
 *
 * https://refactoring.guru/es/design-patterns/factory-method
 */

interface Report
{
    function generate(): void;
}

class SalesReport implements Report {
    function generate() : void
    {
        echo 'Generating Sales Report...';
    }
}

class ProductsReport implements Report
{
    function generate() : void
    {
        echo 'Generating Products Report...';
    }
}

abstract class ReportFactory {
    protected abstract function createReport(): Report;

    function generateReport() : void
    {
        $report = $this->createReport();
        $report->generate();
    }
}

class SalesReportFactory extends ReportFactory
{

    #[\Override] protected function createReport() : Report
    {
        return new SalesReport();
    }
}

class ProductsReportFactory extends ReportFactory
{
    protected function createReport() : Report
    {
        return new ProductsReport();
    }
}

function reportFactory(ReportFactory $factory) : void
{
    echo $factory->generateReport();
}

reportFactory(new ProductsReportFactory());