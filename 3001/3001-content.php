<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->


<body>
    <div class="type-3001">
        <div class="container section-container">
            <div class="row align-items-center">
                <div class="col-lg-6 image-container custom-width-6-5">
                    <div class="image-1">
                        <img alt="Man smiling while using a smartphone" src="anh1.png" style="width: 605px; height: 500px;" />
                    </div>
                    <div class="image-2">
                        <img alt="Close-up of hands repairing a smartphone" src="anh2.jpg" style="width: 350px; height: 250px;" class="img-fluid secondary" />
                    </div>
                </div>
                <div class="col-lg-6 content-container custom-width-5-5">
                    <h2 class="title">Our Services</h2>
                    <h1 class="headline">Your Trusted Partner for Same-Day Phone Repair.</h1><br>
                    <p class="description">
                        Aliquam pellentesque quam aenean bibendum mollis per. Duis non rhoncus vulputate maximus enim ornare.
                        Diam eu id <br> rutrum lobortis netus neque integer venenatis letius libero a.
                    </p>
                    <div class="feature">
                        <div class="icon-wrap">
                            <i class="fa fa-tachometer"></i>
                        </div>
                        <div>
                            <h3 class="feature-title">Fast Turnaround Time</h3>
                            <p class="feature-description">In sociosqu tristique consectetur potenti lectus si morbi porta magnis.</p>
                        </div>
                    </div>
                    <div class="feature">
                        <div class="icon-wrap">
                            <i class="fa fa-umbrella"></i>
                        </div>
                        <div>
                            <h3 class="feature-title">Comprehensive Warranty</h3>
                            <p class="feature-description">In sociosqu tristique consectetur potenti lectus si morbi porta magnis.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="team mt-4 d-flex align-items-center">
                        <img alt="Person 1" src="3.jpg" />
                        <img alt="Person 2" src="444.jpg" />
                        <img alt="Person 3" src="555.jpg" />
                        <img alt="Person 4" src="666.jpg" />
                        <div class="team-info">
                            <h6>More than 1500+<br /> </h6> <p>People join our team</p>  
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>