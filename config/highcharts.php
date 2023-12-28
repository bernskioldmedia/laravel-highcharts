<?php

return [

    /**
     * Default options to be used for all charts.
     */
    'defaults' => [],

    /**
     * Default options to be used for all charts of a specific type.
     */
    'defaultsForType' => [
//        'line' => [
//            'title' => [
//                'text' => 'My Line Chart'
//            ]
//        ]
    ],

    /**
     * Defaults for chart labels.
     */
    'chartLabels' => [

        /**
         * CSS styles to be applied to the label.
         */
        'styles' => [
//            'fontWeight' => 'bold',
//            'fontSize' => '13px',
        ],

        /**
         * Additional Highchart drawing object attributes.
         */
        'attributes' => [
            'align' => 'center',
        ],
    ],

    /**
     * Defaults for chart lines.
     */
    'chartLines' => [

        /**
         * Highchart drawing object attributes.
         */
        'attributes' => [],
    ],

    /**
     * Defaults for chart quadrants.
     */
    'chartQuadrants' => [

        /**
         * Highchart drawing object attributes.
         */
        'attributes' => [],
    ],
];
