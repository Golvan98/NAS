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
    
    
    <div id="first box" class="flex justify-center items-center w-full h-full bg-white flex h-full"> 
    
            <div id="first box" class="w-1/6 bg-white flex h-full items-center">

                <div class="mt-56">  
                
                    <a href="/viewsurveyresult/{{$questioncategory}}"> 
                            
                        <button class="ml-8 bg-green-500 px-8 py-3 rounded-md text-white font-bold"> 
                            
                            Get Back 

                        </button> 
                        
                    </a> 
                    
                </div>

            </div>

            <div id="center box" class="w-4/6 bg-white flex h-full h-full border border-gray-100 flex justify-center">


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
                    case "Relationships":
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>$RelationshipProblemISStudents),
                            array("label"=>"Computer Applications", "y"=>$RelationshipProblemCAStudents),
                            array("label"=>"Computer Science", "y"=>$RelationshipProblemComSciStudents),
                            array("label"=>"Information Technology", "y"=>$RelationshipProblemITStudents),                   
                        );
                    break;

                    case "Stress-Management":
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>$StressedISStudents),
                            array("label"=>"Computer Applications", "y"=>$StressedCAStudents),
                            array("label"=>"Computer Science", "y"=>$StressedComSciStudents),
                            array("label"=>"Information Technology", "y"=>$StressedITStudents),                   
                        );
                    break;

                    case "Student-Teacher-Conflict":
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>$StudentTeacherISStudents),
                            array("label"=>"Computer Applications", "y"=>$StudentTeacherCAStudents),
                            array("label"=>"Computer Science", "y"=>$StudentTeacherComSciStudents),
                            array("label"=>"Information Technology", "y"=>$StudentTeacherITStudents),                   
                        );
                    break;

                    case "Self-Image":
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>$SelfImageISStudents),
                            array("label"=>"Computer Applications", "y"=>$SelfImageCAStudents),
                            array("label"=>"Computer Science", "y"=>$SelfImageComSciStudents),
                            array("label"=>"Information Technology", "y"=>$SelfImageITStudents),                   
                        );
                    break; 

                    case "Bullying":
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>$BulliedStudentsISStudents),
                            array("label"=>"Computer Applications", "y"=>$BulliedStudentsCAStudents),
                            array("label"=>"Computer Science", "y"=>$BulliedStudentsComSciStudents),
                            array("label"=>"Information Technology", "y"=>$BulliedStudentsITStudents),                   
                        );
                    break;
                    
                    case "Peer Pressure":
                        $dataPoints = array( 
                            array("label"=>"Informaton Systems", "y"=>$PeerPressuredISStudents),
                            array("label"=>"Computer Applications", "y"=>$PeerPressuredCAStudents),
                            array("label"=>"Computer Science", "y"=>$PeerPressuredComSciStudents),
                            array("label"=>"Information Technology", "y"=>$PeerPressuredITStudents),                   
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
				<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
				<script type="text/javascript">

				window.onload = function () {
					var chart = new CanvasJS.Chart("chartContainer", {
						title:{
							text: "CCS Students having problems with {{ $questioncategory }}"             
						},

						
						data: [              
						{
							// Change type to "doughnut", "line", "splineArea", etc.
							type: "column",


							dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
						}
						]
					});
					chart.render();
				}
				</script>
				</head>
				<body>
				<div id="chartContainer" class="pt-12" style="height: 300px; width: 100%;"></div>
				</body>
				</html>
                
            </div>

            <div id="third box" class="flex-nowrap w-1/6 bg-white flex h-full">

                <div class="bg-red-300 w-full h-full flex-nowrap"> 

                    <div class="bg-white w-full h-1/6 flex justify-end"> 

                       <div class="w-full h-full"> <button class=" ml-16 mt-4 bg-gray-900 px-10 py-2 text-white font-bold rounded-md "> Print </button> </div>

                    </div>

                    <div class="bg-white w-full h-5/6"> <a href ="/piechart/{{$questioncategory}}"> box 2 </a> </div>

                </div>

            </div>

    </div>        



</div>
        
</x-layout>