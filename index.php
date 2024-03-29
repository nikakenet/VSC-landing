<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vegas Strip Casino | 25 Free Spins</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <div class="top-bar">
            <div class="section-inner">
                <div class="nav">
                    <div class="logo-container">
                        <a href="#">
                            <img src="img/logo.png">
                        </a>
                    </div>

                    <div class="login-register-container">
                        <a href="https://www.vegasstripcasino.com/?login">
                            <button class="login-button bold">LOGIN</button>
                        </a>
                        <a href="https://www.vegasstripcasino.com/signup/">
                            <button class="register-button bold">REGISTER</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-inner">
            <div class="promo-container">
                <h1 class="promo-heading bold">
                    THE JACKPOT COULD BE YOURS WITH
                </h1>
                <img src="img/25-free-spins.png" alt="25 FREE SPINS">
                <div>

                    <!-- coupon start -->
                    <div class="RowBoxCode code1">
                        <div class="BoxCode" id="BoxCode-1">SLOTS777</div>
                        <div class="BtnCopy" id="BoxCodeButton-1" data-clipboard-text="SLOTS777">COPY COUPON</div>
                    </div>
                    <!-- coupon end -->

                    <div class="start">
                        <a href="https://www.vegasstripcasino.com/signup/?bonuscode=SLOTS777">
                            <img src="img/1-btn.png" alt="GET STARTED">
                        </a>
                    </div>

                    <p class="caption">*Bonus available for new players only </p>
                </div>
            </div>
        </div>
    </header>

    <!-- steps start -->
    <div class="section-inner">
        <div class="steps-block">
            <div class="steps-item">
                <div>
                    <img class="number" src="img/1-number.png" alt="1">
                </div>
                <div class="steps-desc">
                    <p class="steps-hl bold">Create account</p>
                    <p class="steps-shl">Register your account with us</p>
                </div>
            </div>

            <div class="steps-item">
                <div>
                    <img class="number" src="img/2-number.png" alt="2">
                </div>
                <div class="steps-desc">
                    <p class="steps-hl bold">Deposit and get your bonus</p>
                    <p class="steps-shl">Redeem your coupon code at Cashier</p>
                </div>
            </div>

            <div class="steps-item">
                <div>
                    <img class="number" src="img/3-number.png" alt="3">
                </div>
                <div class="steps-desc">
                    <p class="steps-hl bold">Start having fun</p>
                    <p class="steps-shl">Choose from 280+ casino games</p>
                </div>
            </div>
        </div>
    </div>
    <!-- steps end -->

    <div class="body-offers">
        <div class="section-games section-inner">
            <div class="popular-slots section-game bold">
                <p>POPULAR SLOTS</p>
                <div class="category-image">
                    <img src="img/popular-slots.png" alt="Popular Slots">
                </div>
            </div>

            <div class="today-jackpot section-game bold">
                <p>TODAY'S JACKPOT</p>
                <a href="https://www.vegasstripcasino.com/webplay/?play=[777]">
                    <div class="category-image jackpot-container">
                        <!-- jackpot -->
                        <div class="jackpot jackpot-position">
                            <div class="jackpot-counter">
                                <span></span>
                            </div>
                        </div>
                        <!-- jackpot -->
                        <img src="img/slot-frame.png">
                    </div>
                </a>
            </div>

            <div class="table-games section-game bold">
                <p>TABLE GAMES</p>
                <div class="category-image">
                    <img style="padding: 5px 0 0 0;" src="img/table-games.png" alt="Table Games">
                </div>
            </div>
        </div>
    </div>

    <!--START NEW TERMS AMM-->
    <div class="terms">
        <div class="animation-element bounce-up">
            <div id="BarFooterTerms" class="subject photography">
                <div id="BoxButtonTerms">
                    <div id="ButtonTerms" class="Transition">BONUS TERMS</div>
                </div>
                <footer id="BoxTerms">
                    SLOTS777 bonus is good for slots & keno only. Spins come with a $100 maximum cashout and
                    can be redeemed 1x per player. Bonus amount is considered non-cashable and will be removed from
                    the amount of your withdrawal request. Bonus Spins will be credited automatically upon redemption of
                    coupon code.
                    You must play all of the Spins before moving on to another game. Bonus Spins come with 5x additional
                    wagering
                    requirements. No multiple accounts or chip redemptions in a row. Unless noted, standard rules apply.

                </footer>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
    <script type="text/javascript" src='js/counter.js'></script>
    <script type="text/javascript" src='js/tweenmax.min.js'></script>
    <script type="text/javascript" src='js/coupon.js'></script>
    <script src="js/terms_behaviors.js" charset="utf-8"></script>
    <script src="js/index.js"></script>
    <!--END NEW TERMS AMM-->

    <!-- Counter [start] -->
    <script type="text/javascript">
        $(document).ready(function () {
            if ($(".jackpot-counter").length)
                $.ajax({
                    url: "./php/getjackpot.php",
                    method: 'POST',
                    async: true,
                    cache: false,
                    processData: false,
                    success: function (result) {
                        result = parseFloat(result);
                        result = result.formatMoney(2, '.', ',').toString();

                        var cleanFloat = result.split(',').join('');
                        initial_jackpot =
                            cleanFloat; // setting global to not to parse it from html later on.
                        var formatted = RotatingCounter.format(result);
                        $(".jackpot-counter").children('span').html(formatted);
                        RotatingCounter.start();
                        $('.jackpot-counter').slideDown();
                    },
                });
        });
    </script>
    <!-- Counter [end] -->

    <?php require_once($_SERVER['DOCUMENT_ROOT']."/include/js_add-aff-links.php"); ?>

</body>

</html>