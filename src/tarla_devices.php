<?php
return [
	'bombeta_http' => [
        '_url' => 'http://raspberry:80/bombeta',
        'description' => 'A pump for water',
        'actions' => [
            'on' => 'Turn the pump on',
            'off' => 'Turn the pump off',
        ],
        'parameters' => [],
    ],
	'bombeta_socket' => [
        '_url' => 'tcp://localhost:5000',
        'description' => 'A pump for water',
        'actions' => [
            'on' => 'Turn the pump on',
            'off' => 'Turn the pump off',
        ],
        'parameters' => [],
    ]
]
?>
