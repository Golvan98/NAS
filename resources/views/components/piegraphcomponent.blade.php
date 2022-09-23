<?php
                
                switch($questioncategory){
                    case "Anxiety":

                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>1),
                            array("label"=>"Information Technology", "y"=>2),
                            array("label"=>"Computer Applications", "y"=>3),
                            array("label"=>"Computer Science", "y"=>4),        
                        );
                    break;

                    case "Motivation":
                        
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>2),
                            array("label"=>"Computer Applications", "y"=>4),
                            array("label"=>"Computer Science", "y"=>7),
                            array("label"=>"Information Technology", "y"=>3),                   
                        );
                
                    break;
                    case "Relationships":
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>2),
                            array("label"=>"Computer Applications", "y"=>4),
                            array("label"=>"Computer Science", "y"=>7),
                            array("label"=>"Information Technology", "y"=>3),                   
                        );
                    break;

                    case "Stress-Management":
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>2),
                            array("label"=>"Computer Applications", "y"=>4),
                            array("label"=>"Computer Science", "y"=>7),
                            array("label"=>"Information Technology", "y"=>3),                   
                        );
                    break;

                    case "Student-Teacher-Conflict":
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>2),
                            array("label"=>"Computer Applications", "y"=>4),
                            array("label"=>"Computer Science", "y"=>7),
                            array("label"=>"Information Technology", "y"=>3),                   
                        );
                    break;

                    case "Self-Image":
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>2),
                            array("label"=>"Computer Applications", "y"=>4),
                            array("label"=>"Computer Science", "y"=>7),
                            array("label"=>"Information Technology", "y"=>3),                   
                        );
                    break; 

                    case "Bullying":
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>2),
                            array("label"=>"Computer Applications", "y"=>4),
                            array("label"=>"Computer Science", "y"=>7),
                            array("label"=>"Information Technology", "y"=>3),                   
                        );
                    break;
                    
                    case "Peer Pressure":
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>2),
                            array("label"=>"Computer Applications", "y"=>4),
                            array("label"=>"Computer Science", "y"=>7),
                            array("label"=>"Information Technology", "y"=>3),                   
                        );
                    break;
                    default:
                    //Catch anything
                    break; //Break is not needed if default is the final case.
                    }
            
                    //put an if statement here to check if $dataPoints is empty, put a text saying "Data for this category is currently empty"
                

                ?>



<!DOCTYPE HTML>
                <html>
                <head>
                <script>
                window.onload = function() {
                
                
                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    title: {
                        text: "Students in CCS Having Problems With"
                    },
                    subtitles: [{
                        text: "yawa"
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