<?php
return [
	'catapult' => [
        '_url' => 'http://raspberry:80/todo',
        'description' => 'A catapult to kill intruders.',
        'actions' => [
            'shot' => 'Shot the catapult',
        ],
        'parameters' => [
		'sec' => 'Delay until catapult shots'
	],
    ],
	'watering' => [
        '_url' => 'tcp://node_ip:5000',
        'description' => 'Watering for plant maintenance.',
        'actions' => [
            'on' => 'Turn on',
            'off' => 'Turn off',
	    'status' => 'Will return the humidity and temperature status'
        ],
        'parameters' => [],
    ],
	'timeserver' => [
        '_url' => 'http://192.168.2.17:5001',
        'description' => 'Gives the current time',
        'actions' => [
            'formatted' => 'Returns time as a formatted string. Example: 2017-04-01T10:46:18',
            'timestamp' => 'Returns time as a Unix timestamp',
        ],
        'parameters' => [
            'format' => 'A formatting string for strftime(), see http://strftime.org',
        ],
    ],
	'camera' => [
        '_url' => 'http://192.168.4.???:5001',
        'description' => 'Surveillance camera',
        'actions' => [
            'on' => 'Turn on',
            'off' => 'Turn off',
	    'status' => 'Whether it is on or off.',
	    'pic' => 'Return last n pictures (1 by default)',
        ],
        'parameters' => [
            'num' => 'For the pic cmd, the number of pictures to be returned (1 if not set)'
        ],
    ],
	'announcer' => [
        '_url' => 'http://192.168.2.17:5002',
        'description' => 'Announce things to people in the house',
        'actions' => [
            'say' => 'Say a text using text-to-speech synthesis',
        ],
        'parameters' => [
            'what' => 'What to say',
            'voice' => 'Change voice/langauge. Default: spanish',
            'volume' => 'Change volume of sound. Default: 100',
            'speed' => 'Set speed, in words/minute. Default: 175',
        ],
    ],
]
?>
