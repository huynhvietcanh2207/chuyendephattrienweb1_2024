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
    <div class="type-3017">
        <div class="section-header">
            <h1>Article &amp; News</h1>
            <p>Archives</p>
        </div>
        <section class="container section-main">
            <div class="row">
                <article class="col-md-4 ">
                    <div class="article">
                        <img src="anh3.jpg" alt="image">
                        <span class="tag">FAST SERVICE</span>
                        <div class="test-content">
                            <h2>Why Quick Repairs Matter: How <br> MobiCare Keeps You Connected</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur.</p>
                            <hr>
                            <div class="article-footer">
                                <span>October 8, 2024</span> &bull; <span>No Comments</span>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-md-4">
                    <div class="article">
                        <img src="anh4.jpg" alt="image">
                        <span class="tag">SCREEN PROTECTION</span> 
                        <div class="test-content">
                            <h2>How to Protect Your Phone Screen – Tips from MobiCare Experts</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur.</p>
                            <hr>
                            <div class="article-footer">
                                <span>October 8, 2024</span> &bull; <span>No Comments</span>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="col-md-4">
                    <div class="article">
                        <img src="anh5.jpg" alt="image">
                        <span class="tag">WATER DAMAGE</span> 
                        <div class="test-content">
                            <h2>Water Damage? Here’s What to Do Before Bringing It to MobiCare</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur.</p>
                            <hr>
                            <div class="article-footer">
                                <span>October 8, 2024</span> &bull; <span>No Comments</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </div>

</body>