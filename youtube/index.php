<?php require './function.php'; $error = "";?>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>YouTube Video Downloader | Download Any YouTube Videos - M S G</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="php.css">
    <link rel="shortcut icon" type="x-icon" href="/weblogo.jpg">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <meta name="keywords" content="youtube video downloader, download youtube video, youtube videos download, 
    yt video downloader tool for free">
    <meta name="description" content="Download Any YouTube Videos For FREE | Free Youtube videos downloader | 
    website to download youtube videos for free | Downloader tool for youtube videos | how to download 
    youtube videos in gallary | download videos directly | yt video downloader">
  
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1578967526186709"
    crossorigin="anonymous"></script>
  
</head>
<body>
<nav>
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>
        <div class="logo">
            M s G
        </div>
        <div class="nav-items">
            <li><a href="https://www.madhusudangaire.com.np" target="_blank">Home</a></li>
            <li><a href="https://www.madhusudangaire.com.np/policy/aboutus.html" target="_blank">About Us</a></li>
            <li><a href="https://www.madhusudangaire.com.np" target="_blank">Blogs</a></li>
            <li><a href="https://www.madhusudangaire.com.np/policy/policy.html" target="_blank">Privacy Policy</a></li>
            <li><a href="https://www.madhusudangaire.com.np/policy/termsofuse.html" target="_blank">Feedback</a></li>
        </div>
        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
        <form action="#">
            <input type="search" id="search" class="search-data" placeholder="Search" value="" required>
            <button type="submit" id="searchBtn" class="fas fa-search"></button>
        </form>
    </nav>
    <div class="ads1">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1578967526186709"
        crossorigin="anonymous"></script>
   <!-- MSG Horizontal Ad -->
   <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-1578967526186709"
        data-ad-slot="1513744337"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
   <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
   </script>
    </div> 
    <div class="container">
        <form method="post" action="" class="formSmall">
            <div class="row">
                <div class="col-lg-12">
                    <h2> YouTube Video Downloader - M S G</h2>
                </div>
                <div class="col-lg-12">
                    <div class="input-group">
                        <input type="text" class="form-control" name="video_link" placeholder="Paste Any YouTube Video Link" <?php if(isset($_POST['video_link'])) echo "value='".$_POST['video_link']."'"; ?>>
                        <span class="input-group-btn">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Go!</button>
                      </span>
                    </div><!-- /input-group -->
                </div>
            </div><!-- .row -->
        </form>
       <!-- Place Your Video Downloader Code Here -->
       <?php if(isset($_POST['submit'])): ?>


<?php 
$video_link = $_POST['video_link'];
preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_link, $match);
$video_id =  $match[1];
$video = json_decode(getVideoInfo($video_id));
$formats = $video->streamingData->formats;
$adaptiveFormats = $video->streamingData->adaptiveFormats;
$thumbnails = $video->videoDetails->thumbnail->thumbnails;
$title = $video->videoDetails->title;
$short_description = $video->videoDetails->shortDescription;
$thumbnail = end($thumbnails)->url;
?>


<div class="row formSmall">
    <div class="col-lg-3">
        <img src="<?php echo $thumbnail; ?>" style="max-width:100%">
    </div>
    <div class="col-lg-9">
        <h2>Title : <?php echo $title; ?> </h2>
        <p><?php echo str_split($short_description, 100)[0]; ?></p>
    </div>
</div>

<?php if(!empty($formats)): ?>


    <?php if(@$formats[0]->url == ""): ?>
    <div class="card formSmall">
        <div class="card-header">
            <strong>This video is currently not supported by our downloader!</strong>
            <small><?php 
            $signature = "https://example.com?".$formats[0]->signatureCipher;
                        parse_str( parse_url( $signature, PHP_URL_QUERY ), $parse_signature );
                        $url = $parse_signature['url']."&sig=".$parse_signature['s'];
                   ?>
            </small>
        </div>
    </div>
    <?php 
    die();
    endif;
    ?>
    
    <div class="card formSmall">   
        <div class="card-body">
            <table class="table ">
                <tr>
                    <th>URL</th>
                    <th>Type</td>
                    <th>Quality</th>
                    <th>Download</th>
                </tr>
                <?php foreach($formats as $format): ?>
                    <?php
                    
                    if(@$format->url == ""){
                        $signature = "https://example.com?".$format->signatureCipher;
                        parse_str( parse_url( $signature, PHP_URL_QUERY ), $parse_signature );
                        $url = $parse_signature['url']."&sig=".$parse_signature['s'];
                    }else{
                        $url = $format->url;
                    }
                    
                        
                    
                    
                    ?>
                    <tr>
                        <td><a href="<?php echo $url; ?>">Test</a></td>
                        <td>
                            <?php if($format->mimeType) echo explode(";",explode("/",$format->mimeType)[1])[0]; else echo "Unknown";?>
                        </td>
                        <td>
                            <?php if($format->qualityLabel) echo $format->qualityLabel; else echo "Unknown"; ?>
                        </td>
                        <td>
                            <a 
                                href="downloader.php?link=<?php echo urlencode($url)?>&title=<?php echo urlencode($title)?>&type=<?php if($format->mimeType) echo explode(";",explode("/",$format->mimeType)[1])[0]; else echo "mp4";?>"
                            >
                                Download
                            </a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

             
    <!-- Your code here for additional formats -->
    
<?php endif; ?>


<?php endif; ?>
                </div>
    </div>

    <div class="ads2">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1578967526186709"
        crossorigin="anonymous"></script>
   <!-- MSG Horizontal Ad -->
   <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-1578967526186709"
        data-ad-slot="1513744337"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
   <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
   </script>
    </div>
    <div class="foot">

        <footer>
            <div class="content1">

                <div class="top">
                    <div class="logo-details">

                        <span class="logo_name">M S G</span>
                    </div>
                    <div class="media-icons">
                        <a href="https://www.facebook.com/sudan.bishnu" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram" target="_blank"></i></a>
                        <a href="https://www.youtube.com/channel/UCEDqD2SHwF6_Ghr9gSX-MuA" target="_blank"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <hr>
                <br>
                <div class="link-boxes">
                    <ul class="box">
                        <li class="link_name">Main Pages</li>
                        <li><a href="https://www.madhusudangaire.com.np">Home</a></li>
                        <li><a href="https://www.madhusudangaire.com.np/policy/disclaimer.html">Contact us</a></li>
                        <li><a href="https://www.madhusudangaire.com.np/policy/aboutus.html">About us</a></li>

                    </ul>
                    <ul class="box">
                        <li class="link_name">Services</li>
                        <li><a href="">Web design</a></li>
                        <li><a href="">Logo design</a></li>
                        <li><a href="">Banner design</a></li>
                    </ul>
                    <ul class="box">
                        <li class="link_name">Sitemap</li>
                        <li><a href="/index.html">Sitemap →</a></li>
                    </ul>
                    <ul class="box">
                        <li class="link_name">Courses</li>
                        <li><a href="#">HTML </a></li>
                        <li><a href="#">CSS </a></li>
                        <li><a href="#">JavaScript</a></li>

                    </ul>
                    <ul class="box input-box">
                        <li class="link_name">Contact Us</li>
                        <li><a href="https://www.madhusudangaire.com.np/policy/disclaimer.html" target="_blank">Email:bggamerzofficial777@gmail.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bottom-details">
                <div class="bottom_text">
                    <span class="copyright_text">Copyright © 2022 <a href="#">M S G</a> All rights reserved</span>
                    <span class="policy_terms">
                        <a href="https://www.madhusudangaire.com.np/policy/policy.html">Privacy policy</a>
                        <a href="https://www.madhusudangaire.com.np/policy/termsofuse.html">Terms & condition</a>
                    </span>
                </div>
            </div>
        </footer>

        <script>
            const menuBtn = document.querySelector(".menu-icon span");
            const searchBtn = document.querySelector(".search-icon");
            const cancelBtn = document.querySelector(".cancel-icon");
            const items = document.querySelector(".nav-items");
            const form = document.querySelector("form");
            menuBtn.onclick = () => {
                items.classList.add("active");
                menuBtn.classList.add("hide");
                searchBtn.classList.add("hide");
                cancelBtn.classList.add("show");
            }
            cancelBtn.onclick = () => {
                items.classList.remove("active");
                menuBtn.classList.remove("hide");
                searchBtn.classList.remove("hide");
                cancelBtn.classList.remove("show");
                form.classList.remove("active");
                cancelBtn.style.color = "#ff3d00";
            }
            searchBtn.onclick = () => {
                form.classList.add("active");
                searchBtn.classList.add("hide");
                cancelBtn.classList.add("show");
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js"
            data-cfasync="false"></script>
        <script>
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#000"
                    },
                    "button": {
                        "background": "#ebdfdf",
                        "text": "#0d0c0c"
                    }
                },
                "content": {
                    "message": "This website uses cookies to ensure your best experience on our website. Keep Visiting.",
                    "link": "Learn More",
                    "href": "https://bggamerzofficial.netlify.app/policy/policy.html"
                }
            });
        </script>
        <script>
            const downloadBtn = document.querySelector(".download-btn");
            const countdown = document.querySelector(".countdown");
            var timeLeft = 10;

            downloadBtn.addEventListener("click", () => {
                downloadBtn.style.display = "none";
                countdown.innerHTML = "Download will begin automatically in <span>" + timeLeft "</span> seconds.";

                var downloadTimer = setInterval(function timeCount() {
                    timeLeft -= 1;
                    countdown.innerHTML = "Download will begin automatically in <span>" + timeLeft "</span> seconds.";
                    if (timeLeft <= 0) {
                        clearInterval(downloadTimer);
                    }
                }, 1000);
            });
        </script>

</body>
</html>