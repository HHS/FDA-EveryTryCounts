<main>
    <div class="container" id="app">
        <div class="row somethingNew">
            <div class="col-lg-4 col-md-5 col-sm-12">
                <h2>TRY A TEXT PROGRAM TO QUIT</h2>
                <p>Try a text message program that fits where you are in your quit journey. You’ll receive texts with tips and encouragement to keep you on track.</p>
                <p>You haven’t failed if you keep trying.</p>
            </div> <!-- /.col-lg-5 /.col-md-6 /.col-sm-12 -->
            <div class="col-lg-7 col-lg-offset-1 col-md-7 col-sm-12">
                <div class="programs">
                    <p class="subhead">HOW DO YOU FEEL ABOUT QUITTING TODAY?</p>
                    <p id="choose-one-text" class="choose-one">Choose <span class="circle">1</span> of our text message programs to help you quit</p>

                    <!-- Try Daily Challenges overlay box -->
                    <transition name="slidetoggle">
                        <div class="programBox" id="programChallenge" v-if="show_program_challenge" v-cloak>
                            <button class="titleArea active" id="programChallengeClose" v-on:click="show_program_challenge = !show_program_challenge"><h3>TRY DAILY CHALLENGES</h3></button>
                            <div class="programContent">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="program-paragraph">Get a new challenge at 9 a.m. every day for a week to build skills that will help you quit later.</p>
                                    </div> <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <button class="btn btn-small" v-if="!btn_sm_1_example" v-on:click="btn_sm_1_example = !btn_sm_1_example">See Sample Message</button>
                                        <button class="btn btn-small" v-if="btn_sm_1_example" v-on:click="btn_sm_1_example = !btn_sm_1_example">Close Sample Message</button>

                                    </div> <!-- /.col-md-6 -->
                                </div>
                                <p class="example" v-if="btn_sm_1_example">Try to resist 2 cigarette cravings today for 10 minutes each. Go for a walk or call someone. Cravings usually last only 5 to 10 minutes.</p>
                                <div class="input-group" v-if="show_program_challenge_submit==true">
                                    <input class="form-control" maxlength="11" placeholder="Phone Number" v-model="program_challenge_phone" v-validate.initial="'numeric'" v-bind:class="{'input': true, 'is-danger': errors.has('programchallengephone') }" id="programchallengephone" name="programchallengephone" />
                                    <span v-show="errors.has('programchallengephone')" class="help is-danger">{{ errors.first('programchallengephone') }}</span>
                                    <span class="input-group-btn">
                                <button id="start-now-daily-challenges" class="btn btn-signup" type="button" onclick="makeFloodlightTagCall('DC-4345482/CTP/posev000+standard')" v-on:click="errors.has('programchallengephone') ? null : send_text_signup(program_challenge_opt_in_path, program_challenge_phone);">Start Now</button>
                        </span>
                                </div> <!-- /.input-group -->
                                <div class="text_confirmation" v-else v-html="program_challenge_confirmation">
                                </div>
                                <p class="unsubscribe">To unsubscribe text STOP to 47848</p>
                            </div> <!-- /.programContent -->
                        </div> <!-- /.programBox /#programChallenge -->
                    </transition>

                    <!-- Try Practice Quitting overlay box -->
                    <transition name="slidetoggle">
                        <div class="programBox" id="programPractice" v-if="show_program_practice" v-cloak>
                            <button class="titleArea active" id="programPracticeClose" v-on:click="show_program_practice = !show_program_practice"><h3>TRY A PRACTICE QUIT</h3></button>
                            <div class="programContent">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="program-paragraph">Practice quitting for 1, 3, or 5 days at a time and build up to quitting for good.</p>
                                    </div> <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <button class="btn btn-small" v-if="!btn_sm_2_example" v-on:click="btn_sm_2_example = !btn_sm_2_example">See Sample Message</button>
                                        <button class="btn btn-small" v-if="btn_sm_2_example" v-on:click="btn_sm_2_example = !btn_sm_2_example">Close Sample Message</button>

                                    </div> <!-- /.col-md-6 -->
                                </div>
                                <p class="example" v-if="btn_sm_2_example">You're 24 hours into your practice! That is a MAJOR milestone! Be sure to reward yourself. Say, do, or get something nice to celebrate your success.</p>
                                <div class="input-group" v-if="show_program_practice_submit==true">
                                    <input type="text" class="form-control" maxlength="11" placeholder="Phone Number" v-model="program_practice_phone" v-validate.initial="'numeric'" v-bind:class="{'input': true, 'is-danger': errors.has('programpracticephone') }" id="programpracticephone" name="programpracticephone" />
                                    <span v-show="errors.has('programpracticephone')" class="help is-danger">{{ errors.first('programpracticephone') }}</span>
                                    <span class="input-group-btn">
                                <button id="start-now-practice-quitting" class="btn btn-signup" type="button" onclick="makeFloodlightTagCall('DC-4345482/CTP/posev002+standard')" v-on:click="errors.has('programpracticephone') ? null : send_text_signup(program_practice_opt_in_path, program_practice_phone);">Start Now</button>
                        </span>
                                </div> <!-- /.input-group -->
                                <div class="text_confirmation" v-else v-html="program_practice_confirmation">
                                </div>
                                <p class="unsubscribe">To unsubscribe text STOP to 47848</p>
                            </div> <!-- /.programContent -->
                        </div> <!-- /.programBox /#programPractive -->
                    </transition>

                    <!-- Try Quit for Good overlay box -->
                    <transition name="slidetoggle">
                        <div class="programBox" id="programQuit" v-if="show_program_quit" v-cloak>
                            <button class="titleArea active" id="programQuitClose" v-on:click="show_program_quit = !show_program_quit"><h3>TRY SMOKEFREETXT</h3></button>
                            <div class="programContent">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="program-paragraph">Become — and stay — smokefree with 6-8 weeks of support. Set a quit date up to two weeks in advance to help you get prepared.</p>
                                    </div> <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <button class="btn btn-small" v-if="!btn_sm_3_example" v-on:click="btn_sm_3_example = !btn_sm_3_example">See Sample Message</button>
                                        <button class="btn btn-small" v-if="btn_sm_3_example" v-on:click="btn_sm_3_example = !btn_sm_3_example">Close Sample Message</button>

                                    </div> <!-- /.col-md-6 -->
                                </div>
                                <p class="example" v-if="btn_sm_3_example">Cravings will get weaker and less frequent with every day that you don't smoke. What's your craving level? Reply: HI, MED, or LOW</p>
                                <div class="input-group" v-if="show_program_quit_submit==true">
                                    <input type="text" class="form-control" maxlength="11" placeholder="Phone Number" v-model="program_quit_phone" v-validate.initial="'numeric'" v-bind:class="{'input': true, 'is-danger': errors.has('programquitphone') }" id="programquitphone" name="programquitphone" />
                                    <span v-show="errors.has('programquitphone')" class="help is-danger">{{ errors.first('programquitphone') }}</span>
                                    <span class="input-group-btn">
                                <button id="start-now-quit-for-good" class="btn btn-signup" type="button" onclick="makeFloodlightTagCall('DC-4345482/CTP/posev004+standard')" v-on:click="errors.has('programquitphone') ? null : send_text_signup(program_quit_opt_in_path, program_quit_phone);">Start Now</button>
                        </span>
                                </div> <!-- /.input-group -->
                                <div class="text_confirmation" v-else v-html="program_quit_confirmation">
                                </div>
                                <p class="unsubscribe">To unsubscribe text STOP to 47848</p>
                            </div> <!-- /.programContent -->
                        </div> <!-- /.programBox /#programQuit -->
                    </transition>

                    <button class="btn try-something-new-btn" id="programChallengeButton" onclick="makeFloodlightTagCall('DC-4345482/CTP/posev00+standard')" v-on:click="show_program_challenge = !show_program_challenge"><div class="arrow hidden-xs"></div><span class="btn-emphasis">I WANT TO TRY A SMALL STEP</span><br>Help me build skills to try quitting</button>
                    <button class="btn try-something-new-btn" id="programPracticeButton" onclick="makeFloodlightTagCall('DC-4345482/CTP/posev001+standard')" v-on:click="show_program_practice = !show_program_practice"><div class="arrow hidden-xs"></div><span class="btn-emphasis">I Want to Practice Quitting</span><br>Try it for a few days</button>
                    <button class="btn try-something-new-btn" id="programQuitButton" onclick="makeFloodlightTagCall('DC-4345482/CTP/posev003+standard')" v-on:click="show_program_quit = !show_program_quit"><div class="arrow hidden-xs"></div><span class="btn-emphasis">I’m Ready to Quit for Good</span><br>Set a quit date</button>

                </div> <!-- /.programs -->
            </div> <!-- /.col-lg-6 /.col-lg-offset-1 /.col-md-6 /.col-sm-12 -->
        </div> <!-- /.row /.somethingNew-->

        <div class="row video">
            <div class="topShadow"></div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <h2>QUITTING SMOKING TAKES PRACTICE</h2>
            </div>
            <div class="col-lg-8 col-lg-offset-1 col-md-7 col-md-offset-1 col-sm-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MBdUZYuoEiw?rel=0"></iframe>
                </div>
            </div>
        </div>
        <div class="row tips">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <h2>Deal With Cravings</h2>
                <p>Cravings can make quitting hard, but these urges are temporary and they will pass. It might be uncomfortable, but you can get through cravings with these tips.</p>
            </div> <!-- /.col-lg-5 /.col-md-6 /.col-sm-12 -->
            <div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-12">
                <p class="bold">FIGHT CRAVINGS WITH THESE TIPS</p>
                <div class="box grayBox" v-cloak>
                    <div class="text-right" id="tipTicker">
                        TIP <span id="tipCurrent">{{current_crave_tip_number}}</span>/<span id="tipTotal">{{total_crave_tips}}</span>
                    </div> <!-- /#tipTicker -->

                    <div id="carousel-tips" class="carousel slide">
                        <!-- Wrapper for slides -->
                        <transition-group
                                name="custom-transition-3"
                                enter-active-class="animated fadeInRight"
                                leave-active-class="animated fadeOutLeft"
                                tag="div"
                                class="transition"
                        >
                            <div class="carousel-inner" role="listbox" v-for="tip, index in all_crave_tips" v-show="index == current_crave_tip_number - 1" v-bind:key="'slide_' + index">
                                <div class="item active">
                                    <img v-bind:src="tip.node.field_crave_tip_image.src"  v-bind:alt="tip.node.field_crave_tip_image.alt" />
                                </div>
                            </div> <!-- /.carousel-inner -->
                        </transition-group>
                        <!-- Controls -->
                        <a class="left carousel-control" v-bind:class="'current_tip_' + current_crave_tip_number" href="#carousel-tips" role="button" v-on:click.prevent="previous_crave_tip" >
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" v-bind:class="'current_tip_' + current_crave_tip_number" href="#carousel-tips" role="button" v-on:click.prevent="next_crave_tip">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div> <!-- /.carousel -->

                    <p class="tipContent" v-for="tip, index in all_crave_tips" v-if="index == current_crave_tip_number - 1">{{tip.node.field_crave_tip_description}}</p>
                </div> <!-- /.box /.grayBox -->
            </div> <!-- /.col-lg-6 /.col-lg-offset-1 /.col-md-6 /.col-sm-12 -->
        </div> <!-- /.row /.tips -->

        <div class="row challenges">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h2>QUIT WITH NICOTINE REPLACEMENT THERAPY</h2>
                <p>Nicotine Replacement Therapy (NRT)—like nicotine patches, gum, and lozenges—can double your chances of quitting for good. Experts say NRTs are one of the most helpful tools smokers can use to quit, and research has shown that they are safe and effective.</p>
            </div> <!-- /.col-lg-6 /.col-md-6 /.col-sm-12 -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div id="flipCard" v-cloak>
                    <transition-group
                            name="custom-transition-2"
                            enter-class="flipped"
                            leave-active-class="hidden"
                    >
                        <div class="card" v-for="challenge, index in all_daily_challenges" v-if="index == current_daily_challenge_number - 1" v-bind:key="index + '_challenge'">
                            <div class="front">
                                <div class="text-right challengeTicker">
                                    NRT Facts <span class="challengeCurrent">{{ current_daily_challenge_number }}</span>/<span class="challengeTotal">{{ total_daily_challenges }}</span>
                                </div> <!-- /#tipTicker -->
                                <div class="challengeTitle">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3>{{ challenge.node.title }}</h3>
                                        </div> <!-- /.col-lg-12 -->
                                    </div> <!-- /.row -->
                                </div> <!-- /.challengeTitle -->
                                <p class="challengeContent">{{ challenge.node.body }}</p>
                                <button v-bind:class="'btn btn-challenge current_challenge_' + current_daily_challenge_number" onclick="makeFloodlightTagCall('DC-4345482/CTP/posev005+standard')" v-on:click="next_daily_challenge">{{ daily_challenge_next_button_text }}</button>
                            </div> <!-- /.front -->
                            <div class="back">
                                <div class="text-right challengeTicker">
                                    NRT Facts <span class="challengeCurrent">{{ current_daily_challenge_number }}</span>/<span class="challengeTotal">{{ total_daily_challenges }}</span>
                                </div> <!-- /#tipTicker -->
                                <div class="challengeTitle">
                                    <h3>{{ challenge.node.title }}</h3>
                                </div> <!-- /.challengeTitle -->
                                <p class="challengeContent">{{ challenge.node.body }}</p>
                                <button class="btn btn-challenge" v-on:click="next_daily_challenge">{{ daily_challenge_next_button_text }}</button>
                            </div> <!-- /.back -->
                        </div> <!-- /.card -->
                    </transition-group>
                </div> <!-- /#flipCard -->
            </div> <!-- /.col-lg-6 /.col-md-6 /.col-sm-12 -->
        </div> <!-- /.row /.challenges -->

        <div class="row questions">
            <div class="topShadow"></div> <!-- Top Shadow -->
            <div class="col-lg-5 col-md-6 col-sm-12">
                <h2>How Does Smoking Harm Your Body?</h2>
                <p>How much do you know about the benefits of quitting and how smoking affects your body? Take this quiz to find out.</p>
            </div> <!-- /.col-lg-5 /.col-md-6 /.col-sm-12 -->
            <div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-12">
                <div class="text-right" id="questionTicker">
                    QUESTION <span id="questionCurrent">{{ current_quiz_question_number }}</span>/<span id="questionTotal">{{ total_quiz_questions }}</span>
                </div> <!-- /#questionTicker -->
                <div class="box whiteBox" v-cloak>
                    <transition-group
                            name="custom-transition"
                            enter-active-class="animated slideInUp"
                            leave-active-class="animated slideOutUp"
                            tag="div"
                            class="transition"
                    >
                        <div v-for="question, index in all_quiz_questions" v-if="index == current_quiz_question_number - 1 && show_quiz_part=='question'" v-bind:key="index + '_question'" class="question" v-bind:class="'question_' + index">
                            <p><strong>True or False?</strong> {{ question.node.field_statement }}</p>
                            <div class="answerGroup">
                                <button v-on:click="record_answer" v-bind:class="'current_question_' + current_quiz_question_number" class="btn" id="true">TRUE</button>
                                <button v-on:click="record_answer" v-bind:class="'current_question_' + current_quiz_question_number" class="btn" id="false">FALSE</button>
                            </div>
                        </div>
                        <div v-for="question, index in all_quiz_questions" v-if="index == current_quiz_question_number - 1 && show_quiz_part=='feedback'" v-bind:key="index + '_answer'" class="question" v-bind:class="'question_' + index">
                            <p v-if="answer_selected == 'true'" class="quiz-feedback">{{ question.node.field_true_feedback }}</p>
                            <p v-else class="quiz-feedback">{{ question.node.field_false_feedback }}</p>
                            <div class="answerGroup">
                                <button v-on:click="next_quiz_question" class="btn" id="quiz_next_button">{{ quiz_next_button_text }}</button>
                            </div>
                        </div>
                    </transition-group>
                    <div class="quiz-question quiz-results" v-show="show_quiz_part=='results'">
                        <p class="quiz-results-message">{{ final_quiz_response }}</p>
                        <div class="answerGroup">
                            <button v-on:click="reset_quiz" class="btn" id="try_again">Try Again</button>
                        </div>
                    </div>
                </div> <!-- /.whiteBox -->
            </div> <!-- /.col-lg-6 /.col-lg-offset-1 /.col-md-6 /.col-sm-12 -->
            <div class="bottomShadow"></div> <!-- Bottom Shadow -->
        </div> <!-- /.row /.questions -->

        <div class="row app">
            <div class="col-lg-12">
                <h2>Quit With a Free App</h2>
            </div> <!-- /.col-lg-12 -->
            <div class="col-lg-5 col-md-6 col-sm-12">
                <p class="quitGuideIntro">QuitGuide helps you fight cravings when and where they happen. Download QuitGuide now.</p>
                <div class="appDownloads">
                    <a class="ios" href="https://itunes.apple.com/app/apple-store/id411766556?pt=564700&ct=EveryTry&mt=8"><img onclick="makeFloodlightTagCall('DC-4345482/CTP/posev006+standard')" src="images/apple-store-2x.png" alt="Available on the Apple App Store"></a>
                    <a class="android" href="https://play.google.com/store/apps/details?id=com.mmgct.quitguide2&referrer=utm_source%3DFDA%26utm_medium%3DWebsite%26utm_campaign%3DEveryTry"><img onclick="makeFloodlightTagCall('DC-4345482/CTP/posev007+standard')" src="images/google-store-2x.png" alt="Android App on Google Play"></a>
                </div> <!-- /.appDownload -->
            </div> <!-- /.col-lg-5 /.col-md-6 /.col-sm-12 -->
            <div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-12">
                <div class="quitGuide">
                    <p><a href="https://smokefree.gov/tools-tips/apps/quitguide">QuitGuide</a> helps you:</p>
                    <ul>
                        <li>Track cravings by time and location</li>
                        <li>Identify triggers and learn strategies to deal with them</li>
                        <li>Cope with stress and bad moods</li>
                        <li>Monitor your progress</li>
                    </ul>
                </div> <!-- /.guitGuide -->
            </div>  <!-- /.col-lg-6 /.col-lg-offset-1 /.col-md-6 /.col-sm-12 -->
        </div> <!-- /.row /.app-->
    </div> <!-- /.container -->
</main>