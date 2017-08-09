$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2016 Q1',
            Program1: 2666,
          Program2: null,
            Program: 2647
        }, {
            period: '2016 Q2',
            Program1: 2778,
          Program2: 2294,
            Program: 2441
        }, {
            period: '2016 Q3',
            Program1: 4912,
          Program2: 1969,
            Program: 2501
        }, {
            period: '2016 Q4',
            Program1: 3767,
          Program2: 3597,
            Program: 5689
        }, {
            period: '2017 Q1',
            Program1: 6810,
          Program2: 1914,
            Program: 2293
        }, {
            period: '2017 Q2',
            Program1: 5670,
          Program2: 4293,
            Program: 1881
        }, {
            period: '2017 Q3',
            Program1: 4820,
         Program2: 3795,
            Program: 1588
        }, {
            period: '2017 Q4',
            Program1: 15073,
          Program2: 5967,
            Program: 5175
        }, {
            period: '2018 Q1',
            Program1: 00,
          Program2: 0,
            Program: 0
        }, {
            period: '2018 Q2',
            Program1: 0,
          Program2: 0,
            Program: 0
        }],
        xkey: 'period',
        ykeys: ['Program1', 'Program2', 'Program'],
        labels: ['Weight Loss', 'Weight Gain', 'Weight Maintenance'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [        
        {
            label: "Download Sales",
            value: 12
        }, 
        {
            label: "In-Store Sales",
            value: 30
        }, 
        {
            label: "Mail-Order Sales",
            value: 20
        }
        ],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: 'January',
            a: 100,
            b: 90
        }, {
            y: 'February',
            a: 75,
            b: 65
        }, {
            y: 'March',
            a: 50,
            b: 40
        }, {
            y: 'April',
            a: 75,
            b: 65
        }, {
            y: 'May',
            a: 50,
            b: 40
        }, {
            y: 'June',
            a: 75,
            b: 65
        }, {
            y: 'July',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });
    
});
