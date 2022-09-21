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
        
        switch($questioncategory){
            case "Anxiety":

                $dataPoints = array( 
                    array("label"=>"Informaton Systems", "y"=>$AnxiousISStudents),
                    array("label"=>"Information Technology", "y"=>$AnxiousITStudents),
                    array("label"=>"Computer Applications", "y"=>$AnxiousCAStudents),
                    array("label"=>"Computer Science", "y"=>$AnxiousComSciStudents),        
                );
            break;

            case "Motivation":
                
                $dataPoints = array( 
                    array("label"=>"Informaton Systems", "y"=>$LackOfMotivationISStudents),
                    array("label"=>"Computer Applications", "y"=>$LackOfMotivationCAStudents),
                    array("label"=>"Computer Science", "y"=>$LackOfMotivationComSciStudents),
                    array("label"=>"Information Technology", "y"=>$LackOfMotivationITStudents),                   
                );
           
            break;
            case "thing3":
            //Do a different thing
            break;
            default:
            //Catch anything
            break; //Break is not needed if default is the final case.
            }
       
            //put an if statement here to check if $dataPoints is empty, put a text saying "Data for this category is currently empty
       
        


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
                text: "{{$questioncategory}}"
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