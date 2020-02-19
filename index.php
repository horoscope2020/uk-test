<?php
$fb = $_GET['sub5'];

if (empty($fb) ) {
    $fb = '0';
}
?>


<!DOCTYPE html>
<html lang="eu" ng-app="Diet" ng-controller="MainCtrl">
<head>
    <title>We know the cause of your death</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Karla|Lato&amp;subset=latin-ext" rel="stylesheet">
    <link href="./css/main.css" rel="stylesheet" type="text/css">

    <!-- Facebook Pixel Code -->
        <script> !function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,'script', 'https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '<?php echo $fb; ?>'); fbq('track', 'PageView'); </script>
    <!-- End Facebook Pixel Code -->

</head>
<body ng-cloak ng-class="{'desktop-bg':!landing, 'no-bg': showUserResult}">
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo $fb; ?>&ev=PageView&noscript=1" /></noscript>

<div class="main-page" id="main-page">
    <header class="header">
        <div class="logo">
            <img src="./img/logo.png" alt="" class="regular-logo">
            <p>We know the cause<br>of your death</p>
            <div class="header-menu">
                <span class="header-menu-item"></span>
                <span class="header-menu-item"></span>
                <span class="header-menu-item"></span>
            </div>

        </div>

    </header>
    <div id="landing" ng-show="landing">
        <div class="main-bg">
            <h1>
                All of us must die some day <br> Do you want to know<br>the cause and the<br>date of your death?
            </h1>
            <div class="main-image">
                <img src="img/main-bg.jpg" alt="">
            </div>
            <div class="descr">
                <p class="text-desc">Don’t be afraid of death! Answer several questions and find out everything. The cause will help you to understand how you can change your life today.</p>
            </div>
            <div class="footer-bg">
                <div class="gender-description">
                    Please, identify your gender:
                </div>
                <div class="gender-buttons">
                    <button class="btn btn-female" ng-click="startQuestion()">
                        Female
                    </button>
                    <button class="btn btn-male" ng-click="startQuestion()">
                        Male
                    </button>
                </div>
                <div class="row">
                    <div class="col-12 copyright">
                        <p>BY ANSWERING THE QUESTIONS, YOU AGREE TO THE DATA COLLECTION.</p>
                        <p>© 2019. ABC Mobile OÜ</p>
                        <p>SEE OUR <a href="./terms.php">TERMS AND CONDITIONS</a> AND <a href="./privacy.php">PRIVACY POLICY</a></p>
                        <p>2018-{{currentYear}} © Find out the date and the cause of your death!</p>
                        <p>We know the cause of your death!</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="desktop-container" ng-class="{'desktop-container': showQuestion}" class="main-bg">
        <div class="main-image-steps" ng-show="showQuestion">
            <img src="img/main-bg.jpg" alt="">
        </div>
        <nav class="mainNavbar navbar navbar-expand-lg" ng-show="showQuestion">
            <div class="container">
                <img src="./img/back.svg" alt="Back" class="btn-back" ng-click="prevQuestion()">
                <div class="navbar-brand">
                    <img src="./img/logo.png" alt="" class="regular-logo">
                </div>
            </div>
        </nav>
        <div class="subheader" ng-show="showQuestion">
            <div class="progress-bar">
                <div id="progress" class="progress"></div>
            </div>
        </div>
        <div class="container" ng-show="showQuestion">
            <div ng-hide="currentIndex === questionList.length" id="step-{{$index+1}}" class="step" ng-class="{'active' : currentIndex === $index}" ng-repeat="q in questionList track by $index">
                <div class="question" ng-bind-html="q.question"></div>
                <div class="question-description" ng-if="q.hint" ng-bind-html="q.hint"></div>
                <div ng-class="q.type === 'checkbox' ? 'fancy-checkbox-holder' : 'fancy-radio-holder'">
                    <div class="fancy-radio fancy-radio-{{a.id}}" ng-repeat="a in q.answers track by a.id" ng-class="{'active':a.active, 'with-icon':a.img}" ng-click="checkAnswer(q.answers, q.type)">
                        <div class="icon" ng-if="a.img">
                            <img ng-src="./img/{{a.img}}" class="svg" alt="{{a.answer}}">
                        </div>
                        {{a.answer}}
                        <div class="status">
                            <div class="status-icon">{{a.active ? '+' : '-'}}</div>
                        </div>
                    </div>
                </div>
                <div class="zodiak-form" ng-if="q.type === 'date'">
                    <form name="questionForm" class="form"  novalidate>
                        <div class="form-group">
                            <div class="form-group-inline">
                                <select name="day" ng-class="{'is-invalid': questionForm.day.$error.required && questionForm.$submitted }" required="" class="custom-select select-day" ng-change="formChange(this)" ng-model="day">
                                    <option value="">Day</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                            <div class="form-group-inline">
                                <select name="month" ng-class="{'is-invalid': questionForm.month.$error.required && questionForm.$submitted }" required="" class="custom-select select-month" ng-change="formChange(this)" ng-model="month">
                                    <option value="">Month</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="form-group-inline year">
                                <select name="year" ng-class="{'is-invalid': questionForm.year.$error.required && questionForm.$submitted }" class="custom-select select-year" required="" ng-change="formChange(this)" ng-model="year" >
                                    <option value="">Year</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="zodiak-form-img">
                        <img ng-src="img/zodiak/{{zodiaks[zodiak - 1].img}}" alt="">
                        <p ng-bind-html="zodiaks[zodiak - 1].name"></p>
                    </div>
                </div>
                <div class="alert alert-danger" ng-show="errorMessage" ng-bind-html="errorMessage"></div>
                <button class="btn btn-primary btn-next-step btn-next-step-{{$index + 1}}" ng-click="nextQuestion(q)">Next</button>
            </div>
        </div>
        <div id="step-8" class="step results active" ng-show="showUserResult">
            <div class="summary-container">
                <div class="container">
                    <div class="result-desc">
                        <p class="text-desc">Thank you for your answers.</p>
                        <div class="main-image">
                            <img src="img/main-bg.jpg" alt="">
                        </div>
                        <h3 class="animated pulse infinite">Congratulation! Audio message is available for you on this phone number:<br>
                            <a href="tel:+449023128028" onclick="fbq('track', 'Lead'); return true;">+449023128028</a>
                        </h3>
                        <p class="subheading">
                            <span>Attention! </span> <br>
                            You must listen to the audio message to understand how you should change your life to live it fully and without regretting the missed opportunities. Access to the voice message is open for 10 minutes for the city – <span>{{city}}</span>. If you don’t scare, find out what awaits you!
                        </p>

                    </div>
                    <a href="tel:+449023128028" onclick="fbq('track', 'Lead'); return true;" class="btn btn-primary scroll-btn call-button">
                        <img src="img/button-call.png" alt=""  class="">
                        Listen to the message
                    </a>
                    <div class="footer-container container footer-bg" id="summary-footer" resize>
                        <div class="row">
                            <a href="tel:+449023128028" onclick="fbq('track', 'Lead'); return true;" class="btn btn-primary scroll-btn call-button">
                                <img src="img/button-call.png" alt=""  class="">
                                Listen to the message
                            </a>
                            <div class="col-12 copyright" id="footer">
                                <p class="button-rules">Calls cost <b>£3/call</b> +  <b>£3/min</b>, calls recorded, for entertainment only 18+.</p>
                                <p class="button-rules">Customer care support@abcmobile.com</p>
                                <p class="button-rules">© 2020. ABC Mobile OÜ</p>
                                <p class="button-rules">Harju maakond, Tallinn, Peterburi tee 71-318, 11415, Estonia.</p>
                                <p class="button-rules">See our <a href="./terms.php">Terms and Conditions</a>  and <a href="./privacy.php">Privacy Policy</a></p>
                                <p class="button-rules">Affiliate: mobstra.com</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="loading-modal loading-modal-bg" ng-class="{'fadeIn animated':loading}" ng-show="loading">
        <div class="loading-modal-container">
            <div class="load-modal">
                <div class="load-modal-header">
                    <h4>Calculation of the results</h4>
                    <div class="load-modal-bar">
                        <div class="bar" ng-style="{width: loadingWidth + '%'}" ng-bind-html="loadingWidth + '%'"></div>
                    </div>

                </div>
                <div class="load-modal-progress">
                    <p ng-if="loadingWidth > 0">Calculation of the answer options . . . . . . . <span ng-if="loadingWidth > 10">Completed!</span></p>
                    <p ng-if="loadingWidth > 33">Prediction generation . . . . . . . <span ng-if="loadingWidth > 30">Completed!</span></p>
                    <p ng-if="loadingWidth > 66">Saving the result . . . . . . . <span ng-if="loadingWidth > 99">Completed!</span></p>
                    <p ng-if="loadingWidth > 99" class="done">The result is ready!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="./js/main.js"></script>
</body>
</html>