<?php

class TMS_SampleDbBuilder
{

    private $dbHost;

    private $dbPort;

    function __construct()
    {
        $this->dbHost = Pluf::f('tms.influx.host', 'influxdb');
        $this->dbPort = Pluf::f('tms.influx.port', 8086);
    }

    public function create($testRun)
    {
        $params = $this->getDbParameters($testRun);

        // create the client
        $client = new \InfluxDB\Client($params['SAMPLE_DB_HOST'], $params['SAMPLE_DB_PORT']);
        // check if a database exists then create it if it doesn't
        $database = $client->selectDB($params['SAMPLE_DB_NAME']);
        if (! $database->exists()) {
            // TODO: chech params of retention
            $database->create(new \InfluxDB\Database\RetentionPolicy('test_retention_policy', '30d', 1, false));
        }
    }

    public function getDbParameters($testRun)
    {
        $params = array(
            'SAMPLE_DB_NAME' => 'test_run_' . $testRun->id,
            'SAMPLE_DB_HOST' => $this->dbHost,
            'SAMPLE_DB_PORT' => $this->dbPort
        );
        return $params;
    }
}