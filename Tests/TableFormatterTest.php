<?php
require_once 'TableFormatter.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * TableFormatter test case.
 */
class TableFormatterTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests TableFormatter->getPage()
     */
    public function testGetPage() {
        $data = new ArrayIterator();
        $data->append(array('Name', 'Age', 'City'));
        $data->append(array('Peter', 42, 'New York'));
        $data->append(array('Paul', 57, 'London'));

        $expected  = "Name |Age|City    |\n";
        $expected .= "-----+---+--------+\n";
        $expected .= "Peter|42 |New York|\n";
        $expected .= "Paul |57 |London  |\n";

        $formatter = new TableFormatter($data);

        $output = $formatter->formatAsTable();

        $this->assertEquals($expected, $formatter->formatAsTable());
    }

}

