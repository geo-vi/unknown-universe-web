<div id="page-container">
    <div class="main-story-container">
        <div id="main-story-1" class="story">
            <p>During the third millennium, Earth witnessed massive upheaval</p>
        </div>
        <div id="main-story-2" class="story">
            <p>Not only did the climate change drastically, but the very nature of the planet was slowly and inexorably
               altered</p>
        </div>
        <div id="main-story-3" class="story">
            <p>Human civilization had developed between two ice ages and reached its golden age during this warmer
               period in the Earth's climate</p>
        </div>
        <div id="main-story-4" class="story">
            <p>But the dramatic change in climate forced mankind to seek out new habitats</p>
        </div>
        <div id="main-story-5" class="story">
            <p>Naturally their gaze turned to the stars</p>
        </div>
        <div id="main-story-6" class="story">
            <p>In outer space they found a large abundance of raw materials and were able to establish colonies on
               planets far,
               far away, adapting quickly to the alien conditions
            </p>
        </div>
        <div id="main-story-7" class="story">
            <p>There followed a time of prosperity</p>
        </div>
        <div id="main-story-8" class="story">
            <p> In the end, human nature prevailed:
                Peace was threatened by the formation of three large companies that fought for control of the universe's
                resources
            </p>
        </div>
        <div id="main-story-9" class="story">
            <p>These three mighty companies have been waging war in outer space for centuries now</p>
        </div>
        <div id="main-story-10" class="story">
            <p>The stories you heard growing up inspired you to enroll in the Space Academy and do your bit to end this
               war</p>
        </div>
        <div id="main-story-11" class="story">
            <p>Exploring unknown galaxies and discovering strange space phenomena is what you've always wanted to do</p>
        </div>
        <div id="main-story-12" class="story">
            <p>Now that you've graduated, you can fulfill your dreams and join a company</p>
        </div>
        <div id="main-story-13" class="story">
            <p>Serve your company well and fight bravely for power, energy and resources</p>
        </div>
        <div id="main-story-14" class="story">
            <p>The fate of the universe rests in your hands!</p>
        </div>
    </div>
    <div class="company-choose-container">
        <div class="company-choose-header">
            <h1>it’s time to choose your company, make a wise choice!</h1>
        </div>
        <div class="company-choose-select-container">
            <div class="company-choose-select mmo" data-faction="1" data-story="false">
                <span class="select-header">MARS MINING OPERATIONS</span>
            </div>
            <div class="company-choose-select eic" data-faction="2" data-story="false">
                <span class="select-header">EARTH INDUSTRIES CORPORATIONS</span>
            </div>
            <div class="company-choose-select vru" data-faction="3" data-story="false">
                <span class="select-header">VENUS RESOURCES UNLIMITED</span>
            </div>
        </div>
        <div class="company-story-container">
            <div class="1-story-container">
                <div id="1-story-1" class="company-story">
                    <p>I'm not going to blow smoke up your tush, so I'll just get straight to the point</p>
                </div>
                <div id="1-story-2" class="company-story">
                    <p>We at Mars Mining Operations want you for two reasons:</p>
                    <p>to mine ore and to eradicate all alien scum infecting our galactic sector</p>
                </div>
                <div id="1-story-3" class="company-story">
                    <p>Do this successfully and you'll soon be popping rival pilots for thrills and honor!</p>
                </div>
            </div>
            <div class="2-story-container">
                <div id="2-story-1" class="company-story">
                    <p>Pilot, these are trying times during which only those made of the purest inner steel can
                       prevail!</p>
                </div>
                <div id="2-story-2" class="company-story">
                    <p>How tough is your mettle?</p>
                </div>
                <div id="2-story-3" class="company-story">
                    <p>We reward loyalty and impeccable manners with the best lasers Uridium can buy!</p>
                </div>
                <div id="2-story-4" class="company-story">
                    <p>Join us in the fight to cleanse our sector of all those cretins that stand in our way</p>
                </div>
                <div id="2-story-5" class="company-story">
                    <p>For glory and privilege!</p>
                </div>
            </div>
            <div class="3-story-container">
                <div id="3-story-1" class="company-story">
                    <p>We pride ourselves in our ability to push the envelope of technological advancement, while
                       retaining a communal atmosphere</p>
                </div>
                <div id="3-story-2" class="company-story">
                    <p>Some call us a cult desiring galactic domination, but they simply misunderstand our brilliant
                       recruitment methods</p>
                </div>
                <div id="3-story-3" class="company-story">
                    <p>We are always looking for talented pilots to help us destroy our enemies and shape humanity's
                       future!</p>
                </div>
            </div>
            <div class="join-button-container">
                <div class="join-button">
                    <span>Join Us</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        /* Main Story Script
         *************************/
        var Timer = null;
        var Time = 1;
        var TimePerStory = 8;
        var MinTimePerStory = 0;
        var lastStory = 0;
        var maxStory = $(".main-story-container > .story").length;
        startStory(1);

        function startStory(id) {
            lastStory = id;
            $(".main-story-container > .story").removeClass("visible");
            $(".main-story-container > #main-story-" + id).addClass("visible").animate({
                opacity: 1
            }, 1000, function () {
                waitForMainTimer();
            });
        }

        function waitForMainTimer() {
            Timer = setInterval(TimerMainFunc, 1000);
        }

        function TimerMainFunc() {
            if (Time < TimePerStory) {
                Time = Time + 1;
            } else {
                Time = 1;
                $(".main-story-container > #main-story-" + lastStory).addClass("visible").animate({
                    opacity: 0
                }, 1000);
                clearInterval(Timer);
                if (lastStory < maxStory) {
                    startStory(lastStory + 1);
                } else {
                    showCompanyChoose();
                }
            }
        }

        $("body").click(function () {
            if (Time > MinTimePerStory) {
                Time = 1;
                $(".main-story-container > #main-story-" + lastStory).addClass("visible").animate({
                    opacity: 0
                }, 1000);
                clearInterval(Timer);
                if (lastStory < maxStory) {
                    startStory(lastStory + 1);
                } else {
                    lastStory = 0;
                    showCompanyChoose();
                }
            }
        });

        function showCompanyChoose() {
            $("body").addClass("allow").unbind("click");
            $(".main-story-container").hide();
            $(".company-choose-container").show().animate({
                opacity: 1
            }, 1000);
        }

        /*
            Faction Select / Story tell Javascript
         */
        var inStoryTell = false;
        var FactionLastStory = 0;
        var FactionTimer = null;
        var FactionTimePerStory = 4;
        var FactionTime = 1;
        var Faction = null;
        var FactionMaxStory = null;

        $(".company-choose-select-container > .company-choose-select").click(function () {

            var StoryTold = $(this).data("story");

            if (inStoryTell === false) {
                $(".company-choose-select-container > .company-choose-select").removeClass("selected");

                $(this).addClass("selected");
                Faction = $(this).data("faction");
                if (StoryTold === false) {
                    FactionMaxStory = $(".company-story-container > ." + Faction + "-story-container > div").length;
                    // start Story one for Faction
                    startFactionStory(Faction, 1);
                } else {
                    //show join button (dont tell the story again)
                }
            }
        });

        function startFactionStory(faction, id) {
            inStoryTell = true;
            FactionLastStory = id;
            $(".company-story-container > div").removeClass("visible");
            var FactionStoryContainer = $(".company-story-container > ." + faction + "-story-container ");
            var AllStorys = $(FactionStoryContainer).find("div");
            var Story = $(FactionStoryContainer).find("#" + faction + "-story-" + id + ".company-story");

            //Make all other Storys Not Visible
            $(AllStorys).removeClass("visible");

            //Make Story Visible
            $(Story).addClass("visible").animate({
                opacity: 1
            }, 1000, function () {
                //Wait Read Time
                waitForFactionTimer();
            });

        }

        function waitForFactionTimer() {
            FactionTimer = setInterval(FactionTimerFunc, 1000);
        }

        function FactionTimerFunc() {
            if (FactionTime < FactionTimePerStory) {
                FactionTime = FactionTime + 1;
            } else {
                FactionTime = 1;
                clearInterval(FactionTimer);
                var FactionStoryContainer = $(".company-story-container > ." + Faction + "-story-container ");
                var Story = $(FactionStoryContainer).find("#" + Faction + "-story-" + FactionLastStory + ".company-story");
                var AllStorys = $(FactionStoryContainer).find("div");
                $(Story).animate({
                    opacity: 0
                }, 1000);

                if (FactionLastStory < FactionMaxStory) {
                    startFactionStory(Faction, FactionLastStory + 1);
                } else {
                    inStoryTell = false;
                    //show join button
                    $(AllStorys).removeClass("visible");
                    $(FactionStoryContainer).removeClass("visible");
                    $(".company-choose-select-container > .company-choose-select." + Faction).data("story", true);
                    showJoinUs();
                }

            }
        }

        function showJoinUs() {
            $(".company-story-container > div").removeClass("visible");
            $(".join-button-container").addClass("visible");
        }

        $(".join-button-container").click(function () {
            let params = {
                'FACTION': parseInt(Faction),
            };
            let data = {
                'action': 'choose',
                'handler': 'company',
                'params': JSON.stringify(params)
            };

            $.ajax({
                type: "POST",
                url: './core/ajax/ajax.php',
                data: data,
                cache: false,
                xhrFields: {
                    withCredentials: true
                },
                success: function (resultData) {
                    if (resultData.success === true) {
                        window.location.replace("./internalStart");
                    } else {
                        window.location.replace("./");
                    }
                }
            });
        });
    });
</script>