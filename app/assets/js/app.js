import Vue from "vue";
import $ from "jquery";
import jQuery from "jquery";
import Settings from "./settings.js";

console.log("DEBUGGING ----")
console.log(Settings);

window.$ = $;
window.jQuery = jQuery;

require("./vendor/popup");
require("./vendor/bootstrap.min.js");

Vue.use(VeeValidate);

new Vue({
    el: "#app",
    data: {
        current_quiz_question_number: 1,
        current_daily_challenge_number: 1,
        current_crave_tip_number: 1,
        total_quiz_questions: 7,
        total_daily_challenges: 7,
        total_crave_tips: 7,
        all_quiz_questions: [],
        all_daily_challenges: [],
        all_quiz_responses: [],
        all_crave_tips: [],
        final_quiz_response: "",
        answer_selected: "",
        correct_answers: 0,
        show_quiz_part: "question",
        quiz_next_button_text: "next",
        daily_challenge_next_button_text: "NEXT FACT",
        show_program_challenge: false,
        show_program_practice: false,
        show_program_quit: false,
        show_program_challenge_submit: true,
        show_program_practice_submit: true,
        show_program_quit_submit: true,
        program_challenge_confirmation: "Submitting...",
        program_practice_confirmation: "Submitting...",
        program_quit_confirmation: "Submitting...",
        program_challenge_phone: "",
        program_practice_phone: "",
        program_quit_phone: "",
        show_calendar_dropdown: false,
        program_challenge_opt_in_path: Settings.program_challenge_opt_in_path,
        program_practice_opt_in_path: Settings.program_practice_opt_in_path,
        program_quit_opt_in_path: Settings.program_quit_opt_in_path,
        btn_sm_1_example: false,
        btn_sm_2_example: false,
        btn_sm_3_example: false
    },
    mounted: function () {
        let vue = this;
        /**
         * Fetch the true-false quiz questions and store in
         * all_quiz_questions; Also populate total_quiz_questions.
         */
        $.ajax({
            url: Settings.quiz_questions_path,
            method: 'GET',
            success: function (data) {
                vue.all_quiz_questions = data.nodes;
                vue.total_quiz_questions = vue.all_quiz_questions.length;
                vue.current_quiz_question_number = 1;
            },
            error: function (error) {
                console.log(JSON.stringify(error));
            }
        });
        /**
         * Fetch the true-false quiz responses (messages for various
         * amount correct) and store in all_quiz_responses.
         */
        $.ajax({
            url: Settings.quiz_answers_path,
            method: 'GET',
            success: function (data) {
                vue.all_quiz_responses = data.nodes;
            },
            error: function (error) {
                console.log(JSON.stringify(error));
            }
        });
        /**
         * Fetch Daily Challenges and store in all_daily_challenges;
         * also populate total_daily_challenges.
         */
        $.ajax({
            url: Settings.daily_challenges_path,
            method: 'GET',
            success: function (data) {
                vue.all_daily_challenges = data.nodes;
                vue.total_daily_challenges = vue.all_daily_challenges.length;
                vue.current_daily_challenge_number = 1;
            },
            error: function (error) {
                console.log(JSON.stringify(error));
            }
        });
        /**
         * Fetch all crave tips and store in all_crave_tips; also
         * populate total_crave_tips.
         */
        $.ajax({
            url: Settings.crave_tips_path,
            method: 'GET',
            success: function (data) {
                vue.all_crave_tips = data.nodes;
                vue.total_crave_tips = vue.all_crave_tips.length;
                vue.current_crave_tip_number = 1;
            },
            error: function (error) {
                console.log(JSON.stringify(error));
            }
        });
    },
    methods: {
        /**
         * When user selects true of false, store the answer in
         * answer_selected and increment correct_answers if correct.
         *
         * @param e
         *    The button press event.
         */
        record_answer: function(e) {
            var btn = e.target || e.srcElement;
            this.answer_selected = btn.id;
            if (this.answer_selected == this.all_quiz_questions[this.current_quiz_question_number - 1].node.field_correct_answer) {
                this.correct_answers++;
            }
            this.show_quiz_part="feedback";
        },
        /**
         * User moves to next true/false question. Simply increment
         * current_quiz_question_number unless it is the end of quiz- if
         * so display response that matches number correct.
         */
        next_quiz_question: function () {
            this.answer_selected = "";
            if (this.current_quiz_question_number < this.total_quiz_questions) {
                this.current_quiz_question_number++;
                this.show_quiz_part="question";
            }
            else {
                this.final_quiz_response = "You got " + this.correct_answers + " out of " + this.total_quiz_questions + " correct.";
                for (i = 0; i < this.all_quiz_responses.length; i++) {
                    if (this.all_quiz_responses[i].node.field_number_correct == this.correct_answers) {
                        this.final_quiz_response = this.all_quiz_responses[i].node.field_result_message;
                    }
                }
                this.show_quiz_part="results";
            }
            this.quiz_next_button_text = this.current_quiz_question_number == this.total_quiz_questions ? "RESULTS" : "Next";
        },
        /**
         * User moves to next daily challenge. Simply increment
         * current_daily_challenge_number unless it is the last one- if
         * so, set current challenge to 1 and change button text.
         */
        next_daily_challenge: function() {
            if (this.current_daily_challenge_number < this.total_daily_challenges) {
                this.current_daily_challenge_number++;
            }
            else {
                window.open('https://smokefree.gov/tools-tips/how-to-quit/using-nicotine-replacement-therapy', '_blank');
                return;
            }
            this.daily_challenge_next_button_text = this.current_daily_challenge_number == this.total_daily_challenges ? "Explore NRT Options" : "NEXT FACT";
        },
        /**
         * User moves to next crave tip. Simply increment
         * current_crave_tip_number unless it is the last crave tip. If
         * so, set current crave tip to 1.
         */
        next_crave_tip: function() {
            if (this.current_crave_tip_number < this.total_crave_tips) {
                this.current_crave_tip_number++;
            }
            else {
                this.current_crave_tip_number = 1;
            }
        },
        /**
         * User moves to previous crave tip. Simpy decrement
         * current_crave_tip_number unless it is the first crave tip. If
         * so, set current crave tip back to the total number of tips.
         */
        previous_crave_tip: function() {
            if (this.current_crave_tip_number > 1) {
                this.current_crave_tip_number--;
            }
            else {
                this.current_crave_tip_number = this.total_crave_tips;
            }
        },
        /**
         * Initialize true/false quiz parameters.
         */
        reset_quiz: function () {
            this.answer_selected = "";
            this.current_quiz_question_number = 1;
            this.correct_answers = 0;
            this.show_quiz_part="question";
            this.quiz_next_button_text = "next";
        },
        /**
         * Posts opt-in and number to mobile commons.
         *
         * @param opt_in
         *   Opt In Key for the appropriate text program.
         * @param phone_number
         *    Users phone as entered in the input field.
         */
        send_text_signup: function(opt_in, phone_number) {
            let vue = this;

            if (phone_number.length > 0 && !isNaN(phone_number)) {
                var fields = {};
                fields.opt_in_path = opt_in;
                fields.person_phone = phone_number;
                switch (opt_in) {
                    case this.program_challenge_opt_in_path:
                        fields.person_POS_DC_Hidden = 'ETC';
                        this.show_program_challenge_submit = false;
                        break;
                    case this.program_practice_opt_in_path:
                        fields.person_POS_PQ_Hidden = 'ETC';
                        this.show_program_practice_submit = false;
                        break;
                    case this.program_quit_opt_in_path:
                        this.show_program_quit_submit = false;
                        break;
                }
                console.log(vue.mobile_commons_url);
                var request = $.ajax({
                    url: vue.mobile_commons_url,
                    type: "POST",
                    data: fields,
                    opt_in_path: opt_in,
                    dataType: "html"
                });
                request.done(function(msg) {
                    switch (this.opt_in_path) {
                        case vue.program_challenge_opt_in_path:
                            vue.program_challenge_confirmation = vue.text_signup_confirmation_message;
                            break;
                        case vue.program_practice_opt_in_path:
                            vue.program_practice_confirmation = vue.text_signup_confirmation_message;
                            break;
                        case vue.program_quit_opt_in_path:
                            vue.program_quit_confirmation = vue.text_signup_confirmation_message;
                            break;
                    }
                });
                request.fail(function(jqXHR, textStatus) {
                    switch (this.opt_in_path) {
                        case vue.program_challenge_opt_in_path:
                            vue.program_challenge_confirmation = vue.text_signup_error_message;
                            break;
                        case vue.program_practice_opt_in_path:
                            vue.program_practice_confirmation = vue.text_signup_error_message;
                            break;
                        case vue.program_quit_opt_in_path:
                            vue.program_quit_confirmation = vue.text_signup_error_message;
                            break;
                    }
                });
            }
        },
        /**
         * Calendar dropdown should close with a click anywhere else on
         * the document.
         *
         * @param e
         *    The click event.
         */
        documentClick: function(e) {
            if (!$(e.target).closest('.calendar-button-container').length) {
                this.show_calendar_dropdown=false;
            }
        }
    },
    /**
     * Listens for document clicks to close modal windows.
     */
    created: function() {
        document.addEventListener('click', this.documentClick)
    },
    /**
     * Stops listening for document clicks.
     */
    destroyed: function() {
        // important to clean up!!
        document.removeEventListener('click', this.documentClick)
    }
});
