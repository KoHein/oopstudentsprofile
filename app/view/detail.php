<?php

/**
 *@For Detail Students Profile View By One!!
 *@Author KoHein
 */

$requestURI = explode('/', strtolower($_SERVER['REQUEST_URI']));
if(!$requestURI[4]) {
	RedirectController::to('404');
} else
{
	$user = new DetailController($requestURI[4]);
	if(!$user->data()) {
		RedirectController::to('404');
	}else {
		$data = $user->data();
	}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Students Profile</title>
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
    
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){
            window.scrollTo(0,1);
        }
    </script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="../css/base.css" />

    <link rel="stylesheet" class="alt" href="../css/theme-green.css">
    <link rel="stylesheet" href="../css/skeleton.css" />
    <link rel="stylesheet" href="../css/layout.css" />
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,500,600,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/prettyPhoto.css" />
    
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="../img/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="../img/apple-touch-icon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/apple-touch-icon-114x114.png" />
    
    <!-- To Top scripts -->
    

    <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script> 
    <script src="../js/jquery.hashchange.min.js" type="text/javascript"></script>
    <script src="../js/jquery.tweet.js" type="text/javascript"></script>
    <script src="../js/jquery.easytabs.min.js" type="text/javascript"></script>
    <script src="../js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/jquery.prettyPhoto.js"></script> 
    <script type="text/javascript" src="../js/jquery.quicksand.js"></script>   
    <script type="text/javascript" src="../js/custom.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body style="background: url(&quot;../img/pattern/pattern1.png&quot;) repeat scroll 0% 0% transparent;">
<!-- Style Switcher Start -->
<div style="left: -130px;" class="styleswitcher">
  <div class="arrow-box"><a class="switch-button closed"><i class="icon-caret-right"></i></a> </div>
    <h3>Color scheme</h3>
    <ul class="color-scheme">
        <li><a class="orange-theme" rel="../css/theme-orange.css" href="#"></a></li>
        <li><a class="blue-theme" rel="../css/theme-blue.css" href="#"></a></li>
        <li><a class="cyan-theme" rel="../css/theme-cyan.css" href="#"></a></li>
        <li><a class="green-theme" rel="../css/theme-green.css" href="#"></a></li>
        <li><a class="pink-theme" rel="../css/theme-pink.css" href="#"></a></li>
    </ul>
    <h3>Background </h3>
    <ul class="background-selector">
        <li><a href="#"><img alt="" src="../img/pattern/pattern1.png" data-nr="1"></a></li>
        <li><img alt="" src="../img/pattern/pattern1.png" data-nr="1"></li>
        <li><img alt="" src="../img/pattern/pattern2.png" data-nr="2"></li>
        <li><img alt="" src="../img/pattern/pattern3.png" data-nr="3"></li>
        <li class="nomargin"><img alt="" src="../img/pattern/pattern4.png" data-nr="4"></li>
        <li class="nomargin"><img alt="" src="../img/pattern/pattern5.png" data-nr="5"></li>
        <li><img alt="" src="../img/pattern/pattern6.png" data-nr="6"></li>
        <li><img alt="" src="../img/pattern/pattern7.png" data-nr="7"></li>
        <li><img alt="" src="../img/pattern/pattern8.png" data-nr="8"></li>
        <li><img alt="" src="../img/pattern/pattern9.png" data-nr="9"></li>
    </ul>
</div>
<!-- Style Switcher Start -->

<div id="content">
    <div class="container outer-wrap">
        <div class="dark-bg">
            <div class="fake-bg"></div>
            <div class="color-bg">
                    <div class="columns four">
                        <div id="logo">
                            <a href=""><img style="height:234px; width:227px" src="../<?php echo ($data->photo); ?>" alt="../img/my_photo.png"></a>
                            <div class="shadow-wrap"></div>
                        </div>
                        <div class="content-pad">
                            <h3 class="org-head"><span>My Social Network</span></h3>
                            <div class="social-icons">
                                <ul>
                                    <li class=""><a href=""><i class="icon-twitter"></i></a></li>
                                    <li class=""><a href=""><i class="icon-facebook"></i></a></li>
                                    <li class=""><a href=""><i class="icon-google-plus"></i></a></li>
                                    <li class=""><a href=""><i class="icon-linkedin"></i></a></li>
                                    <li class=""><a href=""><i class="icon-pinterest"></i></a></li>
                                    <li class=""><a href=""><i class="icon-github"></i></a></li>
                                    <li class=""><a href=""><i class="icon-rss"></i></a></li>
                                </ul>
                            </div>
                            
                            <h3 class="org-head"><span>Follow On Twitter</span></h3>
                            <div class='tweet query'></div>
                        </div>
                    </div>
                    <div class="columns twelve">
                        <div id="tab-body">
                            <div id="tab-container" class='tab-container'>
                                <ul class='etabs'>
                                    <li class='tab'><a href="#home" class="home"><span class="icon-wrap"><i class="icon-home"></i></span>Home</a></li>
                                    <li class='tab'><a href="#web" class="about"><span class="icon-wrap"><i class="icon-user"></i></span>Profile</a></li>
                                    <li class='tab'><a href="#about" class="social"><span class="icon-wrap"><i class="icon-briefcase"></i></span>Portfolio</a></li>
                                    <li class='tab'><a href="#contact" class="contact"><span class="icon-wrap"><i class="icon-envelope-alt"></i></span>Contact</a></li>
                                </ul>
                                <div class='panel-container'>
                                    <div id="home" class="page">
                                        <div class="content-wrap">
                                            <div class="columns six">
                                                <div class="content-pad">
                                                    <div class="intro-head">
                                                        <p class="font48">Students Profile</p>
                                                        <p class="font24">How's it going? My name is <span><?php echo ($data->username); ?></span></p>
                                                        <p>I'm an <span><?php echo ($data->work); ?></span></p>
                                                        <p>I work with <span><?php echo ($data->company); ?></span></p>
                                                        <p>I'm from <span><?php echo ($data->fromadd); ?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="columns five">
                                                <div class="content-pad">
                                                    <h3 class="org-head"><span>Contact Me Here</span></h3>
                                                    <div class="home-contact">
                                                        <p><i class="icon-phone"></i><?php echo ($data->phone); ?></p>
                                                        <p><i class="icon-home"></i><?php echo ($data->address); ?></p>
                                                        <p><i class="icon-bell"></i><a href=""><?php echo ($data->email); ?></a></p>
                                                        <p><i class="icon-globe"></i><a href=""></a><?php echo ($data->work); ?></p>
                                                        <p><i class="icon-download-alt"></i><a href=""><?php echo ($data->name); ?></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            
                                        </div>
                                    </div>
                                    <div id="web" class="page">
                                        <div class="content-wrap">
                                            <div class="columns six">
                                                <div class="content-pad">
                                                    <h2>My Skills</h2>
                                                    <div class="skills">
                                                    <p>Web Design</p>
                                                    <div class="skill_bg"><div class="skill1 skill_hover"></div></div>
                                                    <p>Graphic Design</p>
                                                    <div class="skill_bg"><div class="skill2 skill_hover"></div></div>
                                                    <p>Branding</p>
                                                    <div class="skill_bg"><div class="skill3 skill_hover"></div></div>
                                                    <p>3D Models</p>
                                                    <div class="skill_bg"><div class="skill4 skill_hover"></div></div>
                                                    <p>Illustration</p>
                                                    <div class="skill_bg"><div class="skill5 skill_hover"></div></div>
                                                    <p>Photography</p>
                                                    <div class="skill_bg"><div class="skill6 skill_hover"></div></div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="columns five">
                                                <div class="content-pad">
                                                    <h2>My Experience</h2>
                                                    <div class="experience-wrap">
                                                        <div class="exp-text">
                                                            <div class="bracket-box">{</div>
                                                            <h3>Web Designer/Developer <span>MMLINKS, Inc. From ( 2014 - 2015)</span></h3>
                                                            <p><?php echo ($data->name); ?></p>
                                                        </div>
                                                        <div class="exp-text">
                                                            <div class="bracket-box">{</div>
                                                            <h3>Developer <span>MMLINKS, Inc. From ( 2014 - 2015)</span></h3>
                                                            <p><?php echo ($data->work); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>                    
                                        </div>
                                    </div>
                                    <div id="about" class="page">                                        
                                        <div class="content-pad">
                                            <h2>My Portfolio</h2>
                                            <!-- Category Filter -->
                                            <dl class="group">
                                                <dd>
                                                    <ul class="filter group"> 
                                                        <li class="current all"><a href=""><span>All</span></a></li> 
                                                        <li class="web"><a href=""><span>Web Design</span></a></li> 
                                                        <li class="graphic"><a href=""><span>Graphic Design</span></a></li> 
                                                        <li class="branding"><a href=""><span>Branding</span></a></li> 
                                                        <li class="illustration"><a href=""><span>Illustration</span></a></li>
                                                    </ul> 
                                                </dd>
                                            </dl>
                                            <div class="clearfix"></div>
                                            <!-- Portfolio Items -->
                                            <ul class="portfolio group"> 
                                                <li class="item" data-id="id-1" data-type="graphic">
                                                    <a href="../img/portfolio_img1.jpg" rel="prettyPhoto[portfolio]">
                                                        <img src="../img/portfolio_img1.jpg" width="210" height="130" alt="Yulia Gorbachenko, Hannah 1" />
                                                    </a>
                                                    <h3>Vestibulum Ante <span>Web Design</span></h3>
                                                </li> 
                                                <li class="item" data-id="id-2" data-type="branding">
                                                    <a href="../img/portfolio_img2.jpg" rel="prettyPhoto[portfolio]">
                                                        <img src="../img/portfolio_img2.jpg" width="210" height="130" alt="Yulia Gorbachenko, Hair 1" />
                                                    </a>
                                                    <h3>Vestibulum Ante <span>Web Design</span></h3>
                                                </li>
                                                <li class="item" data-id="id-3" data-type="web">
                                                    <a href="../img/portfolio_img3.jpg" rel="prettyPhoto[portfolio]">
                                                        <img src="../img/portfolio_img3.jpg" width="210" height="130" alt="Yulia Gorbachenko, Hair 2" />
                                                    </a>
                                                    <h3>Vestibulum Ante <span>Web Design</span></h3>
                                                </li>
                                                <li class="item" data-id="id-4" data-type="graphic">
                                                    <a href="../img/portfolio_img4.jpg" rel="prettyPhoto[portfolio]">
                                                        <img src="../img/portfolio_img4.jpg" width="210" height="130" alt="Yulia Gorbachenko, Traction 1" />
                                                    </a>
                                                    <h3>Vestibulum Ante <span>Web Design</span></h3>
                                                </li>
                                                <li class="item" data-id="id-5" data-type="web">
                                                    <a href="../img/portfolio_img5.jpg" rel="prettyPhoto[portfolio]">
                                                        <img src="../img/portfolio_img5.jpg" width="210" height="130" alt="Yulia Gorbachenko, Traction 1" />
                                                    </a>
                                                    <h3>Vestibulum Ante <span>Web Design</span></h3>
                                                </li>
                                                <li class="item" data-id="id-6" data-type="graphic">
                                                    <a href="../img/portfolio_img6.jpg" rel="prettyPhoto[portfolio]">
                                                        <img src="../img/portfolio_img6.jpg" width="210" height="130" alt="Yulia Gorbachenko, Beauty 2" />
                                                    </a>
                                                    <h3>Vestibulum Ante <span>Web Design</span></h3>
                                                </li>
                                                <li class="item" data-id="id-7" data-type="illustration">
                                                    <a href="../img/portfolio_img1.jpg" rel="prettyPhoto[portfolio]">
                                                        <img src="../img/portfolio_img1.jpg" width="210" height="130" alt="Yulia Gorbachenko, Wavelength 1" />
                                                    </a>
                                                    <h3>Vestibulum Ante <span>Web Design</span></h3>
                                                </li>
                                                <li class="item" data-id="id-8" data-type="web">
                                                    <a href="../img/portfolio_img2.jpg" rel="prettyPhoto[portfolio]">
                                                        <img src="../img/portfolio_img2.jpg" width="210" height="130" alt="Yulia Gorbachenko, On Fire 1" />
                                                    </a>
                                                    <h3>Vestibulum Ante <span>Web Design</span></h3>
                                                </li>
                                                <li class="item" data-id="id-9" data-type="branding">
                                                    <a href="../img/portfolio_img3.jpg" rel="prettyPhoto[portfolio]">
                                                        <img src="../img/portfolio_img3.jpg" width="210" height="130" alt="Yulia Gorbachenko, On Fire 2" />
                                                    </a>
                                                    <h3>Vestibulum Ante <span>Web Design</span></h3>
                                                </li>
                                                <li class="item" data-id="id-10" data-type="illustration">
                                                    <a href="../img/portfolio_img4.jpg" rel="prettyPhoto[portfolio]">
                                                        <img src="../img/portfolio_img4.jpg" width="210" height="130" alt="Yulia Gorbachenko, Hair 3" />
                                                    </a>
                                                    <h3>Vestibulum Ante <span>Web Design</span></h3>
                                                </li>
                                                <li class="item" data-id="id-11" data-type="branding">
                                                    <a href="../img/portfolio_img5.jpg" rel="prettyPhoto[portfolio]">
                                                        <img src="../img/portfolio_img5.jpg" width="210" height="130" alt="Yulia Gorbachenko, On Fire 3" />
                                                    </a>
                                                    <h3>Vestibulum Ante <span>Web Design</span></h3>
                                                </li>
                                                <li class="item" data-id="id-12" data-type="illustration">
                                                    <a href="../img/portfolio_img6.jpg" rel="prettyPhoto[portfolio]">
                                                        <img src="../img/portfolio_img6.jpg" width="210" height="130" alt="Yulia Gorbachenko, Wavelength 2" />
                                                    </a>
                                                    <h3>MMLINKS <span>Web Design</span></h3>
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                            <div class="clearfix">&nbsp;</div>
                                        </div>
                                    </div>
                                 
                                     <div id="contact" class="page">
                                            <div class="columns seven">
                                                <h2><span>Contact</span></h2>
                                            </div>
                                            <div class="content-wrap">
                                                <div class="columns six">
                                                    <div class="content-pad">
                                                        <h4 class="grey-head"><span>Say Hello</span></h4>
                                                        <p class="contact-txt">လိုရင္ဖုန္းဆက္လိုက္ပါ</p>
                                                        <div class="form-div">
                                                            <div id="sucessmessage" class="form-row"> </div>
                                                            <form id="contact_form" method="post" action="#" />
                                                                <div class="form-row">
                                                                    <input type="text" placeholder="First Name..." name="name" id="name"/>
                                                                </div>  
                                                                <div class="form-row">
                                                                    <input type="text" name="email" placeholder="Email..." id="email" />
                                                                </div>                              
                                                                <div class="form-row">
                                                                    <input type="text" name="phone" placeholder="Website..." id="phone" />
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="form-row">
                                                                    <textarea name="comment" id="comment" placeholder="Your comments..."></textarea>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="form-row">
                                                                    <input type="submit" class="btn" value="Submit" />
                                                                </div>                                            
                                                            </form>
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="columns five">
                                                    <div class="content-pad">
                                                        <h4 class="grey-head"><span>Contact Info</span></h4>
                                                        <div class="contact-txt">
                                                            <p><span><i class="icon-phone-sign"></i> Phone :</span><?php echo ($data->phone); ?></p>
                                                            <p><span><i class="icon-print"></i> Fax :</span><?php echo ($data->phone); ?></p>
                                                            <p><span><i class="icon-envelope-alt"></i> Email :</span> <a href="#"><?php echo ($data->email); ?></a></p>
                                                            <p><span><i class="icon-home"></i> Address :</span><?php echo ($data->address); ?></p>
                                                        </div>
                                                        
                                                        <div class="contact-map">
                                                                <iframe width="100%" scrolling="no" height="210" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15279.91602965498!2d96.172943!3d16.77772!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x100dd37ca2cc5b55!2sMyanmar+Links!5e0!3m2!1sen!2s!4v1423015139058" marginwidth="0" marginheight="0" class="map"></iframe>
                                                         </div>
                                                    </div>  
                                                </div>
                                                <div class="clearfix">&nbsp;</div>                      
                                            </div>      
                                        </div>
                                 </div>
                            </div>
                        </div>
                    </div>      
                <div class="clearfix"></div>
                <footer>
                    <div class="columns eight">
                        <div class="content-pad">Copyright © 2014-2015 MyanmarLinks Here </div>
                    </div>
                    <div class="columns eight">
                        <div class="powered-by content-pad">Theme by <a target="_blank" href="../home">Students Profile</a></div>
                    </div>
                    <div class="clearfix"></div>
                </footer>
            </div>          
        </div>
        
    </div>
</div>
    <p id="back-top" style="display: block;">
        <a href="#top">&nbsp;</a>
    </p>
</body>
</html>

<?php } ?>