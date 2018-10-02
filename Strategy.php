<?php
/**
 * You can encapsulate family of Algorithm and make client class responsible for instantiating a particular algorithm.
 * Code snippet outlines family of algorithm, you may want a serialized array, someJSON or may be just return array of data
 */

interface OutputInterface {
    public function load();
}


class SerializeArrayOutput implements OutputInterface {
    public function load() {
        return serialize(['a', 'b', 'c']);
    }
}

class JSONStringOutput implements OutputInterface {
    public function load() {
        return json_encode(['a', 'b', 'c']);
    }
}

class ArrayOutput implements OutputInterface {
    public function load() {
        return ['a', 'b', 'c'];
    }
}

class SomeClient {
    private $output;

    public function setOutput(OutputInterface $outputType) {
        $this->output = $outputType;
    }

    public function loadOutput() {
        return $this->output->load();
    }
}

$client = new SomeClient();

//want an array?
$client->setOutput(new ArrayOutput());
var_dump($client->loadOutput());

//want serialized array?
$client->setOutput(new SerializeArrayOutput());
var_dump($client->loadOutput());

//want JSON output?
$client->setOutput(new JSONStringOutput());
var_dump($client->loadOutput());
?>