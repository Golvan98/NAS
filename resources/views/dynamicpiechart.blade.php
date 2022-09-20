<x-layout>

<div id="main" class="flex-nowrap w-full h-full bg-gray-300">


    <div  class="w-full bg-white flex h-1/6 justify-center items-end  ">
        
       <div class="w-full flex-nowrap ">
        
            <div class="w-full flex justify-center items-end"> 
                <div class="w-4/5 text-lg"> <strong> Good Evening, Counselor! </strong> </div>
            </div>

            <div class="w-full flex justify-center"> 
                <div class="w-full h-0.5 bg-red-500 mx-2">  </div>
            </div>
       </div>
       
      
    </div>
    
    
    
    
    <div id="main box" class="w-full bg-white flex h-full justify-center items-center h-4/6">


        <?php
        
        $dataPoints = array( 
            array("label"=>"Informaton Systems", "y"=>$AnxietyCCS_count),
            array("label"=>"Information Technology", "y"=>24),
            array("label"=>"Computer Applications", "y"=>13),
            array("label"=>"Computer Science", "y"=>6),
            
            
        )
        
        ?>
        <!DOCTYPE HTML>
        <html>
        <head>
        <script>
        window.onload = function() {
        
        
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Students Having Problems With"
            },
            subtitles: [{
                text: "Anxiety"
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##\"\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
        
        }
        </script>
        </head>
        <body>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </body>
        </html>         

        
    </div>



</div>
        
</x-layout>