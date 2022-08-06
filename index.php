<?php include("bundle/templates.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head> <?php getHeader(); ?> </head>
    <body ng-app="feedifytech" ng-controller="myUsers">
        <section>
            <header><nav class="navbar navbar-expand-lg navbar-light"><a class="navbar-brand p-3" href="">Feedify<span class="text-light">Tech</span></a></nav></header>
            <div id="welcomehome"><br><br><br><br><br><br>
                <div class="container p-5 mt-5">
                    <div class="row">
                        <div class="col-sm-6"><h1 class="animated zoomInUp mb-5">Welcome to FeedifyTech</h1><a type="button" class="btn subject-content rounded-pill shadow mt-2 mb-5 bg-body rounded" href="courses/mechanical/home">Explore Topics</a><br><button type="button" class="btn bg-light" data-bs-toggle="modal" data-bs-target="#videoModal">Watch Video</button></div>
                        <div class="col-sm-6">
                            <h4 class="animated fadeIn mt-2 mb-5">A platform to compute and compare result efficiently helping you to analyze and learn.</h4>
                            <p class="animated fadeIn">Build it, to achieve it<br>If not started, then get started</p>
                        </div>
                    </div>
                </div><br><br><br><br><br><br>
            </div>
        </section>
        <div ng-show="welcomeUser">
            <section id="secondsection">
                <div class="container p-5">
                    <div class="row">
                        <div class="col-sm-6 text-center mt-5">
                            <svg id="Component_4_1" data-name="Component 4 – 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="203.491" height="443.76" viewBox="0 0 203.491 443.76"><defs><linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox"><stop offset="0" stop-color="#0993fc"/><stop offset="1" stop-color="#16dc79" stop-opacity="0.278"/></linearGradient></defs><g id="Icon_ionic-md-rocket" data-name="Icon ionic-md-rocket" transform="translate(-7.882 -1.125)"><path id="Path_2" data-name="Path 2" d="M18,29.644a7.571,7.571,0,0,1-3.016-.766.547.547,0,0,0-.766.534L14.463,33a.275.275,0,0,0,.443.2l1.02-.773a.278.278,0,0,1,.4.07l1.441,2.257a.276.276,0,0,0,.464,0l1.441-2.257a.278.278,0,0,1,.4-.07l1.02.773a.275.275,0,0,0,.443-.2l.246-3.586a.544.544,0,0,0-.766-.534A7.6,7.6,0,0,1,18,29.644Z" transform="translate(91.503 267.827)" fill="url(#linear-gradient)"/><path id="Path_3" data-name="Path 3" d="M209.656,204.91,175.745,168.8C175.745,52.6,109.9,1.125,109.9,1.125S43.419,52.6,43.419,168.8L9.508,204.91a6.278,6.278,0,0,0-1.554,5.221l13,82.22c.636,4.192,5.016,6.251,8.337,3.971l47.405-33.388s14.624,14.708,33.276,14.708,32.569-14.708,32.569-14.708l47.405,33.388c3.25,2.28,7.63.221,8.337-3.971l13.07-82.293A6.7,6.7,0,0,0,209.656,204.91ZM109.9,130.559c-12.01,0-21.689-10.516-21.689-23.533S97.96,83.492,109.9,83.492c12.01,0,21.689,10.516,21.689,23.533S121.91,130.559,109.9,130.559Z" transform="translate(0 0)" fill="url(#linear-gradient)"/></g><path id="Icon_ionic-md-funnel" data-name="Icon ionic-md-funnel" d="M60.333,117.13H92.014V98.924H60.333ZM2.25,7.875V26.082H150.1V7.875ZM28.651,71.9H123.7v-18.8H28.651Z" transform="translate(25.572 326.629)" fill="rgba(181,236,225,0.5)"/></svg><br>
                        </div>
                        <div class="col-sm-6">
                            <h1 class="mt-5 mb-4"><b>What is FeedifyTech ?</b></h1>
                            <h5>Engineering problems require multiple computations, involving several constraints, and solving these often take a toll on the human brain.<br>FeedifyTech uses optimised algorithms to compute such problems in milliseconds, also providing an accessible platform. Visualising a problem helps in understanding the concepts involved, making it more fascinating.</h5><br><br>
                            <h5 class="intromsg p-5 text-center">FeedifyTech looks great, is easy to access and it assures that you are happy with the product. Your efforts matters the most, so make your effort a game changer.<br><br><footer class="blockquote-footer"><cite title="Source Title">FeedifyTech</cite></h5></footer>
                        </div>
                    </div>
                </div><br><br>
            </section>
            <section id="thirdsection">
                <div class="container p-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="mt-5 mb-4"><b>Features</b></h1>
                            <h4><svg id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><circle id="Ellipse_1" data-name="Ellipse 1" cx="15" cy="15" r="15" fill="#18e964"/><path id="Icon_awesome-chevron-right" data-name="Icon awesome-chevron-right" d="M12.875,11.431,4.632,18.684a1.118,1.118,0,0,1-1.44,0l-.961-.846a.822.822,0,0,1,0-1.265L8.762,10.8,2.23,5.021a.822.822,0,0,1,0-1.265l.961-.846a1.119,1.119,0,0,1,1.44,0l8.243,7.254A.822.822,0,0,1,12.875,11.431Z" transform="translate(7.447 4.203)" fill="#fff" stroke="#fff" stroke-width="1"/></svg>  In hand free virtual books</h4><br>
                            <h4><svg id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><circle id="Ellipse_1" data-name="Ellipse 1" cx="15" cy="15" r="15" fill="#18e964"/><path id="Icon_awesome-chevron-right" data-name="Icon awesome-chevron-right" d="M12.875,11.431,4.632,18.684a1.118,1.118,0,0,1-1.44,0l-.961-.846a.822.822,0,0,1,0-1.265L8.762,10.8,2.23,5.021a.822.822,0,0,1,0-1.265l.961-.846a1.119,1.119,0,0,1,1.44,0l8.243,7.254A.822.822,0,0,1,12.875,11.431Z" transform="translate(7.447 4.203)" fill="#fff" stroke="#fff" stroke-width="1"/></svg>  Computing faster results</h4><br>
                            <h4><svg id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><circle id="Ellipse_1" data-name="Ellipse 1" cx="15" cy="15" r="15" fill="#18e964"/><path id="Icon_awesome-chevron-right" data-name="Icon awesome-chevron-right" d="M12.875,11.431,4.632,18.684a1.118,1.118,0,0,1-1.44,0l-.961-.846a.822.822,0,0,1,0-1.265L8.762,10.8,2.23,5.021a.822.822,0,0,1,0-1.265l.961-.846a1.119,1.119,0,0,1,1.44,0l8.243,7.254A.822.822,0,0,1,12.875,11.431Z" transform="translate(7.447 4.203)" fill="#fff" stroke="#fff" stroke-width="1"/></svg>  360° picture overview</h4><br>
                            <h4><svg id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><circle id="Ellipse_1" data-name="Ellipse 1" cx="15" cy="15" r="15" fill="#18e964"/><path id="Icon_awesome-chevron-right" data-name="Icon awesome-chevron-right" d="M12.875,11.431,4.632,18.684a1.118,1.118,0,0,1-1.44,0l-.961-.846a.822.822,0,0,1,0-1.265L8.762,10.8,2.23,5.021a.822.822,0,0,1,0-1.265l.961-.846a1.119,1.119,0,0,1,1.44,0l8.243,7.254A.822.822,0,0,1,12.875,11.431Z" transform="translate(7.447 4.203)" fill="#fff" stroke="#fff" stroke-width="1"/></svg>  Real time quantitative analysis</h4><br>
                        </div>
                        <div class="col-sm-6 text-center mt-5"><br>
                            <svg id="Component_3_1" data-name="Component 3 – 1" xmlns="http://www.w3.org/2000/svg" width="272.596" height="257.602" viewBox="0 0 272.596 257.602"><path id="Icon_awesome-hand-holding" data-name="Icon awesome-hand-holding" d="M267.517,27.105c-5.584-6.083-14.292-5.685-20.16,0L203.631,69.12A27.15,27.15,0,0,1,184.7,77.079H128.719c-4.164,0-7.572-4.093-7.572-9.1s3.407-9.1,7.572-9.1h37.054c7.524,0,14.528-6.2,15.759-15.123,1.562-11.371-5.726-21.263-14.954-21.263H90.86c-12.777,0-25.129,5.287-35.066,14.952L33.789,58.886H7.572C3.407,58.886,0,62.98,0,67.983v54.579c0,5,3.407,9.1,7.572,9.1H176.42a27.319,27.319,0,0,0,18.929-7.96L266.9,54.907C274.1,48.027,274.663,34.837,267.517,27.105Z" transform="translate(0 125.943)" fill="#d9e6eb"/><path id="Icon_simple-googleanalytics" data-name="Icon simple-googleanalytics" d="M118.646,135.79H10.185C4.579,135.79,0,130.964,0,125.062v-25c0-5.9,4.579-10.727,10.185-10.727H40.742V53.6c0-5.9,4.579-10.716,10.18-10.716H84.951v-32C84.951,4.922,89.622,0,95.292,0h23.359C124.322,0,129,4.922,129,10.9v114C129,130.867,124.322,135.79,118.646,135.79Z" transform="translate(71.799)" fill="#066ee6"/></svg>
                        </div>
                    </div>
                </div><br><br>
            </section>
            <section id="contactsection">
                <div class="container p-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="mt-5 mb-4"><b>Any Message  <svg id="Component_5_1" data-name="Component 5 – 1" xmlns="http://www.w3.org/2000/svg" width="58.146" height="41.888" viewBox="0 0 58.146 41.888"><path id="Icon_awesome-envelope" data-name="Icon awesome-envelope" d="M57.044,18.332a.686.686,0,0,1,1.1.513V41.152a5.348,5.348,0,0,1-5.451,5.236H5.451A5.348,5.348,0,0,1,0,41.152v-22.3a.682.682,0,0,1,1.1-.513c2.544,1.9,5.917,4.309,17.5,12.392,2.4,1.68,6.439,5.214,10.471,5.192,4.054.033,8.177-3.578,10.482-5.192C51.139,22.651,54.5,20.23,57.044,18.332ZM29.073,32.425c2.635.044,6.428-3.185,8.336-4.516C52.479,17.4,53.626,16.488,57.1,13.87a2.574,2.574,0,0,0,1.045-2.062V9.736A5.348,5.348,0,0,0,52.695,4.5H5.451A5.348,5.348,0,0,0,0,9.736v2.073A2.59,2.59,0,0,0,1.045,13.87C4.52,16.477,5.667,17.4,20.737,27.909,22.645,29.24,26.438,32.469,29.073,32.425Z" transform="translate(0 -4.5)"/><path id="Icon_awesome-heart" data-name="Icon awesome-heart" d="M17.256,3.2a5.887,5.887,0,0,0-6.965.421l-.735.628L8.82,3.616A5.886,5.886,0,0,0,1.855,3.2a3.945,3.945,0,0,0-.37,6.43L8.708,15.8a1.344,1.344,0,0,0,1.691,0l7.223-6.18a3.943,3.943,0,0,0-.366-6.43Z" transform="translate(19.518 4.84)" fill="#f01414"/></svg></b></h1>
                            <form method="POST" ng-submit="submitContact()">
                                <input type="hidden" name="token" ng-model="contactData.token" ng-init="contactData.token='<?php echo $_SESSION['_token']; ?>'">
                                <h3 class="card-title mt-2 mb-3">Tell us, What would you like to see more?</h3>
                                <textarea class="form-control" ng-model="contactData.isKama9" rows="9" placeholder="Enter Message"></textarea>
                                    <small ng-show="checkMessage" class="note">{{ checkMessage }}</small><br>
                                <button type="submit" class="btn formulate mt-3 p-3">Submit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                        <div class="col-sm-6 text-center mt-5 text-light"><br><br>
                            <h1>NOTE</h1><h5 class="finalnote mt-5">FeedifyTech helps in computing faster results along with helping in learning and understanding concept listed on it. FeedifyTech looks to save time by giving accurate result thus helping in increasing efficiency. FeedifyTech doesn't charge any money to its user coming on site, so feel free to come on site and use services 😊. You can use it for any amount of data computation, projects helping you things done easily and perfectly.</h5>
                        </div>
                    </div>
                </div><br><br>
            </section>
            <?php getFooter(); ?>
            <!-- Modal -->
            <div class="modal fade" id="subjectModal" tabindex="-1" aria-labelledby="subjectModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="subjectModalLabel">Explore Subjects</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="row">
                                <div class="col-sm-12 mt-5"><a class="btn rounded-circle shadow p-5 mb-5 bg-body subjects" href="courses/mechanical/home"><i class="fas fa-cogs"></i><br><b>Mechanical</b></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel">FeedifyTech Video</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ratio ratio-21x9"><iframe width="560" height="315" src="https://www.youtube.com/embed/RYQMUnhIj94" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    </div>
                </div>
            </div>
        </div>
        <div ng-show="submitMessage">
            <div class="container mt-5">
                <h2>Dear User,</h2>
                <h3 class="bg-dark text-light mt-5 p-5">Your message is sent succesfully <svg xmlns="http://www.w3.org/2000/svg" width="20.943" height="11.608" viewBox="0 0 20.943 11.608"><path id="Icon_ionic-md-done-all" data-name="Icon ionic-md-done-all" d="M15.854,8.877,14.593,7.664l-5.72,5.5,1.261,1.213Zm3.828-1.213L10.134,16.8,6.4,13.208,5.135,14.421l5,4.851,10.809-10.4ZM0,14.421l5.044,4.851,1.261-1.213-5-4.851Z" transform="translate(0 -7.664)" fill="#14dfe4"/></svg><br><br>Regards FeedifyTech.</h3>
                <a class="btn formulate mt-3 p-3" href="https://feedifytech.co.in/"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Go Back</b></a>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    var myApp=angular.module("feedifytech",[]); 
    myApp.controller("myUsers",function ($scope,$http,$window) { $scope.welcomeUser=true;
    $scope.submitContact=function(){ $http({ method:"POST", url:"/asset/usercontact?token=<?php echo $_SESSION['_token'] ?>", data:$scope.contactData }).then(function (response){ var data = response.data; if(data.error){ $scope.checkMessage=data.error.message; } else{ $scope.submitMessage=true; $scope.welcomeUser=false; } }); }; });
</script>

