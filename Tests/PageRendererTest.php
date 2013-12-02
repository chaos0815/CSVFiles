<?php
require_once 'PageRenderer.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * PageRenderer test case.
 */
class PageRendererTest extends PHPUnit_Framework_TestCase {
    
    /**
     * Tests DataParser->getPage()
     */
    public function testGetPage() {
        $data = new ArrayIterator();
        $data->append(array('Name', 'Age', 'City'));
        $data->append(array('Peter', 42, 'New York'));
        $data->append(array('Paul',57, 'London'));
        
        $expected  = "Name |Age|City    |\n";
        $expected .= "-----+---+--------+\n";
        $expected .= "Peter|42 |New York|\n";
        $expected .= "Paul |57 |London  |\n";
        
        $renderer = new PageRenderer($data);
        
        $output = $renderer->render();
        
        $this->assertEquals($expected, $renderer->render());
    }
    
}

