<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\Student;
use App\Models\SurveyResponses;
use App\Models\SurveyResponseAnswers;
use App\Models\Department;
use App\Models\College;
use App\Models\Course;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {    

      $this->faker = Faker::create();
      $examplefakerofnumber = $this->faker->randomDigit();
            


      $COE = College::factory()->create([
        'id' => 1,
        'collegename' => 'College of Engineering',
        'collegecode' => 'COE'
      ]);

      $coedepartments = Department::factory(6)->create([        
        'college_id' => $COE->id,
        'departmentname' => NULL
      ]);
   
      foreach($coedepartments as $coedepartment)
      {
        $coedepartment->update([
          'departmentname' => $this->faker->unique()->randomElement(['Mechanical Engineering', 'Electrical Engineering', 'Civil Engineering', 'Computer Engineering', 'Ceramics Engineering', 'Chemical Engineering'])        
        ]);
        
                if ($coedepartment->departmentname =='Mechanical Engineering')
                {
                  Course::factory()->create([
                    'department_id' => $coedepartment->id,
                    'coursename' => $this->faker->randomElement(['Bachelor of Science in Mechanical Engineering']),
                    'coursecode' => $this->faker->randomElement(['BSME'])
                  ]);
                }

                if($coedepartment->departmentname =='Electrical Engineering')
                {
                  Course::factory()->create([
                    'department_id' => $coedepartment->id,
                    'coursename' => $this->faker->randomElement(['Bachelor of Science in Electrical Engineering']),
                    'coursecode' => $this->faker->randomElement(['BSEE'])
                  ]);
                }

                if($coedepartment->departmentname == 'Civil Engineering')
                {
                  Course::factory()->create([
                    'department_id' => $coedepartment->id,
                    'coursename' => $this->faker->randomElement(['Bachelor of Science in Civil Engineering']),
                    'coursecode' => $this->faker->randomElement(['BSCE'])
                  ]);
                }
                if($coedepartment->departmentname == 'Computer Engineering')
                {
                  Course::factory()->create([
                    'department_id' => $coedepartment->id,
                    'coursename' => $this->faker->randomElement(['Bachelor of Science in Computer Engineering']),
                    'coursecode' => $this->faker->randomElement(['BSCPE'])
                  ]);
                }
                if($coedepartment->departmentname == 'Ceramics Engineering')
                {
                  Course::factory()->create([
                    'department_id' => $coedepartment->id,
                    'coursename' => $this->faker->randomElement(['Bachelor of Science in Ceramics Engineering']),
                    'coursecode' => $this->faker->randomElement(['BSCERE'])
                  ]);
                }
                if($coedepartment->departmentname == 'Chemical Engineering')
                {
                  Course::factory()->create([
                    'department_id' => $coedepartment->id,
                    'coursename' => $this->faker->randomElement(['Bachelor of Science in Chemical Engineering']),
                    'coursecode' => $this->faker->randomElement(['BSCHE'])
                  ]);
                }
      }

      $CCS = College::factory()->create([
        'id' => 2,
        'collegename' => 'College of Computer Science',
        'collegecode' => 'CCS'
      ]);

      $ccsdepartments = Department::factory(4)->create([
        'college_id' => $CCS->id,
        'departmentname' => NULL
      ]);
      


      foreach($ccsdepartments as $ccsdepartment)
      {
        $ccsdepartment->update([
          'departmentname' => $this->faker->unique()->randomElement(['Computer Science', 'Information Technology', 'Information Systems', 'Computer Application'])
        ]);

              if($ccsdepartment->departmentname == 'Computer Science')
              {
                Course::factory()->create([
                'department_id' => $ccsdepartment->id,
                'coursename' => 'Bachelor of Science in Computer Science',
                'coursecode' => 'BSCS'
              ]);
              }

              if($ccsdepartment->departmentname == 'Information Technology')
              {
              Course::factory()->create([
                'department_id' => $ccsdepartment->id,
                'coursename' => 'Bachelor of Science in Information Technology',
                'coursecode' => 'BSIT'
              ]);
              }
              if($ccsdepartment->departmentname =='Information Systems')
              {
              Course::factory()->create([
                'department_id' => $ccsdepartment->id,
                'coursename' => 'Bachelor of Science in Information Systems',
                'coursecode' => 'BSIS'
              ]);
              }

              if($ccsdepartment->departmentname =='Computer Application')
              {
                Course::factory()->create([
                  'department_id' => $ccsdepartment->id,
                  'coursename' => 'Bachelor of Science in Computer Application',
                  'coursecode' => 'BSCA'
                ]);
              }
      }

      $CASS = College::factory()->create([
        'id' => 3,
        'collegename' => 'College of Social Arts and Sciences',
        'collegecode' => 'CASS'
      ]);

      $cassdepartments = Department::factory(7)->create([
        'college_id' => $CASS->id,
        'departmentname' => NULL
      ]);

      foreach($cassdepartments as $cassdepartment)
      {
        $cassdepartment->update([
          'departmentname' =>$this->faker->unique()->randomElement(['English', 'Filipino', 'Social Science', 'Psychology', 'History', 'Political Science', 'Philosophy'])
        ]);

              if($cassdepartment->departmentname == 'English')
              {
                Course::factory()->create([
                  'department_id' => $cassdepartment->id,
                  'coursename' => 'Bachelor of Arts in English Language Studies',
                  'coursecode' => 'BA ELS',
                ]);
              }

              if($cassdepartment->departmentname == 'Filipino')
              {
                Course::factory()->create([
                  'department_id' => $cassdepartment->id,
                  'coursename' => 'Bachelor of Arts in Filipino',
                  'coursecode' => 'BA FIL',
                ]);
              }
              if($cassdepartment->departmentname == 'Social Science')
              {
                Course::factory()->create([
                  'department_id' => $cassdepartment->id,
                  'coursename' => 'Bachelor of Arts in Sociology',
                  'coursecode' => 'BA SOCIO'
                ]);
              }
              if($cassdepartment->departmentname == 'Psychology')
              {
                Course::factory()->create([
                  'department_id' => $cassdepartment->id,
                  'coursename' => 'Bachelor of Arts in Psychology',
                  'coursecode' => 'BA PSYCH'
                ]);
              }
              if($cassdepartment->departmentname == 'History')
              {
                Course::factory()->create([
                  'department_id' => $cassdepartment->id,
                  'coursename' => 'Bachelor of Arts in History',
                  'coursecode' => 'BA HISTORY'
                ]);
              }
              if($cassdepartment->departmentname == 'Political Science')
              {
                Course::factory()->create([
                  'department_id' => $cassdepartment->id,
                  'coursename' => 'Bachelor of Science in Political Science',
                  'coursecode' => 'BA POLSCI'
                ]);
              }
              if($cassdepartment->departmentname =='Philosophy')
              {
                Course::factory()->create([
                  'department_id' => $cassdepartment->id,
                  'coursename' => 'Bachelor of Science in Philosophy',
                  'coursecode' => 'BS PS'
                ]);
              }

      }

      $CBAA = College::factory()->create([
        'id' => 4,
        'collegename' => 'College of Economics, Business and Administration',
        'collegecode' => 'CBAA'
      ]);

      $cbaadepartments = Department::factory(6)->create([
        'college_id' => $CBAA->id,
        'departmentname' => NULL
      ]);

      foreach($cbaadepartments as $cbaadepartment)
      {
        $cbaadepartment->update([
          'departmentname' => $this->faker->unique()->randomElement(['Economics', 'Accountancy', 'Hospitality Management', 'Entrepreneurship', 'Business Economics', 'Marketing Management'])
        ]);

            if($cbaadepartment->departmentname == 'Economics')
            {
              Course::factory()->create([
                'department_id' => $cbaadepartment->id,
                'coursename' => 'Bachelor of Science in Economics',
                'coursecode' => 'BS ECON'
              ]);
            }

            if($cbaadepartment->departmentname == 'Accountancy')
            {
              Course::factory()->create([
              'department_id' => $cbaadepartment->id,
              'coursename' => 'Bachelor of Science in Accountancy',
              'coursecode' => 'BSA'
              ]);
            }

            if($cbaadepartment->departmentname =='Hospitality Management')
            {
              Course::factory()->create([
                'department_id' => $cbaadepartment->id,
                'coursename' => 'Bachelor of Science in Hospitality Management',
                'coursecode' => 'BS HM'
              ]);
            }

            if($cbaadepartment->departmentname =='Entrepreneurship')
            {
              Course::factory()->create([
                'department_id' => $cbaadepartment->id,
                'coursename' => 'Bachelor of Science in Entrepreneurship',
                'coursecode' => 'BS ENTREP'
              ]);
            }

            if($cbaadepartment->departmentname =='Business Economics')
            {
              Course::factory()->create([
              'department_id' => $cbaadepartment->id,
              'coursename' => 'Bachelor of Science in Business Economics',
              'coursecode' => 'BSBA-B.ECON'
              ]);
            }

            if($cbaadepartment->departmentname == 'Marketing Management')
            {
              Course::factory()->create([
                'department_id' => $cbaadepartment->id,
                'coursename' => 'Bachelor of Science in Marketing Management',
                'coursecode' => 'BSBA-MKT MGT'
              ]);
            }

      }

      $CED = College::factory()->create([
        'id' => 5,
        'collegename' => 'College of Education',
        'collegecode' => 'CED'
      ]);

      $ceddepartments = Department::factory(3)->create([
        'college_id' => $CED->id,
        'departmentname' => NULL
      ]);

      foreach($ceddepartments as $ceddepartment)
      {
        $ceddepartment->update([
          'departmentname' => $this->faker->unique()->randomElement(['Science and Mathematics Education', 'Language Education', 'Physical Education'])
        ]);

                  if($ceddepartment->departmentname == 'Science and Mathematics Education')
                  {
                    Course::factory()->create([
                      'department_id' => $ceddepartment->id,
                      'coursename' => 'Bachelor of Education in Science and Mathematics',
                      'coursecode' => 'BEED SCI MAT',
                    ]);
                    Course::factory()->create([
                      'department_id' => $ceddepartment->id,
                      'coursename' => 'Bachelor of Secondary Education major in Chemistry',
                      'coursecode' => 'BSED CHEM'
                    ]);
                    Course::factory()->create([
                      'department_id' => $ceddepartment->id,
                      'coursename' => 'Bachelor of Secondary Education major in Biology',
                      'coursecode' => 'BSED BIO'
                    ]);                  
                    Course::factory()->create([
                      'department_id' => $ceddepartment->id,
                      'coursename' => 'Bachelor of Secondary Education major in Mathematics',
                      'coursecode' => 'BSED MATH'
                    ]);
                    Course::factory()->create([
                      'department_id' => $ceddepartment->id,
                      'coursename' => 'Bachelor of Secondary Education major in Physics',
                      'coursecode' => 'BSED PHYS'
                    ]);
                  }

                  if($ceddepartment->departmentname == 'Language Education')
                  {
                    Course::factory()->create([
                      'department_id' => $ceddepartment->id,
                      'coursename' => 'Bachelor of Education in Language Education',
                      'coursecode' => 'BEED Lang Ed'
                    ]);
                    Course::factory()->create([
                      'department_id' => $ceddepartment->id,
                      'coursename' => 'Bachelor of Secondary Education major in Filipino',
                      'coursecode' => 'BSED FIL'
                    ]);
                  }

                  if($ceddepartment->departmentname == 'Physical Education')
                  {
                    Course::factory()->Create([
                      'department_id' => $ceddepartment->id,
                      'coursename' => 'Bachelor of Education in Physical Education',
                      'coursecode' => 'BPED'
                    ]);
                  }

      }

      $CSM = College::factory()->create([
        'id' => 6,
        'collegename' => 'College of Science and Mathematics',
        'collegecode' => 'CSM'
      ]);

      $csmdepartments = Department::factory(4)->create([
        'college_id' => $CSM->id,
        'departmentname' => NULL
      ]);

      foreach($csmdepartments as $csmdepartment)
      {
        $csmdepartment->update([
          'departmentname' => $this->faker->unique()->randomElement(['Biological Science', 'Chemistry', 'Mathematics and Statistics', 'Physics'])
        ]);
              if($csmdepartment->departmentname =='Biological Science')
              {
                Course::factory()->create([
                  'department_id' => $csmdepartment->id,
                  'coursename' => 'Bachelor of Science in Marine Biology',
                  'coursecode' => 'BSMARINE BIO'
                ]);
                Course::factory()->create([
                  'department_id' => $csmdepartment->id,
                  'coursename' => 'Bachelor of Science in General Biology',
                  'coursecode' => 'BSGEN BIO'
                ]);
                Course::factory()->create([
                  'department_id' => $csmdepartment->id,
                  'coursename' => 'Bachelor of Science in Botany Biology',
                  'coursecode' => 'BSBOTANY BIO'
                ]);
                Course::factory()->create([
                  'department_id' => $csmdepartment->id,
                  'coursename' => 'Bachelor of Science in Zoology Biology',
                  'coursecode' => 'BSZOOLOGY BIO'
                ]);
              }
              if($csmdepartment->departmentname == 'Chemistry')
              {
                Course::factory()->create([
                  'department_id' => $csmdepartment->id,
                  'coursename' => 'Bachelor of Science in Chemistry',
                  'coursecode' => 'BSCHEM'
                ]);
              }
              if($csmdepartment->departmentname =='Mathematics and Statistics')
              {
                Course::factory()->create([
                  'department_id' => $csmdepartment->id,
                  'coursename' => 'Bachelor of Science in Mathematics',
                  'coursecode' => 'BSMATH'
                ]);
                Course::factory()->create([
                  'department_id' => $csmdepartment->id,
                  'coursename' => 'Bachelor of Science in Statistics',
                  'coursecode' => 'BSSTAT'
                ]);
              }
              if($csmdepartment->departmentname =='Physics')
              {
                Course::factory()->create([
                  'department_id' => $csmdepartment->id,
                  'coursename' => 'Bachelor of Science in Physics',
                  'coursecode' => 'BSPHYSICS'
                ]);
              }


      }

      $CON = College::factory()->create([
        'id' => 7,
        'collegename' => 'College of Nursing',
        'collegecode' => 'CON'
      ]);

      $condepartments = department::factory(1)->create([
        'college_id' => $CON->id,
        'departmentname' => NULL
      ]);
            

      foreach($condepartments as $condepartment)
      {
        $condepartment->update([
          'departmentname' => $this->faker->unique()->randomElement(['Nursing'])
        ]);

              if($condepartment->departmentname =='Nursing')
              {
                Course::factory()->create([
                  'department_id' => $condepartment->id,
                  'coursename' => 'Bachelor of Science in Nursing',
                  'coursecode' => 'BSNURSING'
                ]);
              }
      }



      $surveys = Survey::factory(4)->create();

      foreach ($surveys as $survey) 
      {
        $questions = SurveyQuestion::factory(8)->create();                     
        foreach ($questions as $question) 
        {          
          $surveyresponseanswers = SurveyResponseAnswers::factory(3)->create();
          $question->update([
            'survey_id' => $survey->id,
                           ]);               
          foreach($surveyresponseanswers as $surveyresponseanswer)
                        {
                          $surveyresponses = SurveyResponses::factory(1)->create(); 
                          $students = Student::factory(1)->create([
                            'course_id' => $this->faker->numberBetween(1,34),
                            'password' => 'zalsos'                           
                          ]);          
                          foreach($surveyresponses as $surveyresponse)
                              {
                                $surveyresponseanswer->update([
                                  'survey_response_id' => $surveyresponse->id,
                                  'survey_question_id' => $question->id
                                                             ]);            
                                  foreach($students as $student)
                                  {
                                    
                                    $surveyresponse->update(['survey_id' => $survey->id,                                   
                                    'student_id' => $student->id
                                                           ]);
                                  }

                              }            
                        }
        }   
      }
    
    }

       

}
 /*
        $questions = Question::factory(6)->create(); 

        
     
        $survey = Survey::create(['id' => '1', 'survey_name' => 'Survey 1 & 2', 'school_year' => '1', 'active' => '1']);
        $survey->question()->sync([1,2]);
     
*/
/*
        $surveys = Survey::factory(6)->create(); 

        $question = Question::create(['id' => '1', 'question' => 'question yada yada']);
        $question->first()->survey()->sync([1, 2]); */