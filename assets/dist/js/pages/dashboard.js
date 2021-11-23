/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/
if (PAGE == "<i class='fa fa-dashboard'></i> Dashboard") {
    $(function() {

        'use strict'

        // Make the dashboard widgets sortable Using jquery UI
        $('.connectedSortable').sortable({
            placeholder: 'sort-highlight',
            connectWith: '.connectedSortable',
            handle: '.card-header, .nav-tabs',
            forcePlaceholderSize: true,
            zIndex: 999999
        })
        $('.connectedSortable .card-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move')

        // jQuery UI sortable for the todo list
        $('.todo-list').sortable({
            placeholder: 'sort-highlight',
            handle: '.handle',
            forcePlaceholderSize: true,
            zIndex: 999999
        })

        // bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()

        /* jQueryKnob */
        $('.knob').knob()

        // Sparkline charts
        var myvalues = [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021]
        $('#sparkline-1').sparkline(myvalues, {
            type: 'line',
            lineColor: '#92c1dc',
            fillColor: '#ebf4f9',
            height: '50',
            width: '80'
        })
        myvalues = [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921]
        $('#sparkline-2').sparkline(myvalues, {
            type: 'line',
            lineColor: '#92c1dc',
            fillColor: '#ebf4f9',
            height: '50',
            width: '80'
        })
        myvalues = [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21]
        $('#sparkline-3').sparkline(myvalues, {
            type: 'line',
            lineColor: '#92c1dc',
            fillColor: '#ebf4f9',
            height: '50',
            width: '80'
        })

        // The Calender
        $('#calendar').datepicker()

        // SLIMSCROLL FOR CHAT WIDGET
        $('#chat-box').slimScroll({
            height: '250px'
        })

        /* Morris.js Charts */
        // Sales chart
        // var area = new Morris.Area({
        //   element   : 'revenue-chart',
        //   resize    : true,
        //   data      : [
        //     { y: '2019-01-01', item1: 2666 },
        //     { y: '2019-02-01', item1: 2778 },
        //     { y: '2019-03-01', item1: 4912 },
        //     { y: '2019-04-01', item1: 3767 },
        //     { y: '2019-04-01', item1: 6810 },
        //     { y: '2019-05-01', item1: 5670 },
        //     { y: '2019-05-02', item1: 4820 },
        //     { y: '2019-05-03', item1: 15073 },
        //     { y: '2019-05-04', item1: 10687 },
        //     { y: '2019-06-05', item1: 8432 }
        //   ],
        //   xkey      : 'y',
        //   ykeys     : ['item1'],
        //   labels    : ['Item1'],
        //   lineColors: ['#495057','#007cff'],
        //   hideHover : 'auto'
        // })
        // var line = new Morris.Line({
        //   element          : 'line-chart',
        //   resize           : true,
        //   data             : [
        //     { y: '2011 Q1', item1: 2666 },
        //     { y: '2011 Q2', item1: 2778 },
        //     { y: '2011 Q3', item1: 4912 },
        //     { y: '2011 Q4', item1: 3767 },
        //     { y: '2012 Q1', item1: 6810 },
        //     { y: '2012 Q2', item1: 5670 },
        //     { y: '2012 Q3', item1: 4820 },
        //     { y: '2012 Q4', item1: 15073 },
        //     { y: '2013 Q1', item1: 10687 },
        //     { y: '2013 Q2', item1: 8432 }
        //   ],
        //   xkey             : 'y',
        //   ykeys            : ['item1'],
        //   labels           : ['Item 1'],
        //   lineColors       : ['#efefef'],
        //   lineWidth        : 2,
        //   hideHover        : 'auto',
        //   gridTextColor    : '#fff',
        //   gridStrokeWidth  : 0.4,
        //   pointSize        : 4,
        //   pointStrokeColors: ['#efefef'],
        //   gridLineColor    : '#efefef',
        //   gridTextFamily   : 'Open Sans',
        //   gridTextSize     : 10
        // })

        // // Donut Chart
        // var donut = new Morris.Donut({
        //   element  : 'sales-chart',
        //   resize   : true,
        //   colors   : ['#007bff', '#dc3545', '#28a745'],
        //   data     : [
        //     { label: 'Download Sales', value: 12 },
        //     { label: 'In-Store Sales', value: 30 },
        //     { label: 'Mail-Order Sales', value: 20 }
        //   ],
        //   hideHover: 'auto'
        // })

        // // Fix for charts under tabs
        // $('.box ul.nav a').on('shown.bs.tab', function () {
        //   area.redraw()
        //   donut.redraw()
        //   line.redraw()
        // })


        // var ctx = document.getElementById('myChart').getContext('2d');
        // var myChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        //         datasets: [{
        //             label: '# of Votes',
        //             data: [12, 19, 3, 5, 2, 3],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255, 99, 132, 1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 }
        //             }]
        //         }
        //     }
        // });
    })
}