<?php

$program_name = $_POST["program_name"];
$intake_no = $_POST["intake_no"];

?>

<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BUBT Result</title>
</head>

<body>
    <nav class="blue lighten-1" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="/" class="brand-logo">NewAgeDevs</a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="https://facebook.com/newagedevs" target="_blank">Facebook</a>
                </li>
                <li>
                    <a href="https://twitter.com/newagedevs" target="_blank">Twitter</a>
                </li>
                <li>
                    <a href="https://github.com/newagedevs" target="_blank">Github</a>
                </li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li>
                    <a href="https://facebook.com/newagedevs" target="_blank">Facebook</a>
                </li>
                <li>
                    <a href="https://twitter.com/newagedevs" target="_blank">Twitter</a>
                </li>
                <li>
                    <a href="https://github.com/newagedevs" target="_blank">Github</a>
                </li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <h3 class="header center blue-text text-lighten-1"><?php echo $program_name; ?></h3>
            <div class="row center">
                <h4 class="header col s12 light">Inatake no: <?php echo $intake_no; ?></h4>
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

    <footer class="page-footer indigo darken-4" style="padding-bottom: 30px">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">NewAgeDevs</h5>
                    <p class="grey-text text-lighten-4">
                        New Age Developers is a software company in Bangladesh. Who
                        creates web, android and desktop applications.
                    </p>
                </div>

                <div class="col l3 s12 offset-l3">
                    <h5 class="white-text">Connect</h5>
                    <ul>
                        <li>
                            <a class="white-text" href="https://facebook.com/newagedevs">Facebook</a>
                        </li>
                        <li>
                            <a class="white-text" href="https://github.com/newagedevs">Github</a>
                        </li>
                        <li>
                            <a class="white-text" href="https://twitter.com/newagedevs">Twitter</a>
                        </li>
                        <li>
                            <a class="white-text" href="https://instagram.com/newagedevs">Instagram</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Made by
                <a class="blue-text text-lighten-1" href="https://facebook.com/istrafsanjani">Md Rafsan Jani Rafin</a>,
                <a class="blue-text text-lighten-1" href="https://www.facebook.com/profile.php?id=100037108248990">Md Imam Hossain</a>,
                <a class="blue-text text-lighten-1" href="https://github.com/xaadu">Abdullah Zayed</a>
            </div>
        </div>
    </footer>

    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        (function($) {
            $(function() {
                $(".sidenav").sidenav();
                $("select").formSelect();
            }); // end of document ready
        })(jQuery); // end of jQuery name space
    </script>
</body>

</html>