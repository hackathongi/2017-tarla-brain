<?php
return [
	'pump_http' => [
        '_url' => 'http://raspberry:80/bombeta',
        'description' => 'A pump for water',
        'actions' => [
            'on' => 'Turn the pump on',
            'off' => 'Turn the pump off',
        ],
        'parameters' => [],
    ],
	'pump_socket' => [
        '_url' => 'tcp://localhost:5000',
        'description' => 'A pump for water (using TCP socket)',
        'actions' => [
            'on' => 'Turn the pump on',
            'off' => 'Turn the pump off',
        ],
        'parameters' => [],
    ],
	'timeserver' => [
        '_url' => 'http://192.168.4.112:5001',
        'description' => 'Gives the current time',
        'actions' => [
            'formatted' => 'Returns time as a formatted string. Example: 2017-04-01T10:46:18',
            'timestamp' => 'Returns time as a Unix timestamp',
        ],
        'parameters' => [
            'format' => 'A formatting string for strftime(), see http://strftime.org',
        ],
    ],
]
?>
