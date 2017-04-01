<?php
return [
	'catapult' => [
        '_url' => 'http://192.168.2.100',
        'description' => 'A catapult to kill intruders.',
        'actions' => [
            'shot' => [
                'description' => 'Shot the catapult',
                'parameters' => [
                    'sec' => 'Delay until catapult shots'
                ]
            ]
        ]
    ],

'bombeta' => [
        '_url' => 'http://192.168.2.101',
        'description' => 'Llum de la casa',
        'actions' => [
            'on' => [
                'description' => 'Say a text using text-to-speech synthesis',
                'parameters' => [
                    'p1' => 'on / off'
                ]
            ]
        ]
    ],
	
	'watering' => [
        '_url' => 'http://192.168.2.102',
        'description' => 'Watering for plant maintenance.',
        'actions' => [
            'on' => [
                'description' => 'Turn on'
            ],
            'off' => [
                'description' => 'Turn off'
            ],
            'status' => [
                'description' => 'Will return the humidity and temperature status'
            ]
        ]
    ],
	'timeserver' => [
        '_url' => 'http://192.168.2.103',
        'description' => 'Gives the current time',
        'actions' => [
            'formatted' => [
                'description' => 'Returns time as a formatted string. Example: 2017-04-01T10:46:18',
                'parameters' => [
                    'format' => 'A formatting string for strftime(), see http://strftime.org',
                ]
            ],
            'timestamp' => [
                'description' => 'Returns time as a Unix timestamp'
            ]
        ]
    ],
	'camera' => [
        '_url' => 'http://192.168.2.104',
        'description' => 'Surveillance camera',
        'actions' => [
            'on' => [
                'description' => 'Turn on'
            ],
            'off' => [
                'description' => 'Turn off'
            ],
            'status' => [
                'description' => 'Whether it is on or off.'
            ],
            'pic' => [
                'description' => 'Return last n pictures (1 by default)',
                'parameters' => [
                    'num' => 'For the pic cmd, the number of pictures to be returned (1 if not set)'
                ]
            ]
        ]
    ],

       'test' => [
        '_url' => 'http://192.168.2.105',
        'description' => 'Arduino socket library test',
        'actions' => [
            'on' => [
                'description' => 'Turn on'
            ],
            'off' => [
                'description' => 'Turn off'
            ],
            'status' => [
                'description' => 'Whether it is on or off.'
            ],
            'pic' => [
                'description' => 'Return last n pictures (1 by default)',
                'parameters' => [
                    'num' => 'For the pic cmd, the number of pictures to be returned (1 if not set)'
                ]
            ]
        ]
    ],

	'announcer' => [
        '_url' => 'http://192.168.2.106',
        'description' => 'Announce things to people in the house',
        'actions' => [
            'say' => [
                'description' => 'Say a text using text-to-speech synthesis',
                'parameters' => [
                    'what' => 'What to say',
                    'voice' => 'Change voice/langauge. Default: spanish',
                    'volume' => 'Change volume of sound. Default: 100',
                    'speed' => 'Set speed, in words/minute. Default: 175'
                ]
            ]
        ]
    ],

'facial' => [
        '_url' => 'http://192.168.2.107',
        'description' => 'Facial recognition',
        'actions' => [
            'on' => [
                'description' => 'Start the facial recognition process.'
            ]
        ]
    ]
]
?>
