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
            <br /><br />
            <div class="row">
                <div class="col s12 l4 offset-l4">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card-title center-align">Result</h4>
                            <form action="request.php" method="post">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="program_name">
                                            <option value="B.Sc Engg in CSE">B.Sc Engg in CSE</option>
                                            <option value="B.A (Hons) in English">B.A (Hons) in English</option>
                                            <option value="B.Sc (Hons) in Economics">B.Sc (Hons) in Economics</option>
                                            <option value="B.Sc (Hons.) in EDE">B.Sc (Hons.) in EDE</option>
                                            <option value="B.Sc. CSIT">B.Sc. CSIT</option>
                                            <option value="B.Sc. EEE">B.Sc. EEE</option>
                                            <option value="B.Sc. Engg in CSE (Evening)">B.Sc. Engg in CSE (Evening)
                                            </option>
                                            <option value="B.Sc. in EEE (Evening)">B.Sc. in EEE (Evening)</option>
                                            <option value="B.Sc. in Textile Engg">B.Sc. in Textile Engg</option>
                                            <option value="B.Sc. in Textile Engineering (Evening)">B.Sc. in Textile
                                                Engineering (Evening)</option>
                                            <option value="BBA">BBA</option>
                                            <option value="EMBA">EMBA</option>
                                            <option value="LL.B (Hons)">LL.B (Hons)</option>
                                            <option value="M.Sc in Economics">M.Sc in Economics</option>
                                            <option value="MA in ELT (1 year)">MA in ELT (1 year)</option>
                                            <option value="MBA (Evening)">MBA (Evening)</option>
                                        </select>
                                        <label>Select Program</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input type="number" id="intake" name="intake_no" class="validate" value="37" />
                                        <label for="intake">Enter intake</label>
                                    </div>
                                </div>
                                <div class="row center-align">
                                    <button class="btn waves-effect waves-light blue lighten-1" type="submit" name="action">
                                        Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <br /><br />
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
                <a class="blue-text text-lighten-1" href="https://facebook.com/profile.php?id=100037108248990">Md Imam Hossain</a>,
                <a class="blue-text text-lighten-1" href="https://facebook.com/xayed42">Abdullah Zayed</a>
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