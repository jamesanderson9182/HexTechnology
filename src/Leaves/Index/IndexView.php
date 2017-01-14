<?php
/**
 * Created by PhpStorm.
 * User: James-MSI
 * Date: 02/01/2017
 * Time: 20:41
 */

namespace HexTechnology\Leaves\Index;


use Rhubarb\Leaf\Views\View;

class IndexView extends View
{
    protected function printViewContent()
    {
        parent::printViewContent();
        ?>
        <h1 class="title">HexTechnology | Making your event work like magic!</h1>
        <?php
        //I am about to break the cardinal sin, I am about to put script into the body
        ?>

        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                data.addRows([
                    ['Sure SM58', 3],
                    ['QU32', 1],
                    ['GLD 80', 1],
                    ['Cromo 8', 1],
                    ['Yamahaa DBR12', 2]
                ]);

                // Set chart options
                var options = {'title':'Number of each asset',
                    'width':400,
                    'height':300};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
        <!--Div that will hold the pie chart-->
        <div id="chart_div"></div>
        <?php
    }

}