<?php

$program_name = $_POST["program_name"];
$intake_no = $_POST["intake_no"];

?>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h3 class="header center blue-text text-lighten-1"><?= $program_name; ?></h3>
        <div class="row center">
            <h4 class="header col s12 light">Inatake no: <?= $intake_no; ?></h4>
            <h6 class="header col s12 light">Use <b>CTRL + F</b> to Search..</h6>
        </div>
        <div class="row center">
            <a href="/" id="download-button" class="btn-large waves-effect waves-light blue lighten-1">
                <i class="material-icons left">arrow_back</i>
                Go back
            </a>
        </div>
        <br><br>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col l12 s12">
                <table class="responsive-table highlight centered z-depth-1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Semester</th>
                            <th>CGPA</th>
                            <th>SGPA</th>
                            <th>Results</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php


                        function resultDetails($program_name, $intake_no)
                        {
                            $obj = json_decode(file_get_contents('./result.min.json'), true);

                            foreach ($obj['data'] as $data) {
                                $proName = $data['programName'];
                                //            echo "Program Name: ".$proName."<br>";

                                if ($proName == $program_name) {

                                    $intakes = $data['intakes'];
                                    foreach ($intakes

                                        as $intake) {
                                        $intakeNo = $intake['intakeNo'];
                                        //                echo "Intake: ".$intakeNo."<br>";


                                        if ($intakeNo == $intake_no) {
                                            $sections = $intake['sections'];
                                            foreach ($sections

                                                as $section) {
                                                $sectionNo = $section['sectionNo'];
                                                //                    echo $sectionNo."<br>";

                                                $students = $section['students'];
                                                foreach ($students

                                                    as $student) {
                                                    $studentsID = $student['studentsID'];
                                                    $studentsName = $student['studentsName'];
                                                    //                        echo "ID:".$studentsID.' '." Name: ".$studentsName."<br>";

                                                    $studentsResults = $student['studentsResults'];
                                                    foreach ($studentsResults

                                                        as $studentResult) {
                                                        $semesterName = $studentResult['semesterName'];
                                                        //                            echo "Semester: ".$semesterName."<br>";

                                                        $semRes = $studentResult['semesterResults'];
                                                        $cgpa = $semRes['cGpa'];
                                                        $sgpa = $semRes['sGpa'];
                                                        //                            echo "CGPA: ".$cgpa." SGPA: ".$sgpa."<br>";

                                                        $courseResults = $semRes['courseResults'];


                                                        $finals = array([
                                                            'student_id' => $studentsID,
                                                            'student_name' => $studentsName,
                                                            'program_name' => $proName,
                                                            'intake_no' => $intakeNo,
                                                            'section_no' => $sectionNo,
                                                            'semester_name' => $semesterName,
                                                            'cgpa' => $cgpa,
                                                            'sgpa' => $sgpa,
                                                            'course_results' => $courseResults
                                                        ]);

                                                        //                                var_dump($finals);



                                                        foreach ($finals as $final) {
                                                            echo '<tr>';
                                                            echo "<td>" . $final['student_id'] . "</td>";
                                                            echo "<td>" . $final['student_name'] . "</td>";
                                                            echo "<td>" . $final['section_no'] . "</td>";
                                                            echo "<td>" . $final['semester_name'] . "</td>";
                                                            echo "<td>" . $final['cgpa'] . "</td>";
                                                            echo "<td>" . $final['sgpa'] . "</td>";
                                                            echo "<td>";
                                                            foreach ($final['course_results'] as $course_result) {
                                                                echo "[" . $course_result['code'] . ' : ' . $course_result['grade'] . "]<br>";
                                                            }
                                                            echo "</td>";
                                                            echo "</tr>";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        if ($program_name && $intake_no) {
                            resultDetails($program_name, $intake_no);
                        } else {
                            die("Sorry, something went wrong!");
                        }

                        //echo $program_name;
                        //echo $intake_no;

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>